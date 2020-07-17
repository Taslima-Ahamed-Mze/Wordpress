<?php

/**
 * @package quiz_of_yours_nightmares
 * @version 1.0
 */
/*
    Plugin Name: Quiz of yours Nightmares
    Plugin URI: https://my-plugin-quiz-of-yours-nightmares.com/
    Description: Voici un plugin dont vous trouverez un quiz parfait pour Halloween. Il a une série de questions terrifiantes pour nous rappeler de nos pires cauchemares et moments de panique de notre vie. Parfait pour connaître les secrets les plus sombres de vos amis et invités.
    Version: 1.0
    Author: Miriam Olmedo Vera
    Author URI: https://my-plugin-quiz-of-yours-nightmares.com/
    */

/*
------------------ posibles adds :
    add_action('wp_footer', 'quizOfYourNightmares');
    add_filter('the_content', 'quizOfYourNightmares');
    add_shortcode('nouveauShortcode', 'quizOfYourNightmares');
------------------
*/

/*
------------------- pour afficher du contenu avec une autre page :
add_filter('template_include', 'monTemplate');

function monTemplate($template)
{
    if (???) {
        $template = 'mon_portfolio.php';
    }
}
--------------------
*/

add_filter('the_content', 'quizOfYourNightmares');

function quizOfYourNightmares(&$JustOne)
{
    
    $JustOne = 0;
    if ($JustOne === 0) {


?>
        <form method='POST' class='Questions'>
            <label for='Q1'>Quel est le surnom le plus horrible par lequelle tu t’aies fait appeler?<br>Le mien ''être immonde''.</label>
            <input type='text' id='Q1' name='Q1'></input>
            <button id='reponse'>J'assume ma réponse</button>
        </form>
        <?php
        echo $JustOne++;
    }

    if (isset($_POST['Q1'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );
            $qpdo0 = "SELECT id FROM wp_guests WHERE email='$_SESSION[email]'";
            $req0 = $pdo->query($qpdo0);
            $id = $req0->fetch();

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 1, '$_POST[Q1]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
        ?>
                <form method='POST' class='Questions'>
                    <label for='Q2'>Quel est ton âge ? 20 ans et encore débile ou plutôt 45 et bientôt sénile ?</label>
                    <input type='text' id='Q2' name='Q2'></input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q2'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 2, '$_POST[Q2]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q3'>Dis moi, tu espère mourir jeune et insouciant ou vieux et en décrépitude ?<br>De toute façon je serai encore là quand toi tu pourriras.</label>
                    <input type='checkbox' class='Q3' name='Q3' value='J'>Je ne veux pas être un vieux truck</input>
                    <input type='checkbox' class='Q3' name='Q3' value='V'>Mourir dans le feux de l'action, bien sûr !</input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q3'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 3, '$_POST[Q3]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q4'>Quel façon de périr te fait plus peur ?</label>
                    <input type='text' id='Q4' name='Q4'></input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q4'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 4, '$_POST[Q4]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q5'>Quel est le pire cauchemar dont tu te souviennes ?<br>Je pari que tu t’es même pissé dessous...</label>
                    <input type='text' id='Q5' name='Q5'></input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q5'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 5, '$_POST[Q5]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q6'>Le prénom de ton pire ennemi ?</label>
                    <input type='text' id='Q6' name='Q6'></input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q6'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 6, '$_POST[Q6]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q7'>Quelle est la raison pour laquelle on devrait tous te détester ?<br>Le défaut que tu n’as jamais osez révéler ?</label>
                    <input type='text' id='Q7' name='Q7'></input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q7'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 7, '$_POST[Q7]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q8'>Comment te vengerais-tu de ta Némésis si on t’assurais qu’il n’y aurait pas de conséquences pour toi ?</label>
                    <input type='text' id='Q8' name='Q8'></input>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q8'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 8, '$_POST[Q8]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q9'>As-tu fais pleurer quelqu'un par des simples paroles et tu t'es senti puissant pour être y arrivé?</label>
                    <div>
                        <input type='checkbox' class='Q9' value='Oui' name='Q9'>Oui, et quoi ?</input>
                        <input type='checkbox' class='Q9' value='Non' name='Q9'>Non, je ne suis pas un monstre</input>
                    </div>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q9'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 9, '$_POST[Q9]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <form method='POST' class='Questions'>
                    <label for='Q10'>On t'as déjà fait pleurer par des simples paroles cruelles?</label>
                    <div>
                        <input type='checkbox' class='Q10' value='Oui' name='Q10'>Oui, j'ai un coeur</input>
                        <input type='checkbox' class='Q10' value='Non' name='Q10'>Non, je ne pleur jamais</input>
                    </div>
                    <button id='reponse'>J'assume ma réponse</button>
                </form>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }

    if (isset($_POST['Q10'])) {
        try {
            $user = 'taslima';
            $passWord = "fawinat";
            $bdd = 'wordpress';

            $pdo = new PDO(
                'mysql:host=localhost;dbname=' . $bdd,
                $user,
                $passWord
            );

            $qpdo1 = "INSERT INTO wp_answers (id_guest, id_question, answer) VALUES (1, 10, '$_POST[Q10]') ";
            $req1 = $pdo->query($qpdo1);
            if ($req1) {
            ?>
                <div>
                    <h3>Tu peux entrer</h3>
                    <h5>Suffre la fête si ces infos te le permettent :</h5>

                </div>
                <?php
                $qpdo2 = "SELECT * FROM wp_answers WHERE id_guest='1'";
                $req2 = $pdo->query($qpdo2);
                $allAnswers = $req2->fetchAll();
                ?>
                <div class="reponses">
                    <h1>R.I.P. <?php if (isset($allAnswers[0])) {
                                    // print_r($allAnswers[0][2]);
                                } ?>
                    </h1>
                    <h2>À l'âge de
                        <?php if (isset($allAnswers[0])) {
                            if ($allAnswers[2][2] == 'V') {
                                $age = $allAnswers[1][2] + 3;
                                echo $age;
                            } else {
                                echo '97';
                            }
                        } ?>
                        ans</h2>
                    <h2>
                        <?php if (isset($allAnswers[0])) {
                            echo $allAnswers[3][2];
                        } ?>
                    </h2>
                    <h2>Après avoir vecu un
                        <?php if (isset($allAnswers[0])) {
                            echo $allAnswers[4][2];
                        } ?>
                    </h2>
                    <h2>
                        <?php if (isset($allAnswers[0])) {
                            echo $allAnswers[5][2];
                        } ?> fut la seulle personne présente dans son enterrement
                    </h2>
                    <h3>"Merci d'avoir enfin péri. Tu n'était qu'une personne
                        <?php if (isset($allAnswers[0])) {
                            echo $allAnswers[6][2];
                        } ?>,
                        <?php if (isset($allAnswers[0])) {
                            if ($allAnswers[8][2] == "Oui") {
                                echo 'cruelle';
                            } else {
                                echo 'ridiculeusement sensible';
                            }
                        } ?> et
                        <?php if (isset($allAnswers[0])) {
                            if ($allAnswers[9][2] == "Non") {
                                echo 'sans cœeur';
                            } else {
                                echo 'pleurnicharde';
                            }
                        } ?>
                        qui méritait d'être
                        <?php if (isset($allAnswers[0])) {
                            echo $allAnswers[7][2];
                        } ?>"
                    </h3>
                </div>
            <?php
            }
        } catch (PDOException $error) {
            echo 'Error : ' . $error->getMessage() . PHP_EOL;
        }
    }
}
?>