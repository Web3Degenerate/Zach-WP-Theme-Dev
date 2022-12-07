<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HackinWP_test
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'test-starter-theme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'test-starter-theme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'test-starter-theme' ), 'test-starter-theme', '<a href="https://hackingwp.com">HackinWP</a>' );
				?>
		</div><!-- .site-info -->
		
<!--ADDED L31 (5:32)-->
		<div class="custom-footer">
		                            <!--Second paramter has to be the Text Domain of Theme in Style.css L31 (5:38)-->
		    <?php esc_html_e( 'Custom footer text', 'test-starter-theme'); ?>
		</div>
<!--ADDED L31 (5:32)-->		
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
