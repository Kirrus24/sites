<?php

    function blog_assets(){

        wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');

        wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');

        wp_enqueue_style('adaptive', get_template_directory_uri() . '/assets/css/media.css');

        wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/script.js', array(), '20151215', true);

    }

    add_action('wp_enqueue_scripts', 'blog_assets');

    show_admin_bar(false);

    add_theme_support('post-thumbnails');

function custom_pagination() {
	ob_start();
	?>
		<div class="pages clearfix">
			<?php
				global $wp_query;
				$current = max( 1, absint( get_query_var( 'paged' ) ) );
				$pagination = paginate_links( array(
					'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
					'format' => '?paged=%#%',
					'current' => $current,
					'total' => $wp_query->max_num_pages,
					'type' => 'array',
					'prev_text' => null,
					'next_text' => null,
				) ); ?>
			<?php if ( ! empty( $pagination ) ) : ?>
				<ul class="pagination list-reset">
					<?php foreach ( $pagination as $key => $page_link ) : ?>
						<li class="pagination__item <?php if ( strpos( $page_link, 'current' ) !== false ) { echo 'pagination__item--current'; } ?>"><?php echo $page_link ?></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		</div>
	<?php
	$links = ob_get_clean();
	return apply_filters( 'sa_bootstap_paginate_links', $links );
}

function gt_get_post_view() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
	if ($count > 0) return $count - 1;
}
function gt_set_post_view() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
function gt_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo gt_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

function posts_link_next_class($format){
	$format = str_replace('href=', 'class="post-links__link post-links__link--next" href=', $format);
	return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format){
	$format = str_replace('href=', 'class="post-links__link post-links__link--prev" href=', $format);
	return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');

add_theme_support('menus');

function blog_theme_widgets_init(){
	register_sidebar(array(
		'name' => esc_html__('phone', 'blog-theme'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Add widgets here.', 'blog-theme'),
		'before_widget' => null,
		'after_widget' => null,
	));
}
add_action ('widgets_init', 'blog_theme_widgets_init');

remove_filter('widget_text_content', 'wpautop');

add_action('wp_ajax_callback_mail', 'callback_mail');
add_action('wp_ajax_nopriv_callback_mail', 'callback_mail');

function callback_mail(){
	$name = $_POST['name'];
	$phone = $_POST['tel'];
	$msg = $_POST['msg'];

	$to = 'kirillrusakov199821@gmail.com';
	$subject = 'Email from site';
	$message = 'Text message:' .  ' ' . $name . ' ' . $phone . ' ' . $msg;

	remove_all_filters ('wp_mail_from');
	remove_all_filters ('wp_mail_from_name');

	$headers = array(
		'From: Me Myself',
		'content-type: text/html',
		'Cc: John Doe',
		'Cc: kirillrusakov199821@gmail.com',
	);

	wp_mail( $to, $subject, $message, $headers);
	wp_die();
}
