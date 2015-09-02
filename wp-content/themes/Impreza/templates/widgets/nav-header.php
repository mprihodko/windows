<?php defined('ABSPATH') OR die('This script cannot be accessed directly.'); ?>

<?php
/**
 * Header navigation menu block
 *
 * (!) Important: do not overload this template in child theme, as it will be moved to other location in one of the
 * next updates.
 */
global $smof_data;

$menu_hover_animation = 'opacity';
if (isset($smof_data['menu_hover_animation'])){
	if ($smof_data['menu_hover_animation'] == 'FadeIn'){
		$menu_hover_animation = 'opacity';
	}
	elseif ($smof_data['menu_hover_animation'] == 'FadeIn + SlideDown'){
		$menu_hover_animation = 'height';
	}
	elseif ($smof_data['menu_hover_animation'] == 'Material Design Effect'){
		$menu_hover_animation = 'mdesign';
	}
}


$menu_height_class = ( ! empty($smof_data['menu_height']) AND $smof_data['menu_height'] == 1)?' height_full':' height_auto';
$menu_hover_effect_class = ( ! empty($smof_data['menu_hover_effect']) AND $smof_data['menu_hover_effect'] == 1)?' hover_underline':' hover_none';
?>

<!-- NAV -->
<nav class="w-nav layout_hor animation_<?php echo $menu_hover_animation.$menu_height_class; ?>">
	<div class="w-nav-control"></div>
	<ul class="w-nav-list level_1 <?php echo $menu_hover_effect_class;?>">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'impeza_main_menu',
				'container' => 'ul',
				'container_class' => 'w-nav-list',
				'walker' => new Walker_Nav_Menu_us(),
				'items_wrap' => '%3$s',
				'fallback_cb' => false,
			)
		); ?>
	</ul>
</nav><!-- /NAV -->
