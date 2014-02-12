<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta http-equiv="cleartype" content="on">
	<meta name="HandheldFriendly" content="True">
	<?php if(ot_get_option('favicon')){ ?>
	<link rel="shortcut icon" href="<?php echo ot_get_option('favicon'); ?>">
	<?php } ?>
	<?php 
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head(); 
	?>
	<?php 
		if(ot_get_option('boxed') == 'yes') { 
			$class[0] = 'boxed';
	 	} else { $class[1] = ''; }
	?>
	<?php wp_localize_script( 'app', 'themeajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) ); ?>
</head>
<body <?php body_class($class); ?> data-url="<?php echo home_url(); ?>">
<div id="wrapper">
<!-- Start Header -->
<?php if (isset($_GET['header_style'])) { $header_style = htmlspecialchars($_GET['header_style']); } else { $header_style = ''; }  ?>
<?php if(ot_get_option('header_style', 'style2') == 'style2' || $header_style == 'style2' ) {  ?>
<header id="header" class="style2">
	<div class="row">
		<div class="four columns logo">
			<?php if (ot_get_option('logo_text') == 'yes') { ?>
				<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></li>
			<?php } else { ?>
				<?php if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = get_template_directory_uri(). '/assets/img/logo.png'; } ?>
				
				<a href="<?php echo home_url(); ?>" <?php if(ot_get_option('logo_mobile')) { ?>class="hide-logo"<?php } ?>><img src="<?php echo $logo; ?>" class="logoimg" alt="<?php bloginfo('name'); ?>" /></a>
				<?php if(ot_get_option('logo_mobile')) { ?>
					<a href="<?php echo home_url(); ?>" class="show-logo"><img src="<?php echo ot_get_option('logo_mobile'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php } ?>
			<?php } ?>
			<?php echo '<br><time>'. date_i18n( __( 'F d, Y' ), time() ).'</time>'; ?>
		</div>
		<div class="eight columns">
			<?php if(ot_get_option('disableads') != 'yes') { ?>
			<aside class="advertisement">
				<?php 
					if(ot_get_option('ads_header')) {
						echo ot_get_option('ads_header');
					} else {
					?>
						<div class="placeholder"><a href="<?php echo ot_get_option('ads_default', '#'); ?>"><?php _e( 'Advertise', THB_THEME_NAME ); ?></a></div>
					<?php
					}
				 ?>
			</aside>
			<?php }?>
		</div>
	</div>
</header>
<?php } else {  ?>
<header id="header">
	<div class="row">
		<div class="four columns hide-for-small">
			<?php //do_action('thb_weather'); ?>
		</div>
		<div class="four columns logo">
			<?php if (ot_get_option('logo_text') == 'yes') { ?>
				<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></li>
			<?php } else { ?>
				<?php if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = get_template_directory_uri(). '/assets/img/logo.png'; } ?>
				
				<a href="<?php echo home_url(); ?>" <?php if(ot_get_option('logo_mobile')) { ?>class="hide-logo"<?php } ?>><img src="<?php echo $logo; ?>" class="logoimg" alt="<?php bloginfo('name'); ?>" /></a>
				<?php if(ot_get_option('logo_mobile')) { ?>
					<a href="<?php echo home_url(); ?>" class="show-logo"><img src="<?php echo ot_get_option('logo_mobile'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php } ?>
			<?php } ?>
			<?php echo '<br><time>'. date_i18n( __( 'F d, Y' ), time() ).'</time>'; ?>
		</div>
		<div class="four columns hide-for-small">
			<?php get_search_form(); ?>
		</div>
	</div>
</header>
<?php }  ?>
<!-- End Header -->


<div class="mobile-sidebar sb-slidebar sb-left">
	<div class="mobile-cat-wrapper">
		<?php
		wp_list_categories(array(
			'show_option_all'    => '',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 1,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude'            => '',
			'exclude_tree'       => '',
			'include'            => '',
			'hierarchical'       => 1,
			'title_li'           => '',
			'show_option_none'   => '',
			'number'             => null,
			'echo'               => 1,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,
			'taxonomy'           => 'category',
			'walker'             => null
		));
	?>
	</div>
	
</div>


<!-- Start Navigation -->
<div id="nav">
	<div class="row">
		<div class="twelve columns">
			<nav>
				<span class="fa fa-reorder" id="mobileicon">
				</span>
				<div class="logo"><a href="/"><div class="img"></div></a></div>
				<ul class="mega-menu">
					<?php
						wp_list_categories(
					    array(
					    	'title_li'	=> '',
					    	'hide_empty'	=> 0,
					    	'depth'       => 2,
					    	'walker'	=> new CategoryColors_Walker
					    )
						);
					?>
				</ul>
			</nav>
		</div>
	</div>
</div>
<!-- End Navigation -->
<?php get_template_part('template-breaking-news'); ?>
<?php get_template_part('template-headline'); ?>
<?php get_template_part('template-breadcrumbs'); ?>
<!-- Start Content -->
<div role="main">