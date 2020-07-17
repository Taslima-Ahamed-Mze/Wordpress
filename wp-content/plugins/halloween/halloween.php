<?php
/**
 * @package Login
 * @version 1.0
 */
/*
Plugin Name: Login
Plugin URI: https://my-plugin-quiz-of-yours-nightmares.com/
Description: Voici un plugin dont vous trouverez un quiz parfait pour Halloween. Il a une série de questions terrifiantes pour nous rappeler de nos pires cauchemares et moments de panique de notre vie. Parfait pour connaître les secrets les plus sombres de vos amis et invités.
Version: 1.0
Author: Miriam Olmedo Vera
Author URI: https://my-plugin-quiz-of-yours-nightmares.com/
*/

add_filter('the_content', 'login');
add_action('template_redirect', 'form');
function form()
{
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $pdo = new PDO('mysql:host=localhost;dbname=****;charset=utf8', '', '');
        $data = $pdo->query("SELECT * FROM wp_guests WHERE email = '" . $email . "'");
        if ($data->fetchColumn() > 0) {
            $datas = $pdo->query("SELECT * FROM wp_guests WHERE email = '" . $email . "'");

            foreach($datas as $row)
            {
                $_session['name'] = $row['name'];
                $_session['id'] = $row['id'];
                $_session['email'] = $row['email'];

            }

            wp_safe_redirect('http://localhost/wordpress/?page_id=89');
            
        } else{
            echo'
            <div class="alert alert-danger">
                <strong>Désolé vous ne figurer pas sur la liste des invités</strong> 
            </div>';
        }
        
        
               
        
    }
}
 
function login()
{
    
    echo '<div class="col-lg-6">
                <div class="log-box">    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active pt-3" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                            <form method="POST" action="">
                                <div class="form-group">

                                    <label  for="user1" class="sr-only">Email</label>
                                    <input style="font-family: Eater;font-size:20px;color:red" type="email" name="email" class="form-control" id="user1" placeholder="Email" required>
                                </div>
                                <button type="submit" name="submit" style="font-family: Eater;font-size:16px;color:red" class="btn btn-dark btn-block">Confirmer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             ';
    
}