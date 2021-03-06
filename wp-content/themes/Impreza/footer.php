<?php global $smof_data; ?>
<?php
if ( ! defined('THEME_TEMPLATE') AND FALSE) { ?>
	</div>
	</div>
<?php } ?>
</div>
<!-- /MAIN -->

</div>
<!-- /CANVAS -->

<!-- FOOTER -->
<div class="l-footer">
	<?php if (($smof_data['footer_show_widgets'] != 0 AND rwmb_meta('us_show_subfooter_widgets') == '') OR rwmb_meta('us_show_subfooter_widgets') == 'yes') { ?>
	<!-- subfooter: top -->
	<div class="l-subfooter at_top">
		<div class="l-subfooter-h g-cols offset_default">
		<?php
		$footer_columns = $smof_data['footer_widgets_columns'];
		if ( ! in_array($footer_columns, array(1, 2, 3, 4,))) {
			$footer_columns = 3;
		}
		$footer_column_classes = array (
			1 => 'full-width',
			2 => 'one-half',
			3 => 'one-third',
			4 => 'one-quarter',
		);
		$footer_widget_names = array (
			1 => 'footer_first',
			2 => 'footer_second',
			3 => 'footer_third',
			4 => 'footer_fourth',
		);

		for ($i = 1; $i <= $footer_columns; $i++) {
			?>
			<div class="<?php echo $footer_column_classes[$footer_columns]; ?>">
				<?php dynamic_sidebar($footer_widget_names[$i]) ?>
			</div>
			<?php
		}
		?>

		</div>
	</div>
	<?php } ?>
	<?php if (($smof_data['footer_show_footer'] != 0 AND rwmb_meta('us_show_footer') == '') OR rwmb_meta('us_show_footer') == 'yes') { ?>
	<!-- subfooter: bottom -->
	<div class="l-subfooter at_bottom">
		<div class="l-subfooter-h i-cf">

			<?php if ( has_nav_menu( 'impeza_footer_menu' ) ) { ?>
			<!-- NAV -->
			<nav class="w-nav layout_hor">
				<ul class="w-nav-list level_1">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'impeza_footer_menu',
							'container'       => 'ul',
							'container_class' => 'w-nav-list',
							'walker' => new Walker_Nav_Menu_us(),
							'items_wrap' => '%3$s',
							'fallback_cb' => false,

						));
					?>
				</ul>
			</nav><!-- /NAV -->
			<?php } ?>

			<div class="w-copyright"><?php echo $smof_data['footer_copyright'] ?></div>

		</div>
	</div>
	<?php } ?>

</div>
<!-- /FOOTER -->
<a class="w-toplink" href="#"><i class="fa fa-angle-up"></i></a>
<?php
$header_is_sticky = FALSE;
if (isset($smof_data['header_is_sticky']) AND $smof_data['header_is_sticky'] == 1){
	$header_is_sticky = TRUE;
}
if (rwmb_meta('us_header_type') == 'Sticky Transparent' OR rwmb_meta('us_header_type') == 'Sticky Solid') {
	$header_is_sticky = TRUE;
} elseif (rwmb_meta('us_header_type') == 'Non-sticky') {
	$header_is_sticky = FALSE;
}
$l_submain_padding = NULL;
if ($header_is_sticky AND @$smof_data['main_header_layout'] == 'standard' AND ( ! empty($smof_data['header_main_height']) AND $smof_data['header_main_height'] >= 50 AND $smof_data['header_main_height'] <= 150)) {
	$l_submain_padding = $smof_data['header_main_height'];
} elseif ($header_is_sticky AND in_array(@$smof_data['main_header_layout'], array('extended', 'advanced', 'centered')) AND ( ! empty($smof_data['header_main_height']) AND $smof_data['header_main_height'] >= 50 AND $smof_data['header_main_height'] <= 150) AND ( ! empty($smof_data['header_extra_height']) AND $smof_data['header_extra_height'] >= 36 AND $smof_data['header_extra_height'] <= 60)) {
	$l_submain_padding = $smof_data['header_main_height'] + $smof_data['header_extra_height'];
}
?>
<script type="text/javascript">
	if (window.$us === undefined) window.$us = {};
	$us.canvasOptions = ($us.canvasOptions || {});
