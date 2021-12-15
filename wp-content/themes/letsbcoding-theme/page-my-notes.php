<?php
/**
 * My notes page template for the LetsBCoding Theme.
 *
 * @author Maria D. Campbell interglobalmedia@interglobalmedianetwork.com
 * @copyright Copyright (c) 2021 Maria D. Campbell
 *
 * @package WordPress
 * @subpackage LetsBCoding
 * @link https://www.interglobalmedianetwork.com
 * @since LetsBCoding 2.0.0
 */

?>

<?php

if ( ! is_user_logged_in() ) {
	wp_safe_redirect( esc_url( site_url( '/' ) ) );
	exit;
}

get_header();
while ( have_posts() ) {
	the_post();
	page_banner();
	?>

	<div class="container container--narrow page-section">
		<div class="create-note">
			<h2 class="headline headline--medium">Create Note</h2>
			<input class="new-note-title" placeholder="Title">
			<textarea class="new-note-body" placeholder="Your note here ..."></textarea>
			<span class="submit-note">Create Note</span>
			<span class="note-limit-message">Note limit reached: delete an existing note to make room for a new one.</span>
		</div>

		<ul class="min-list link-list" id="my-notes">
			<?php
				$user_notes = new WP_Query(
					array(
						'post_type'      => 'note',
						'posts_per_page' => -1,
						'author'         => get_current_user_id(),
					)
				);

			while ( $user_notes->have_posts() ) {
				$user_notes->the_post();
				?>
					<li data-note-id="<?php echo esc_attr( get_the_id() ); ?>">
						<textarea readonly class="note-title-field"><?php echo esc_textarea( str_replace( 'Private: ', '', wp_strip_all_tags( get_the_title() ) ) ); ?></textarea>
						<textarea readonly class="note-body-field"><?php echo esc_textarea( wp_strip_all_tags( get_the_content() ) ); ?></textarea>
						<div class="note-button-wrapper">
							<span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
							<span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
							<span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Update</span>
						</div>
					</li>
				<?php
			}

			?>
		</ul>
	</div>

<?php }

get_footer();

?>
