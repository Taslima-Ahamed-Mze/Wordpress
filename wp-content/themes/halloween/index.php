<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spooky
 */

get_header();
?>
		<!-- <main id="main" class="site-main" role="main">
		<div class="container">
            <div  class="row"> -->
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				
					<h1 style="font-family:Eater" ><?php single_post_title(); ?></h1>
				
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		
	<!-- </div>
	</div> -->
<?php
get_footer();
?>



    <!-- <section id="connect-sx">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <div class="log-box">
                        <h3 class="log-hd">Se Loguer</h3>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active pt-3" id="teacher" role="tabpanel" aria-labelledby="teacher-tab">
                                <form method="POST" action ="action.php">
                                    <div class="form-group">
                                        <label for="user1" class="sr-only">Email</label>
                                        <input type="text" name="email" class="form-control" id="user1" placeholder="Email d'invitation" required>
                                    </div>
                                    
                                    <button type="submit" name="submit2" class="btn btn-warning btn-block">Confirmer</button>
        
                                    
                                </form>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->





  





  

