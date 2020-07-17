<?php
class halloweenWidget extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'halloweenWidget',

			// Widget name will appear in UI
			__('Halloween Widget', 'halloweenWidgetDomain'),

			// Widget description
			array('description' => __('Hello world halloween widget.', 'halloweenWidgetDomain'),)
		);
	}

	public function widget($args, $instance)
	{
		require "misc/connection.class.php";
		// echo $args['before_widget'];
		// if (!empty($title))
		// 	echo $args['before_title'] . $title . $args['after_title'];

		// make this value dynamic
		$guestId = 1;
		//

		$questions = Connection::getConnection()->prepare("SELECT * from `wp_questions`;");
		$questions->execute();
		$questions = $questions->fetchAll(PDO::FETCH_ASSOC);
		if ($_POST['triedToQuestion'] == 0) {
			$triedToQuestion = 0;
		} elseif (!isset($triedToQuestion) && $_POST['triedToQuestion'] == 1) {
			$triedToQuestion = 1;
		} else {
			$triedToQuestion = 1;
		}

		echo "<link rel='stylesheet' href='misc/tachyons.css'>";

		$title = apply_filters('widget_title', $instance['title']);

		// before and after widget arguments are defined by themes

		// This is where you run the code and display the output
		// echo __('Hello, World!', 'halloweenWidgetDomain');
		// echo $args['after_widget'];

		if ($_POST['questions'] == NULL) {
			if ($triedToQuestion == 0) {
				echo "<div 
				class='show-button f2 grow no-underline br-pill ph5 pv3 mb2 dib white bg-blue pointer' 
				onclick='showQuestionsForm()'> 
					Je prefère poser des questions
					</div>";
				echo "<div class='questions dn'>
						<form action='' method='POST'>
							Pose moi une question embarassante....
							<input type='text' name='questions'>
						</form>
					</div><br>";
				echo "<div 
						class='show-button f2 grow no-underline br-pill ph5 pv3 mb2 dib white bg-red pointer' 
						onclick='showAnswersForm()'> 
							Je prefère donner les réponses
					</div><br class='pa2'>";
				echo "<div class='answers dn'>";
			}
		} else {
			echo "<div class='f1 b tc red'>Rien m'embarasse!<br>
			<div class='f2 b tc red pb5'>C'est moi que pose des questions!</div></div>";
			$triedToQuestion = 1;
		}
		if ($_POST['counter'] == null) {
			$i = 0;
		} else {
			$i = intval($_POST['counter']) + 1;
		}



		if (isset($_POST["answer" . strval($i - 1)])) {
			$deletePrevious = Connection::getConnection()->prepare("DELETE FROM `wp_answers`
			WHERE `id_guest` = $guestId AND `id_question` = $i
			LIMIT 1;");
			$deletePrevious->execute();
			try {
				$storeAnswer = Connection::getConnection()->prepare("INSERT INTO `wp_answers` (`id_guest`, `id_question`, `answer`)
					VALUES ('" . $guestId . "', '" . $i . "', '" . $_POST["answer" . strval($i - 1)] . "');");
				$storeAnswer->execute();
			} catch (PDOException $e) {
				echo $e;
			}
		}
		if ($i == 10) {
			$answers = Connection::getConnection()->prepare("SELECT * FROM `wp_answers` WHERE `id_guest`=$guestId;");
			// $answers->debugDumpParams(); die;
			$answers->execute();
			$answers = $answers->fetchAll(PDO::FETCH_ASSOC);
			$qualities = $answers[6]['answer'] .
				(($answers[8]['answer'][0] == "o") ? ",cruelle" : "") .
				(($answers[9]['answer'][0] == 'o') ? ",pleurnichard" : "");
			$qualities = explode(',', $qualities);
			if (count($qualities) == 1) {
				$output = $answers[6]['answer'];
			} else {
				$last = array_pop($qualities);
				$output = $qualities
					? implode(', ', $qualities) . ' et ' . $last
					: $last;
			}

			// var_dump($answers[8]['answer'][0]);
			echo '</div>RIP ' . $answers[0]['answer'] . "<br>";
			echo 'à l’âge de ' . ($answers[2]['answer'][0] == 'j' ? "97" : ($answers[1]['answer'][0] == '4' ? "48" : "23")) . "<br>";
			echo 'cause de la mort : ' . $answers[3]['answer'] . "<br>";
			echo 'après avoir vécu ' . $answers[4]['answer'] . "<br>";
			echo $answers[5]['answer'] . ' fut la seule personne présente pendant son enterrement.' . "<br>";
			echo '« Merci d’être mort. T’était quelqu’un ' . $output . ' a qui j’aurais bien aimé ' . $answers[7]['answer'] . ' »';
			die;
		}
		echo "<form action='' method='POST'>" .
			$questions[$i]['question'] . "
			<input type='hidden' name='triedToQuestion' value='" . $triedToQuestion . "'>

				<input type='hidden' name='counter' id='questionCounter' value='" . $i . "'>";
		$answerJson = json_decode($questions[$i]['answer_json']);
		if ($answerJson->type == "text") {
			echo "<input type='text' name='answer$i'>";
		} elseif ($answerJson->type == "radio") {
			echo "<br><input type='radio' name='answer$i' value=\"" . $answerJson->options[0] . "\"><label for='answer$i'>" . $answerJson->options[0] . "</label>";
			echo "<input type='radio' name='answer$i' value=\"" . $answerJson->options[1] . "\"><label for='answer$i'>" . $answerJson->options[1] . "</label>";
		}
		echo "<button type='submit'>Submit</button></form>
			</div>";
		echo $args['after_widget'];
		echo "<script>function showQuestionsForm() {
			if (document.querySelector('.questions').className == 'questions dn') {
				document.querySelector('.questions').className = 'questions'
			} else {
				document.querySelector('.questions').className = 'questions dn'}
			}
			function showAnswersForm() {
				if (document.querySelector('.answers').className == 'answers dn') {
					document.querySelector('.answers').className = 'answers';
				} else {
					document.querySelector('.answers').className = 'answers dn';}
				}
				if (document.querySelector('#questionCounter').value >= 1) {
					document.querySelector('.answers').className = 'answers';
					for (i = 0; i < document.querySelectorAll('.show-button').length; i++){
						document.querySelectorAll('.show-button')[i].classList.remove('dib');
						document.querySelectorAll('.show-button')[i].classList.add('dn');}
				}
			</script>";
			// echo $args['after_widget'];
	}

	// Widget Backend 
	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('New title', 'halloweenWidgetDomain');
		}

		// Widget admin form

?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
<?php
	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		return $instance;
	}

	// Class halloweenWidget ends here
}


// Register and load the widget

