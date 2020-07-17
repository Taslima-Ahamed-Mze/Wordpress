<?php
/**
 * @package accueil
 * @version 1.0
 */
/*
Plugin Name: Accueil
Plugin URI: https://my-plugin-quiz-of-yours-nightmares.com/
Description: Voici un plugin dont vous trouverez un quiz parfait pour Halloween. Il a une série de questions terrifiantes pour nous rappeler de nos pires cauchemares et moments de panique de notre vie. Parfait pour connaître les secrets les plus sombres de vos amis et invités.
Version: 1.0
Author: Miriam Olmedo Vera
Author URI: https://my-plugin-quiz-of-yours-nightmares.com/
*/
add_filter('the_content', 'affiche');

 
function affiche()
{
    
    echo '
        <a style="font-family: Eater;font-size:26px;color:red" href="http://localhost/wordpress/?page_id=94">je préfère poser les questions </a><br><br>
        <a style="font-family: Eater;font-size:26px;color:red" href="http://localhost/wordpress/?page_id=91">je préfère répondre aux questions</a>
             ';
    
}