<?php
/**
 * Footer
 *
 * Main footer file for the LetsBCoding Theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage LetsBCoding
 * @author     Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright  Copyright (c) 2021 Maria D. Campbell
 * @link       https://www.interglobalmedianetwork.com
 * @since      2.0.0
 */

?>
<footer class="site-footer">
	<div class="site-footer__inner container container--narrow">
		<div class="group">
			<div class="site-footer__col-one">
				<h1 class="school-logo-text school-logo-text--alt-color">
					<a href="<?php echo esc_url( site_url() ); ?>"><strong>LetsBCoding</strong></a>
				</h1>
				<p><a class="site-footer__link" href="#">555.555.5555</a></p>
			</div>

			<div class="site-footer__col-two-three-group">
				<div class="site-footer__col-two">
					<h3 class="headline headline--small">Explore</h3>
						<nav class="nav-list">
							<ul>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/about-us' ) ); ?>">About Us</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/members' ) ); ?>">Members</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/groups' ) ); ?>">Groups</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/programs' ) ); ?>">Programs</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/professors' ) ); ?>">Professors</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/students' ) ); ?>">Students</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/events' ) ); ?>">Events</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/campuses' ) ); ?>">Campuses</a></li>
								<li><a class="footer-menu-link" href="<?php echo esc_url( site_url( '/blog' ) ); ?>">Blog</a></li>
							</ul>
						</nav>
					</div>

					<div class="site-footer__col-three">
						<h3 class="headline headline--small">Learn</h3>
						<nav class="nav-list">
							<ul>
								<li><a class="footer-menu-link-learn" href="<?php echo esc_url( site_url( '/sitemap' ) ); ?>">Sitemap</a></li>
								<li><a class="footer-menu-link-learn" href="#">Legal</a></li>
								<li><a class="footer-menu-link-learn" href="<?php echo esc_url( site_url( '/privacy-policy' ) ); ?>">Privacy</a></li>
								<li><a class="footer-menu-link-learn" href="#">Careers</a></li>
							</ul>
						</nav>
					</div>
				</div>

				<div class="site-footer__col-four">
					<h3 class="headline headline--small">Connect With Us</h3>
					<nav>
						<ul class="min-list social-icons-list group">
							<li>
								<a href="#" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="#" class="social-color-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
