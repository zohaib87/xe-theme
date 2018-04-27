<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package _xe
 */

if ( !function_exists('_xe_posted_on') ) {

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function _xe_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( 'Posted on %s', 'post date', '_xe' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', '_xe' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}

}

if ( !function_exists('_xe_entry_footer') ) {

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function _xe_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', '_xe' ) );
			if ( $categories_list && _xe_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', '_xe' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', '_xe' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', '_xe' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', '_xe' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', '_xe' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);

	}

}

if ( !function_exists('_xe_about_author') ) {

	function _xe_about_author() {

		$author = array(
		    'id' => get_the_author_meta('ID'),
		    'name' => get_the_author_meta('display_name'),
		    'desc' => get_the_author_meta('description'),
		    'img' => get_avatar(
		    	get_the_author_meta('ID'), // ID or Email
		    	117, // Size
		    	'', // Url for an image, defaults to the "Mystery Person."
		    	false, // alt
		    	array( // args
					'class' => array('img-responsive'),
		    	)
		    ),
		); ?>

		<h4 class="text-uppercase margin-top-40">About Author</h4>
		<div class="author-info">
			<ul class="row">
				<li class="col-xs-2 no-padding"> 
					<?php echo wp_kses_post($author['img']); ?>
				</li>
				<li class="col-xs-10">
					<h5 class="text-uppercase no-margin"><?php echo esc_html($author['name']); ?></h5>
					<br>
					<?php echo wp_kses_post($author['desc']); ?>
				</li>
			</ul>
		</div>
	
	<?php }

}

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function _xe_categorized_blog() {

	if ( false === ( $all_the_cool_cats = get_transient( '_xe_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( '_xe_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so _xe_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so _xe_categorized_blog should return false.
		return false;
	}

}

/**
 * Flush out the transients used in _xe_categorized_blog.
 */
function _xe_category_transient_flusher() {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( '_xe_categories' );

}
add_action( 'edit_category', '_xe_category_transient_flusher' );
add_action( 'save_post',     '_xe_category_transient_flusher' );

/**
 * Custom Page Navigation
 */
function _xe_paging_nav() {

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 2,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
		'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        'type'      => 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', '_xe' ); ?></h1>
			<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	
	endif;

}

/**
 * Next/Prev post title and link
 */
function _xe_post_nav() {

	$prev_post = get_previous_post();
	$next_post = get_next_post();

	if ($prev_post) {
	   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
	   $prev_link = get_permalink($prev_post->ID);
	} else {
		$prev_title = $prev_link = '';
	}

	if ($next_post) {
	   $next_title = strip_tags(str_replace('"', '', ucwords($next_post->post_title)));
	   $next_link = get_permalink($next_post->ID);
	} else {
		$next_title = $next_link = '';
	}

}

/**
 * Function to get elements by tag.
 */
function _xe_get_elements_by_tag($tag, $content, $type = 1) {

	if ($type == 1) {
		$pattern = "/\[$tag(.*)\](.*)\[\/$tag\]/Uis";
	} elseif ($type == 2) {
		$pattern = "/\[$tag(.*)\]/Uis";
	} elseif ($type == 3) {
		$pattern = "/\<$tag(.*)\>(.*)\<\/$tag\>/Uis";
	} else {
		$pattern = null;
	}

	$find = null;

	if ($pattern) {
		preg_match($pattern, $content, $matches);
		if ($matches) {
			$find = $matches;
		}
	}
	return $find;

}

/**
 * Comment form textarea placeholder
 */
function _xe_comment_textarea_placeholder($args) {

	$args['comment_field'] = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );

	return $args;

}
add_filter('comment_form_defaults', '_xe_comment_textarea_placeholder');

/**
 * Comment form fields placeholder
 */
function _xe_comment_fields_placeholder($fields) {

	foreach( $fields as &$field ) {

		$field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );

	}

	return $fields;

}
add_filter('comment_form_default_fields', '_xe_comment_fields_placeholder');

/**
 * Remove menu pages.
 */
function _xe_remove_menu_pages() {
}
add_action( 'admin_menu', '_xe_remove_menu_pages' );

/**
 * Add menu pages.
 */
function _xe_add_menu_pages() {
}
add_action( 'admin_menu', '_xe_add_menu_pages' );