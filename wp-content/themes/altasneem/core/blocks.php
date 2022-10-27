<?php
global $icon;
$icon = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false"><path d="M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg>';

function block_category($categories, $post)
{
	global $icon;
	if ($post->post_type == 'page') {

		$welcoop_blocks = array_merge(
			$categories,
			array(
				array(
					'slug' => 'altasneem',
					'title' => __('Altasneem', 'altasneem'),
					'icon'  => $icon,
				)
			)
		);
	} else {

		return $categories;
	}

	return $welcoop_blocks;
}
add_filter('block_categories', 'block_category', 3, 2);




function blocks_init()
{
	global 	$icon;

	// register a Home Slider block
	acf_register_block_type(array(
		'name'				=> 'home-slider',
		'title'				=> __('Home Slider'),
		'description'		=> __('A custom Home Slider block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('home-slider', 'block'),
	));

	// register a About US block
	acf_register_block_type(array(
		'name'				=> 'about-us',
		'title'				=> __('About US'),
		'description'		=> __('A custom About US block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('about-us', 'block'),
	));

	// register a Featured Products block
	acf_register_block_type(array(
		'name'				=> 'featured-products',
		'title'				=> __('Featured Products'),
		'description'		=> __('A custom Featured Products block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('featured-products', 'block'),
	));

	// register a About Honey block
	acf_register_block_type(array(
		'name'				=> 'about-honey',
		'title'				=> __('About Honey'),
		'description'		=> __('A custom About Honey block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('about-honey', 'block'),
	));

	// register a How We Work block
	acf_register_block_type(array(
		'name'				=> 'how-work',
		'title'				=> __('How We Work'),
		'description'		=> __('A custom How We Work block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('how-work', 'block'),
	));

	// register a Offer block
	acf_register_block_type(array(
		'name'				=> 'offer',
		'title'				=> __('Offer'),
		'description'		=> __('A custom Offer block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('offer', 'block'),
	));

	// register a Blog block
	acf_register_block_type(array(
		'name'				=> 'blog',
		'title'				=> __('Blog'),
		'description'		=> __('A custom Blog block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('blog', 'block'),
	));

	// register a Team block
	acf_register_block_type(array(
		'name'				=> 'Team',
		'title'				=> __('Team'),
		'description'		=> __('A custom Team block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('Team', 'block'),
	));


	// register a Contact Us block
	acf_register_block_type(array(
		'name'				=> 'contact-us',
		'title'				=> __('Contact Us'),
		'description'		=> __('A custom Contact Us block.'),
		'render_callback'	=> 'block_render_callback',
		'category'			=> 'altasneem',
		'icon'				=>	$icon,
		'keywords'	=> array('contact-us', 'block'),
	));
 	 	 
	// Check if function exists and hook into setup.
	if (function_exists('acf_register_block_type')) {
		add_action('acf/init', 'register_acf_block_types');
	}
}

add_action('acf/init', 'blocks_init');


if(!function_exists('block_render_callback'))
{
	function block_render_callback($block)
	{
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		// include a template part from within the "includes/block" folder
		if (file_exists(get_theme_file_path("/includes/block/{$slug}.php"))) {
			include(get_theme_file_path("/includes/block/{$slug}.php"));
		}
	}
}


