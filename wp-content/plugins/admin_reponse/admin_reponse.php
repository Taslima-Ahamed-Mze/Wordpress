<?php
/**
 * @package admin_reponse
 * @version 1.0
 */
/*
    Plugin Name: admin_reponse
    Plugin URI: https://my-plugin-quiz-of-yours-nightmares.com/
    Description: Voici un plugin dont vous trouverez un quiz parfait pour Halloween. Il a une série de questions terrifiantes pour nous rappeler de nos pires cauchemares et moments de panique de notre vie. Parfait pour connaître les secrets les plus sombres de vos amis et invités.
    Version: 1.0
    Author: Miriam Olmedo Vera
    Author URI: https://my-plugin-quiz-of-yours-nightmares.com/
    */


    add_filter('the_content', 'admin');
    function admin( )
    {
        $pdo = new PDO('mysql:host=localhost;dbname=****;charset=utf8', '', '');
        $datas = $pdo->query("SELECT * FROM wp_questions where id in (1,2,5)");
        
        echo '
        <div class="container">
            <div class="row">
                <div class="col-lg-10">  
            ';

        foreach($datas as $rows)
        {
            echo '<div class="col-md-12">
                <h6 style="font-family: Eater;font-size:20px;color:red">'.$rows['question'].'</h6>
            </div>';
            $data = $pdo->query("SELECT * FROM wp_answers where id_question =".$rows['id']);
            foreach($data as $row)
            {
                echo '<ul><li style="font-family: Eater;font-size:14px;color:green">'.$row['answer'].'</li></ul>';
            }
            echo '<br><br>';

        }
        echo '</div>
        <div class="col-lg-2">
        
            <a style="font-family: Eater;font-size:12px;color:red" href="http://localhost/wordpress/?page_id=94">je préfère poser les questions </a><br><br>
            <a style="font-family: Eater;font-size:12px;color:red" href="http://localhost/wordpress/?page_id=91">je préfère répondre aux questions</a>
             
        </div>

        </div>
        </div>
        ';
    }