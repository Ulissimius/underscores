<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mathew
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div id="anim-404"><h1 class="display-404" style="font-size: 24px"></h1></div>

					<script>
						var i = 0
						// const container = document.getElementById('anim-404')
						const h1404 = document.querySelector('.display-404')
						const arr = ['4','0','4']

						setTimeout(animate404, 444)
						background404()

						function animate404() {
							if (i != 3) {
								h1404.innerHTML += arr[i]
								i++
								setTimeout(animate404, 444)
							} else {
								h1404.style.transition = "font-size linear 6s"
								h1404.style.fontSize = String(findFontSize(h1404) + 200 + "px")
								return
							}
						}

						function findFontSize(h1) {
							var a
							return a = parseInt(h1.style.fontSize.slice(0, h1.style.fontSize.length-2))
						}

						function background404() {
							const wallpaper = document.querySelector("body")

							wallpaper.style.backgroundImage = "url('<?php bloginfo('template_directory'); ?>/assets/images/broken_link.png')"
							wallpaper.style.backgroundSize = "100px auto"
							wallpaper.style.backgroundRepeat = "repeat"
						}

						function revealInfo() {
							const divShow = document.querySelector(".page-content")

							divShow.style.display = "hide"
							
							setTimeout(revealInfoDelay, 7500)
							
							function revealInfoDelay() {
								divShow.style.display = "block"
							}
						}
					</script>

					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mathew' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mathew' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'mathew' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$mathew_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'mathew' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$mathew_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
