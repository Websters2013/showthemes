<?php get_header('store'); ?>

<?php $page_default = 'true'; ?>

<!--Breadcrumb-->

<section class="breadcrumb">
    <ul class="container">
        <li><a title="Event Manager Shop Home" href="<?php bloginfo('url'); ?>/store">Home</a> &nbsp; / &nbsp; </li>
        <li><?php _e( 'Not Found', 'twentyfourteen' ); ?></li>
    </ul>
</section>

<!--Page Content-->	

<div class="container">
    <article id="page">
		<h1><?php _e( 'Not Found', 'twentyfourteen' ); ?></h1>
		<p class="tagline"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfourteen' ); ?></p>

		<?php get_search_form(); ?>
    </article>
</div>

<?php get_footer('store'); ?>
