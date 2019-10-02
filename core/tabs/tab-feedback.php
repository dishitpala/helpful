<?php
/**
 * Callback for admin tab.
 *
 * @package Helpful
 * @author  Pixelbart <me@pixelbart.de>
 *
 * @since 1.0.0
 */
global $helpful;

$settings  = $helpful['wp_editor'];
$hook_name = 'helpful_feedback_settings';

ob_start();
require_once HELPFUL_PATH . 'templates/feedback-email.php';
$feedback_email_content = ob_get_contents();
ob_end_clean();
?>

<h2><?php echo esc_html_x( 'Feedback', 'tab name', 'helpful' ); ?></h2>

<p><?php echo esc_html_x( 'Here you can activate a feedback form. The feedback form will be displayed after voting and can be configured here. Please note that the form is not spam protected.', 'tab description', 'helpful' ); ?></p>

<form method="post" action="options.php">

<?php settings_fields( 'helpful-feedback-settings-group' ); ?>
<?php do_settings_sections( 'helpful-feedback-settings-group' ); ?>
<?php submit_button( __( 'Save Changes' ), 'default' ); ?>
<?php do_action( $hook_name . '_before' ); ?>

<div class="helpful-admin-panel">
	<button type="button" class="helpful-admin-panel-header">
		<span class="title"><?php echo esc_html_x( 'Form', 'admin panel title', 'helpful' ); ?></span>
		<span class="icon"></span>
	</button><!-- .helpful-admin-panel-header -->
	<div class="helpful-admin-panel-content">

		<div class="helpful-admin-group helpful-margin-bottom">
			<label>
				<?php $value = get_option( 'helpful_feedback_after_pro' ); ?>
				<input id="helpful_feedback_after_pro" type="checkbox" name="helpful_feedback_after_pro" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Show form after positive vote', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<label>
				<?php $value = get_option( 'helpful_feedback_after_contra' ); ?>
				<input id="helpful_feedback_after_contra" type="checkbox" name="helpful_feedback_after_contra" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Show form after negative vote', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<label>
				<?php $value = get_option( 'helpful_feedback_name' ); ?>
				<input id="helpful_feedback_name" type="checkbox" name="helpful_feedback_name" <?php checked( 'on', $value); ?> /> 
				<?php echo esc_html_x( 'Show name field below the form', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<label>
				<?php $value = get_option( 'helpful_feedback_email' ); ?>
				<input id="helpful_feedback_email" type="checkbox" name="helpful_feedback_email" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Show email field below the form', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group">
			<label>
				<?php $value = get_option( 'helpful_feedback_cancel' ); ?>
				<input id="helpful_feedback_cancel" type="checkbox" name="helpful_feedback_cancel" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Show Cancel button', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

	</div><!-- .helpful-admin-panel-content -->
</div><!-- .helpful-admin-panel -->

<div class="helpful-admin-panel">
	<button type="button" class="helpful-admin-panel-header">
		<span class="title"><?php echo esc_html_x( 'Messages', 'admin panel title', 'helpful' ); ?></span>
		<span class="icon"></span>
	</button><!-- .helpful-admin-panel-header -->
	<div class="helpful-admin-panel-content">

		<p class="description"><?php echo esc_html_x( 'Here you can change the texts that are displayed directly in front of the feedback form. Briefly explain to your visitors why they should give feedback.', 'admin panel description', 'helpful' ); ?></p>

		<div class="helpful-admin-group helpful-margin-bottom">
			<label class="helpful-block" for="helpful_feedback_message_pro"><?php echo esc_html_x( 'Message (pro)', 'option name', 'helpful' ); ?></label>
			<?php wp_editor( get_option( 'helpful_feedback_message_pro' ), 'helpful_feedback_message_pro', $settings ); ?>
			<p class="description"><?php echo esc_html_x( 'This message is displayed if the user has voted positively.', 'option info', 'helpful' ); ?></p>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group">
			<label class="helpful-block" for="helpful_feedback_message_contra"><?php echo esc_html_x( 'Message (contra)', 'option name', 'helpful' ); ?></label>
			<?php wp_editor( get_option( 'helpful_feedback_message_contra' ), 'helpful_feedback_message_contra', $settings ); ?>
			<p class="description"><?php echo esc_html_x( 'This message is displayed if the user has voted negatively.', 'option info', 'helpful' ); ?></p>
		</div><!-- .helpful-admin-group -->

	</div><!-- .helpful-admin-panel-content -->
</div><!-- .helpful-admin-panel -->

<div class="helpful-admin-panel">
	<button type="button" class="helpful-admin-panel-header">
		<span class="title"><?php echo esc_html_x( 'Labels', 'admin panel title', 'helpful' ); ?></span>
		<span class="icon"></span>
	</button><!-- .helpful-admin-panel-header -->
	<div class="helpful-admin-panel-content">

		<p class="description"><?php echo esc_html_x( 'Here you can define the labels for the form fields. The text for the button can also be changed.', 'admin panel description', 'helpful' ); ?></p>

		<div class="helpful-admin-group helpful-margin-bottom">
			<label class="helpful-block" for="helpful_feedback_label_message"><?php echo esc_html_x( 'Message', 'option name', 'helpful' ); ?></label>
			<?php $value = get_option( 'helpful_feedback_label_message', _x( 'Message', 'label for feedback form field', 'helpful' ) ); ?>
			<input class="regular-text" type="text" name="helpful_feedback_label_message" value="<?php echo $value; ?>">
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<label class="helpful-block" for="helpful_feedback_label_name"><?php echo esc_html_x( 'Name', 'option name', 'helpful' ); ?></label>
			<?php $value = get_option( 'helpful_feedback_label_name', _x( 'Name', 'label for feedback form field', 'helpful' ) ); ?>
			<input class="regular-text" type="text" name="helpful_feedback_label_name" value="<?php echo $value; ?>">
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<label class="helpful-block" for="helpful_feedback_label_email"><?php echo esc_html_x( 'Email', 'option name', 'helpful' ); ?></label>
			<?php $value = get_option( 'helpful_feedback_label_email', _x( 'Email', 'label for feedback form field', 'helpful' ) ); ?>
			<input class="regular-text" type="text" name="helpful_feedback_label_email" value="<?php echo $value; ?>">
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<label class="helpful-block" for="helpful_feedback_label_submit"><?php echo esc_html_x( 'Submit', 'option name', 'helpful' ); ?></label>
			<?php $value = get_option( 'helpful_feedback_label_submit', _x( 'Send Feedback', 'label for feedback form field', 'helpful' ) ); ?>
			<input class="regular-text" type="text" name="helpful_feedback_label_submit" value="<?php echo $value; ?>">
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group">
			<label class="helpful-block" for="helpful_feedback_label_cancel"><?php echo esc_html_x( 'Cancel', 'option name', 'helpful' ); ?></label>
			<?php $value = get_option( 'helpful_feedback_label_cancel', _x( 'Cancel', 'label for feedback form field', 'helpful' ) ); ?>
			<input class="regular-text" type="text" name="helpful_feedback_label_cancel" value="<?php echo $value; ?>">
		</div><!-- .helpful-admin-group -->

	</div><!-- .helpful-admin-panel-content -->
</div><!-- .helpful-admin-panel -->

<div class="helpful-admin-panel">
	<button type="button" class="helpful-admin-panel-header">
		<span class="title"><?php echo esc_html_x( 'Admin Area', 'admin panel title', 'helpful' ); ?></span>
		<span class="icon"></span>
	</button><!-- .helpful-admin-panel-header -->
	<div class="helpful-admin-panel-content">

		<p class="description"><?php echo esc_html_x( 'Here you can set settings for the overview in the admin area. Some options only work in combination with other options.', 'admin panel description', 'helpful' ); ?></p>

		<div class="helpful-admin-group helpful-margin-bottom">
			<label>
				<?php $value = get_option( 'helpful_feedback_gravatar' ); ?>
				<input id="helpful_feedback_gravatar" type="checkbox" name="helpful_feedback_gravatar" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Use gravatars when user has left an email', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group">
			<label>
				<?php $value = get_option( 'helpful_feedback_widget' ); ?>
				<input id="helpful_feedback_widget" type="checkbox" name="helpful_feedback_widget" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Show last feedback in Dashboard Widget', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

	</div><!-- .helpful-admin-panel-content -->
</div><!-- .helpful-admin-panel -->

<div class="helpful-admin-panel">
	<button type="button" class="helpful-admin-panel-header">
		<span class="title"><?php echo esc_html_x( 'Emails', 'admin panel title', 'helpful' ); ?></span>
		<span class="icon"></span>
	</button><!-- .helpful-admin-panel-header -->
	<div class="helpful-admin-panel-content">

		<p class="description"><?php echo esc_html_x( 'Here you can specify whether a copy of your feedback should be sent by email. You can specify individual receivers in the metabox below posts. The emails are not spam protected. The emails are sent with wp_mail(). So you can control how these emails are sent with certain plugins.', 'admin panel description', 'helpful' ); ?></p>

		<div class="helpful-admin-group helpful-margin-bottom">
			<label>
				<?php $value = get_option( 'helpful_feedback_email' ); ?>
				<input id="helpful_feedback_email" type="checkbox" name="helpful_feedback_email" <?php checked( 'on', $value ); ?> /> 
				<?php echo esc_html_x( 'Receive feedback by email', 'label', 'helpful' ); ?>
			</label>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<?php $value = get_option( 'helpful_feedback_receivers', get_option( 'admin_email' ) ); ?>
			<label class="helpful-block" for="helpful_feedback_receivers"><?php echo esc_html_x( 'Email Receivers', 'option name', 'helpful' ); ?></label>
			<input class="regular-text" type="text" name="helpful_feedback_receivers" value="<?php echo $value; ?>" />
			<p class="description"><?php echo esc_html_x( 'You can separate multiple emails using commas.', 'option info', 'helpful' ); ?></p>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group helpful-margin-bottom">
			<?php $value = get_option( 'helpful_feedback_subject', _x( 'There\'s new feedback for you.', 'feedback email subject', 'helpful' ) ); ?>
			<label class="helpful-block" for="helpful_feedback_subject"><?php echo esc_html_x( 'Email Subject', 'option name', 'helpful' ); ?></label>
			<input class="regular-text" type="text" name="helpful_feedback_subject" value="<?php echo $value; ?>" />
			<p class="description"><?php echo esc_html_x( 'Here you can set the subject of the email.', 'option info', 'helpful' ); ?></p>
		</div><!-- .helpful-admin-group -->

		<div class="helpful-admin-group">
			<?php $value = get_option( 'helpful_feedback_email_content', $feedback_email_content ); ?>
			<label class="helpful-block" for="helpful_feedback_email_content"><?php echo esc_html_x( 'Email Content', 'option name', 'helpful' ); ?></label>
			<?php wp_editor( $value, 'helpful_feedback_email_content', $settings ); ?>
			<p class="description"><?php echo esc_html_x( 'Here you can define the content of the e-mail. Available tags: {name}, {email}, {message}, {type}, {post_url}, {post_title}, {blog_name}, {blog_url}', 'option info', 'helpful' ); ?></p>
		</div><!-- .helpful-admin-group -->

	</div><!-- .helpful-admin-panel-content -->
</div><!-- .helpful-admin-panel -->

<?php do_action( $hook_name . '_after' ); ?>
<?php submit_button( __( 'Save Changes' ), 'default' ); ?>

</form>
