<?php

// Creating the widget 
class createForm extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'createForm',

            // Widget name will appear in UI
            __('Create Form', 'createForm_domain'),

            // Widget description
            array('description' => __('Simple widget to create your own quiz.', 'createForm_domain'),)
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
        echo "Admin status: " . (current_user_can('manage_options') ?
            "<span style='color: green;'>true</span>" : "<span style='color: red;'>false</span>"); ?>
        <div class="quiz-wrapper">
            <? if (count($_POST) >= 1) {
                global $wpdb;
                $scoreCounter = 0;
                $scoreCheck = $wpdb->get_results("SELECT * FROM wp_custom_quiz");
                foreach ($scoreCheck as $key => $value) {
                    if ($scoreCheck->answer != $_POST[$key . "answer"]) {
                        $scoreCounter = $scoreCounter + 1;
                    }
                }
                echo "<script>document.querySelector('.quiz-wrapper').innerHTML = 'You scored $scoreCounter out of " . count($scoreCheck) . " points!'</script>";
            }
            if (current_user_can('manage_options')) : ?>
                <? if (isset($_POST['question']) && isset($_POST['answer'])) {
                    global $wpdb;
                    $wpdb->insert('wp_custom_quiz', ["question" => $_POST['question'], "answer" => $_POST['answer']]);
                } ?>
                <form action="" method="post">
                    <label for="question">Question</label><input type="text" name="question" required>
                    <label for="answer">Answer</label><input type="text" name="answer" required>
                    <button type="submit">Submit question</button>
                </form>
            <? else : ?>
            <? global $wpdb;
                $questions = $wpdb->get_results("SELECT * FROM wp_custom_quiz");
                echo "<form action='' method='post'>";
                foreach ($questions as $key => $question) {
                    echo "<label>$question->question</label><input type='text' name='" . $key . "answer'>";
                }
                echo "<button type='submit'>Check answers</button></form>";
            endif; ?></div><?
                        }

                        // Widget Backend 
                        public function form($instance)
                        {
                            if (isset($instance['title'])) {
                                $title = $instance['title'];
                            } else {
                                $title = __('New title', 'createForm_domain');
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

                        // Class createForm ends here
                    } 
     
     
    // Register and load the widget
