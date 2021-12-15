<?php
/**
 * Header
 *
 * Main header file for the LetsBCoding Theme.
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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
	<div class="container">
		<h1 class="school-logo-text float-left">
			<a href="<?php echo esc_url( site_url() ); ?>"><strong>LetsBCoding</strong></a>
		</h1>
			<a href="
			<?php

			echo esc_url( site_url( '/search' ) );

			?>
			" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
				<i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
		<div class="site-header__menu group">
			<nav class="main-navigation">
				<ul>
					<li <?php bcoding_set_current_menu_item_about_us_page(); ?>><a  class="menu-link current-page-ancestor" 
			href="<?php echo esc_url( site_url( '/about-us' ) ); ?>">About Us</a></li>
					<li><div class="menu-link nav-highlight-community">Community</div>
						<ul class="sub-nav-community">
							<li><a class="menu-link" href="<?php echo esc_url( site_url( '/members' ) ); ?>">Members</a></li>
							<li><a class="menu-link" href="<?php echo esc_url( site_url( '/groups' ) ); ?>">Groups</a></li>
						</ul>
					</li>
					<li><div class="menu-link nav-highlight-curriculum">Curriculum</div>
						<ul class="sub-nav-curriculum">
							<li <?php bcoding_set_current_menu_item_program(); ?>><a class="menu-link" href="
																<?php
																	echo esc_url( get_post_type_archive_link( 'program' ) );
																?>
							">Programs</a></li>
							<li <?php bcoding_set_current_menu_item_course(); ?>><a class="menu-link" href="
																<?php
																	echo esc_url( get_post_type_archive_link( 'course' ) );
																?>
							">Courses</a></li>
							<li <?php bcoding_set_current_menu_item_professor(); ?>><a class="menu-link" 
							href="
							<?php
							echo esc_url( get_post_type_archive_link( 'professor' ) );
							?>
							">Professors</a></li>
							<li <?php bcoding_set_current_menu_item_student(); ?>><a class="menu-link" 
							href="
							<?php
							echo esc_url( get_post_type_archive_link( 'student' ) );
							?>
							">Students</a></li>
						</ul>
					<li <?php bcoding_set_current_menu_item_event(); ?>><a class="menu-link" 
					href="
					<?php
					echo esc_url( get_post_type_archive_link( 'event' ) );
					?>
					">Events</a></li>
					<li <?php bcoding_set_current_menu_item_campus(); ?>><a class="menu-link" 
					href="
					<?php
					echo esc_url( get_post_type_archive_link( 'campus' ) );
					?>
					">Campuses</a></li>
					<li <?php bcoding_set_current_menu_item_blog(); ?>><a class="menu-link current-page-ancestor" 
					href="<?php echo esc_url( site_url( '/blog' ) ); ?>">Blog</a></li>
				</ul>
			</nav>
			<div class="site-header__util">
			<?php if ( is_user_logged_in() ) { ?>
				<a href="
					<?php
					esc_url( site_url( '/my-notes' ) );
					?>
				" class="btn btn--small btn--orange float-left push-right">My Notes
				</a>
				<a href="
					<?php
					echo esc_url( wp_logout_url( home_url() ) );
					?>
					" class="btn btn--small btn--dark-orange float-left btn--with-photo">
					<span class="site-header__avatar">
					<?php

					echo get_avatar( get_current_user_id(), 60 );
					?>
				</span>
				<span class="btn__text">Logout</span>
				</a>
				<?php } else { ?>
				<a href="
				<?php

				echo esc_url( wp_login_url() );

				?>
				" class="btn btn--small btn--orange float-left push-right">Login</a>
				<a href="
				<?php

				echo esc_url( wp_registration_url() );

				?>
				" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
				<?php } ?>
				<a href="
				<?php

				echo esc_url( site_url( '/search' ) );

				?>
				" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</header>

