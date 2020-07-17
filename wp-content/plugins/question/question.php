<?php
/**
 * @package Question
 * @version 1.0
 */
/*
Plugin Name: Qestion
Plugin URI: https://my-plugin-quiz-of-yours-nightmares.com/
Description: Voici un plugin dont vous trouverez un quiz parfait pour Halloween. Il a une série de questions terrifiantes pour nous rappeler de nos pires cauchemares et moments de panique de notre vie. Parfait pour connaître les secrets les plus sombres de vos amis et invités.
Version: 1.0
Author: Miriam Olmedo Vera
Author URI: https://my-plugin-quiz-of-yours-nightmares.com/
*/
add_filter('the_content', 'Question');
add_action('template_redirect', 'form_action');
function form_action()
{
    
    if(isset($_POST['submit']))
    {
        $question = $_POST['question'];
        $pdo = new PDO('mysql:host=localhost;dbname=****;charset=utf8', '****', '****');
        $data = $pdo->query("INSERT INTO wp_questions (question,answer_json) VALUES ('" . $question . "','{\"type\" : \"text\"}')");
        echo '<a style="font-family: Eater;font-size:26px;color:red;" href="http://localhost/wordpress/?page_id=91">Rien ne m’embarrasse ! C’est moi qui pose les questions ! </a>
        ';
        
        
               
        
    }
}
 
function Question()
{
    
    echo '<div class="col-lg-12">
                <div class="log-box">    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active pt-3" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                            <form method="POST" action="">
                                <div class="form-group">

                                    <label  for="user1" class="sr-only">Question</label>
                                    <textarea style="font-family: Eater;font-size:16px;color:red"  name="question" class="form-control" id="user1" placeholder=" Pose moi une question embarrassante" required></textarea>
                                </div>
                                <button type="submit" name="submit" style="font-family: Eater;font-size:16px;color:red" class="btn btn-dark btn-block">valider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             ';

             echo '<h1 style="font-family: Eater;font-size:26px;color:red;">'.$_session['email']."</h1>";

    
}