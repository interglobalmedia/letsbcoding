<?php

function relatedPostsHTML( $id ) {
	$postsReProf = new WP_Query(
		array(
			'posts_per_page' => -1,
			'post_type'      => 'post',
			'meta_query'     => array(
				array(
					'key'     => 'featured_professor',
					'compare' => '=',
					'value'   => $id,
				),
			),
		)
	);

	ob_start();

	if ( $postsReProf->found_posts ) { ?>
		<p><strong><?php the_title(); ?></strong> is mentioned in the following posts:</p>
		<ul>
			<?php
			while ( $postsReProf->have_posts() ) {
				$postsReProf->the_post();
				?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php
			}
			?>
		</ul>
		<?php
	}

	wp_reset_postdata();

	return ob_get_clean();
}
