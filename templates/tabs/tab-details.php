<?php
/**
 * @package Helpful
 * @version 4.4.50
 * @since 1.0.0
 */
use Helpful\Core\Helper;
use Helpful\Core\Helpers as Helpers;

/* Prevent direct access */
if (!defined('ABSPATH')) {
	exit;
}

$settings = apply_filters('helpful_editor_settings', false);

do_action('helpful_tab_details_before');
?>

<h2><?php _ex('Details', 'tab name', 'helpful'); ?></h2>

<p><?php _ex('Here you can customize Helpful in detail. You can activate and deactivate many things here. Besides you can decide where Helpful appears and if Helpful appears. If you deactivate Helpful in the posts, you can output Helpful with the help of the shortcut code.', 'tab description', 'helpful'); ?></p>

<form method="post" action="options.php">
	<?php settings_fields('helpful-details-settings-group'); ?>
	<?php do_settings_sections('helpful-details-settings-group'); ?>
	<?php submit_button(__('Save Changes'), 'default'); ?>
	<?php do_action('helpful_details_settings_before'); ?>

	<div class="helpful-admin-panel">
		<button type="button" class="helpful-admin-panel-header">
			<span class="title"><?php echo esc_html_x('Post types', 'admin panel title', 'helpful'); ?></span>
			<span class="icon"></span>
		</button><!-- .helpful-admin-panel-header -->
		<div class="helpful-admin-panel-content">
			<p class="description"><?php echo esc_html_x("Here you can select the post types where Helpful should appear. All selected post types get the table columns for pro and contra, in the wp-admin. Private post types are displayed in light gray and are not always supported.", 'admin panel description', 'helpful'); ?></p>
			<div class="helpful-admin-group">
				<?php if ( $post_types ) : ?>
					<?php foreach ( $post_types as $post_type ) : ?>
						<?php $label = (in_array($post_type, $private_post_types, true)) ? sprintf('<span class="helpful-muted">%s</span>', $post_type) : $post_type; ?>
						<?php if (get_option('helpful_post_types')) : ?>
							<?php $checked = (in_array($post_type, get_option('helpful_post_types'), true)) ? 'checked="checked"' : ''; ?>
							<label class="helpful-inline helpful-margin-right">
								<input type="checkbox" name="helpful_post_types[]" id="helpful_post_types[]" value="<?php echo esc_html($post_type); ?>" <?php echo $checked; ?>/>
								<?php echo $label; ?>
							</label>
						<?php else : ?>
							<label class="helpful-inline helpful-margin-right">
								<input type="checkbox" name="helpful_post_types[]" id="helpful_post_types[]" value="<?php echo esc_html($post_type); ?>"/>
								<?php echo $label; ?>
							</label>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div><!-- .helpful-admin-group -->
		</div><!-- .helpful-admin-panel-content -->
	</div><!-- .helpful-admin-panel -->

	<div class="helpful-admin-panel">
		<button type="button" class="helpful-admin-panel-header">
			<span class="title"><?php echo esc_html_x('General', 'admin panel title', 'helpful'); ?></span>
			<span class="icon"></span>
		</button><!-- .helpful-admin-panel-header -->

		<div class="helpful-admin-panel-content">
		
			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_exists_hide'); ?>
					<input id="helpful_exists_hide" type="checkbox" name="helpful_exists_hide" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Hide Helpful when voted', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_count_hide'); ?>
					<input id="helpful_count_hide" type="checkbox" name="helpful_count_hide" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Hide vote counters', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_credits'); ?>
					<input id="helpful_credits" type="checkbox" name="helpful_credits" <?php checked('on', $value); ?> />
					<?php printf(esc_html_x('Show credits to %s', 'label', 'helpful'), '<a href="https://helpful-plugin.info" target="_blank">helpful-plugin.info</a>'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_hide_in_content'); ?>
					<input id="helpful_hide_in_content" type="checkbox" name="helpful_hide_in_content" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Hide Helpful in post content', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_only_once'); ?>
					<input id="helpful_only_once" type="checkbox" name="helpful_only_once" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Vote only once on the whole website', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_percentages'); ?>
					<input id="helpful_percentages" type="checkbox" name="helpful_percentages" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show percentages in admin if possible', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_hide_admin_columns'); ?>
					<input id="helpful_hide_admin_columns" type="checkbox" name="helpful_hide_admin_columns" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Hide Helpful Admin Columns', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_shrink_admin_columns'); ?>
					<input id="helpful_shrink_admin_columns" type="checkbox" name="helpful_shrink_admin_columns" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Shrink Helpful Admin Columns', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_feedback_disabled'); ?>
					<input id="helpful_feedback_disabled" type="checkbox" name="helpful_feedback_disabled" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Disable feedback completely.', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_ip_user'); ?>
					<input id="helpful_ip_user" type="checkbox" name="helpful_ip_user" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Use the IP address instead of the Helpful ID.', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->
		
			<div class="helpful-admin-group">
				<label>
					<?php $value = get_option('helpful_wordpress_user'); ?>
					<input id="helpful_wordpress_user" type="checkbox" name="helpful_wordpress_user" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Use the WordPress user instead of the Helpful ID (if the user is logged in and votes).', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->
		</div><!-- .helpful-admin-panel-content -->
	</div><!-- .helpful-admin-panel -->
	<div class="helpful-admin-panel">
		<button type="button" class="helpful-admin-panel-header">
			<span class="title"><?php echo esc_html_x('Meta Box', 'admin panel title', 'helpful'); ?></span>
			<span class="icon"></span>
		</button><!-- .helpful-admin-panel-header -->

		<div class="helpful-admin-panel-content">
			<p class="description"><?php echo esc_html_x('Here you can activate the Helpful Meta Box. With this meta box you can see in the current post how many votes you have already received for the current post. You can also reset the votes for the current post.', 'admin panel description', 'helpful'); ?></p>
			
			<div class="helpful-admin-group">
				<label>
					<?php $value = get_option('helpful_metabox'); ?>
					<input id="helpful_metabox" type="checkbox" name="helpful_metabox" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show Meta Box', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->
		</div><!-- .helpful-admin-panel-content -->
	</div><!-- .helpful-admin-panel -->
	<div class="helpful-admin-panel">
		<button type="button" class="helpful-admin-panel-header">
			<span class="title"><?php echo esc_html_x('Dashboard Widget', 'admin panel title', 'helpful'); ?></span>
			<span class="icon"></span>
		</button><!-- .helpful-admin-panel-header -->
		<div class="helpful-admin-panel-content">
			<p class="description"><?php echo esc_html_x('Here you can activate the Helpful Dashboard Widget. There you will find the total number of votes. You will also see the most recently received and the most helpful and less helpful posts.', 'admin panel description', 'helpful'); ?></p>

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_widget'); ?>
					<input id="helpful_widget" type="checkbox" name="helpful_widget" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Hide Dashboard Widget', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_widget_pro'); ?>
					<input id="helpful_widget_pro" type="checkbox" name="helpful_widget_pro" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show most helpful posts', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_widget_contra'); ?>
					<input id="helpful_widget_contra" type="checkbox" name="helpful_widget_contra" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show least helpful posts', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_widget_pro_recent'); ?>
					<input id="helpful_widget_pro_recent" type="checkbox" name="helpful_widget_pro_recent" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show recently helpful posts', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_widget_contra_recent'); ?>
					<input id="helpful_widget_contra_recent" type="checkbox" name="helpful_widget_contra_recent" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show recently unhelpful posts', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->

			<?php if (!Helper::is_feedback_disabled()) : ?>
			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_feedback_widget'); ?>
					<input id="helpful_feedback_widget" type="checkbox" name="helpful_feedback_widget" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Show last feedback in Dashboard Widget', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->
			<?php endif; ?>
	
			<div class="helpful-admin-group helpful-margin-bottom">
				<label>
					<?php $value = get_option('helpful_widget_hide_publication'); ?>
					<input id="helpful_widget_hide_publication" type="checkbox" name="helpful_widget_hide_publication" <?php checked('on', $value); ?> />
					<?php echo esc_html_x('Hide publication date', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->
	
			<div class="helpful-admin-group">
				<label>
					<?php $value = esc_attr(get_option('helpful_widget_amount', 5)); ?>
					<input type="number" id="helpful_widget_amount" name="helpful_widget_amount" class="small-text" min="1" value="<?php echo esc_attr($value); ?>"/>
					<?php echo esc_html_x('Number of entries', 'label', 'helpful'); ?>
				</label>
			</div><!-- .helpful-admin-group -->
		</div><!-- .helpful-admin-panel-content -->
	</div><!-- .helpful-admin-panel -->
	<?php do_action('helpful_details_settings_after'); ?>
	<?php submit_button(__('Save Changes'), 'default'); ?>
</form>

<?php do_action('helpful_tab_details_after'); ?>