<?php if ( ! empty($smof_data['disable_sticky_header_width'])): ?>
	$us.canvasOptions.headerDisableStickyHeaderWidth = <?php echo intval($smof_data['disable_sticky_header_width']); ?>;
<?php endif; ?>
<?php if ( ! empty($smof_data['disable_animation_width'])): ?>
	$us.canvasOptions.headerDisableAnimationWidth = <?php echo intval($smof_data['disable_animation_width']); ?>;
<?php endif; ?>
<?php if ( ! empty($smof_data['header_main_height']) AND $smof_data['header_main_height'] >= 50 AND $smof_data['header_main_height'] <= 150): ?>
	$us.canvasOptions.headerMainHeight = <?php echo intval($smof_data['header_main_height']); ?>;
<?php endif; ?>
<?php if ( ! empty($smof_data['logo_height_sticky']) AND $smof_data['logo_height_sticky'] >= 20 AND $smof_data['logo_height_sticky'] <= 150):
	if (empty($smof_data['header_main_shrinked_height']) OR $smof_data['header_main_shrinked_height'] < $smof_data['logo_height_sticky']) {
		$smof_data['header_main_shrinked_height'] = $smof_data['logo_height_sticky'];
	}
endif; ?>
<?php if ( ! empty($smof_data['header_main_shrinked_height']) AND $smof_data['header_main_shrinked_height'] >= 50 AND $smof_data['header_main_shrinked_height'] <= 150): ?>
	$us.canvasOptions.headerMainShrinkedHeight = <?php echo intval($smof_data['header_main_shrinked_height']); ?>;
<?php endif; ?>
<?php if ( ! empty($smof_data['header_extra_height']) AND $smof_data['header_extra_height'] >= 36 AND $smof_data['header_extra_height'] <= 60): ?>
	$us.canvasOptions.headerExtraHeight = <?php echo intval($smof_data['header_extra_height']); ?>;
<?php endif; ?>
<?php if ($l_submain_padding): ?>
	$us.canvasOptions.firstSubmainPadding = <?php echo intval($l_submain_padding); ?>;
<?php endif; ?>
<?php if (isset($smof_data['responsive_layout']) AND $smof_data['responsive_layout'] == 0): ?>
	$us.canvasOptions.responsive = false;
<?php endif; ?>

	$us.navOptions = ($us.navOptions || {});
<?php if ( ! empty($smof_data['mobile_nav_width']) AND $smof_data['mobile_nav_width'] < "1024"): ?>
	$us.navOptions.mobileWidth = <?php echo intval($smof_data['mobile_nav_width']); ?>;
<?php endif; ?>
<?php if (isset($smof_data['header_menu_togglable'])): ?>
	$us.navOptions.togglable = <?php echo $smof_data['header_menu_togglable']?'true':'false'; ?>;
<?php endif; ?>

	window.ajaxURL = '<?php echo admin_url('admin-ajax.php'); ?>';
	window.nameFieldError = "<?php echo __("Please enter your Name", 'us'); ?>";
	window.emailFieldError = "<?php echo __("Please enter your Email", 'us'); ?>";
	window.phoneFieldError = "<?php echo __("Please enter your Phone Number", 'us'); ?>";
	window.captchaFieldError = "<?php echo __("Please enter the equation result", 'us'); ?>";
	window.messageFieldError = "<?php echo __("Please enter a Message", 'us'); ?>";
	window.messageFormSuccess = "<?php echo __("Thank you! Your message was sent.", 'us'); ?>";
</script>
<?php if($smof_data['tracking_code'] != "") { echo $smof_data['tracking_code']; } ?>
<?php wp_footer(); ?>
</body>
</html>
