<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Spooky
 */

?>

	</div><!-- #content -->

	<div id="colophon" class="site-footer">
		<?php
		get_sidebar();
		?>
		<footer class="site-info" role="contentinfo">
			
			
			
			<?php
				echo "<h3 style='font-family: Eater;font-size:26px;color:red'>C’est moi qui l’aie fait !</h3>";
			/* translators: 1: Theme name, 2: Theme author. */
			?>
		</footer><!-- .site-info -->
</div><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
