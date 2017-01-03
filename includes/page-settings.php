<?php
function tracpress_admin_page() {
	?>
	<div class="wrap">
		<h2>TracPress Settings</h2>

		<?php
		$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard_tab';
		if(isset($_GET['tab']))
			$active_tab = $_GET['tab'];

        $ticket_slug = get_option('ticket_slug');
		?>
		<h2 class="nav-tab-wrapper">
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=dashboard_tab" class="nav-tab <?php echo $active_tab == 'dashboard_tab' ? 'nav-tab-active' : ''; ?>"><div class="dashicons dashicons-info"></div></a>
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=install_tab" class="nav-tab <?php echo $active_tab == 'install_tab' ? 'nav-tab-active' : ''; ?>"><div class="dashicons dashicons-editor-help"></div> Installation</a>
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=settings_tab" class="nav-tab <?php echo $active_tab == 'settings_tab' ? 'nav-tab-active' : ''; ?>"><?php _e('Settings', 'tracpress'); ?></a>
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=configurator_tab" class="nav-tab <?php echo $active_tab == 'configurator_tab' ? 'nav-tab-active' : ''; ?>"><?php _e('Configurator', 'tracpress'); ?></a>
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=label_tab" class="nav-tab <?php echo $active_tab == 'label_tab' ? 'nav-tab-active' : ''; ?>"><?php _e('Labels', 'tracpress'); ?></a>
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=email_tab" class="nav-tab <?php echo $active_tab == 'email_tab' ? 'nav-tab-active' : ''; ?>"><div class="dashicons dashicons-email-alt"></div></a>
			<a href="edit.php?post_type=<?php echo $ticket_slug; ?>&page=tracpress_admin_page&amp;tab=maintenance_tab" class="nav-tab <?php echo $active_tab == 'maintenance_tab' ? 'nav-tab-active' : ''; ?>"><div class="dashicons dashicons-admin-generic"></div></a>
		</h2>

		<?php if($active_tab == 'dashboard_tab') {
            // Get the WP built-in version
            $wp_jquery_ver = $GLOBALS['wp_scripts']->registered['jquery']->ver;

            echo '
			<div class="wrap">
				<h2>TracPress</h2>

				<div id="poststuff" class="ui-sortable meta-box-sortables">
					<div class="postbox">
						<h3>Dashboard (Help and general usage)</h3>
						<div class="inside">
							<p>Thank you for using TracPress, a multipurpose, multiuser fully-featured and WordPress-integrated issue tracker plugin.</p>
        					<p>
                                <small>You are using TracPress plugin version <strong>' . TP_PLUGIN_VERSION . '</strong>.</small><br>
                                <small>Dependencies: <a href="http://fontawesome.io/" rel="external">FontAwesome</a> 4.3.0 and jQuery ' . $wp_jquery_ver . '.</small>
                            </p>

							<h4>Help with shortcodes</h4>
							<p>
								Use the shortcode tag <code>[tracpress-add]</code> in any post or page to show the ticket submission form.<br>
								Use the shortcode tag <code>[tracpress-show]</code> in any post or page to display all tickets.<br>
								Use the shortcode tag <code>[tracpress-search]</code> in any post or page to show the search form.<br>
								<br>
								Use the shortcode tag <code>[tracpress-timeline milestone="83"]</code> in any post or page to display all tickets in a specific category (milestone). Use the milestone <b>ID</b>.<br>
								Use the shortcode tag <code>[tracpress-milestone category="83"]</code> in any post or page to display a milestone meter. Use the milestone <b>ID</b>.<br>
								Use the shortcode tag <code>[tracpress-show component="83"]</code> in any post or page to display all tickets in the specified component. Use the component <b>ID</b>.<br>
							</p>
						</div>
					</div>
                    <div class="postbox">
                        <div class="inside">
                            <p>For support, feature requests and bug reporting, please visit the <a href="//getbutterfly.com/" rel="external">official website</a>.</p>
                            <p>&copy;' . date('Y') . ' <a href="//getbutterfly.com/" rel="external"><strong>getButterfly</strong>.com</a> &middot; <a href="//getbutterfly.com/trac/" rel="external">Trac</a> &middot; <small>Code wrangling since 2005</small></p>
                        </div>
                    </div>
				</div>
			</div>';
		} ?>
		<?php if($active_tab == 'install_tab') { ?>
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h3><?php _e('Installation', 'tracpress'); ?></h3>
					<div class="inside">
                        <p>Check the installation steps below and make the required changes.</p>
                        <h2>Basic Installation</h2>
                        <?php
                        $slug = get_option('ticket_slug');
                        $single_template = 'single-' . $slug . '.php';

                        if($slug == '')
                            echo '<p><div class="dashicons dashicons-no"></div> <b>Error:</b> Your ticket slug is not set. Go to <b>Configurator</b> section and set it.</p>';
                        if($slug != '')
                            echo '<p><div class="dashicons dashicons-yes"></div> <b>Note:</b> Your ticket slug is <code>' . $slug . '</code>. If you changed it recently, visit your <b>Permalinks</b> section and resave the changes.</p>';

                        if('' != locate_template($single_template))
                            echo '<p><div class="dashicons dashicons-yes"></div> <b>Note:</b> Your ticket template is available.</p>';

                        if('' == locate_template($single_template)) {
                            echo '<p><div class="dashicons dashicons-no"></div> <b>Error:</b> Your ticket template is not available. Duplicate your <code>single.php</code> template file inside your theme folder, rename it as <code>' . $single_template . '</code> and replace the <code>the_content()</code> section with the code below. A sample template file is also available inside the /documentation/ folder.</p>';
                            echo '<p><code>&lt;?php tp_main(get_the_ID()); ?&gt;</code></p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
		<?php if($active_tab == 'maintenance_tab') { ?>
			<?php
			if(isset($_POST['isResetSubmit'])) {
                global $wpdb;
                $wpdb->query("UPDATE " . $wpdb->prefix . "postmeta SET meta_value = '0' WHERE meta_key = 'votes_count'");
                echo '<div class="updated"><p>Action completed successfully!</p></div>';
			}
			?>
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h3><?php _e('Maintenance', 'tracpress'); ?></h3>
					<div class="inside">
                        <p>All actions available on this page are irreversible. Please be cautious.</p>
						<form method="post" action="">
							<p>
								<input type="submit" name="isResetSubmit" value="Reset all +1s" class="button-primary">
                                <br><small>This option resets <b>all</b> +1s to <b>0</b></small>
							</p>
                        </form>
                    </div>
                </div>
            </div>
		<?php } ?>
		<?php if($active_tab == 'configurator_tab') { ?>
			<?php
			if(isset($_POST['isGSSubmit'])) {
				update_option('ticket_slug',                sanitize_text_field($_POST['ticket_slug']));
				flush_rewrite_rules();
				update_option('tp_id_optional',             sanitize_text_field($_POST['tp_id_optional']));
				update_option('tp_summary_optional',        sanitize_text_field($_POST['tp_summary_optional']));
				update_option('tp_author_optional',         sanitize_text_field($_POST['tp_author_optional']));
				update_option('tp_component_optional',      sanitize_text_field($_POST['tp_component_optional']));
				update_option('tp_priority_optional',       sanitize_text_field($_POST['tp_priority_optional']));
				update_option('tp_severity_optional',       sanitize_text_field($_POST['tp_severity_optional']));
				update_option('tp_milestone_optional',      sanitize_text_field($_POST['tp_milestone_optional']));
				update_option('tp_type_optional',           sanitize_text_field($_POST['tp_type_optional']));
				update_option('tp_workflow_optional',       sanitize_text_field($_POST['tp_workflow_optional']));
				update_option('tp_comments_optional',       sanitize_text_field($_POST['tp_comments_optional']));
				update_option('tp_plus_optional',           sanitize_text_field($_POST['tp_plus_optional']));
				update_option('tp_date_optional',           sanitize_text_field($_POST['tp_date_optional']));

                update_option('tp_upload_secondary', sanitize_text_field($_POST['tp_upload_secondary']));
				update_option('tracpress_allow_components', sanitize_text_field($_POST['tracpress_allow_components']));

				echo '<div class="updated"><p>Settings updated successfully!</p></div>';
			}
			?>
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h3><?php _e('Configurator', 'tracpress'); ?></h3>
					<div class="inside">
                        <p>The <b>Configurator</b> allows you to select which columns will be available to the tickets table.</p>
						<form method="post" action="">
                            <p>
                                <input name="ticket_slug" id="slug" type="text" class="regular-text" placeholder="Image slug" value="<?php echo get_option('ticket_slug'); ?>"> <label for="ticket_slug">Ticket slug</label>
                                <br><small>Use an appropriate slug for your ticket (e.g. <b>ticket</b>, <b>issue</b>)</small>
                            </p>

                            <p>
                                <select name="tp_upload_secondary" id="tp_upload_secondary">
                                    <option value="1"<?php if(get_option('tp_upload_secondary') == 1) echo ' selected'; ?>>Enable secondary upload button</option>
                                    <option value="0"<?php if(get_option('tp_upload_secondary') == 0) echo ' selected'; ?>>Disable secondary upload button</option>
                                </select>
                                <br><small>Enable or disable additional uploads (screenshots, patches, documents).</small>
                            </p>
                            <p>
                                <select name="tracpress_allow_components" id="tracpress_allow_components">
                                    <option value="1"<?php if(get_option('tracpress_allow_components') == 1) echo ' selected'; ?>>Enable components</option>
                                    <option value="0"<?php if(get_option('tracpress_allow_components') == 0) echo ' selected'; ?>>Disable components</option>
                                </select>
                                <br><small>Enable or disable components dropdown.</small>
                            </p>

                            <p>
								<select name="tp_id_optional" id="tp_id_optional">
									<option value="0"<?php if(get_option('tp_id_optional') == 0) echo ' selected'; ?>>Hide ticket number</option>
									<option value="1"<?php if(get_option('tp_id_optional') == 1) echo ' selected'; ?>>Show ticket number</option>
								</select>
								<label for="tp_id_optional">Ticket number column</label>
								<br><small>Show or hide the ticket number (ID)</small>
							</p>
							<p>
								<select name="tp_summary_optional" id="tp_summary_optional">
									<option value="0"<?php if(get_option('tp_summary_optional') == 0) echo ' selected'; ?>>Hide summary</option>
									<option value="1"<?php if(get_option('tp_summary_optional') == 1) echo ' selected'; ?>>Show summary</option>
								</select>
								<label for="tp_summary_optional">Ticket summary</label>
								<br><small>Show or hide the ticket summary (title)</small>
							</p>
							<p>
								<select name="tp_author_optional" id="tp_author_optional">
									<option value="0"<?php if(get_option('tp_author_optional') == 0) echo ' selected'; ?>>Hide reporter</option>
									<option value="1"<?php if(get_option('tp_author_optional') == 1) echo ' selected'; ?>>Show reporter</option>
								</select>
								<label for="tp_author_optional">Ticket reporter</label>
								<br><small>Show or hide the ticket reporter name</small>
							</p>
							<p>
								<select name="tp_component_optional" id="tp_component_optional">
									<option value="0"<?php if(get_option('tp_component_optional') == 0) echo ' selected'; ?>>Hide component</option>
									<option value="1"<?php if(get_option('tp_component_optional') == 1) echo ' selected'; ?>>Show component</option>
								</select>
								<label for="tp_component_optional">Ticket component</label>
								<br><small>Show or hide the ticket component</small>
							</p>
							<p>
								<select name="tp_priority_optional" id="tp_priority_optional">
									<option value="0"<?php if(get_option('tp_priority_optional') == 0) echo ' selected'; ?>>Hide priority</option>
									<option value="1"<?php if(get_option('tp_priority_optional') == 1) echo ' selected'; ?>>Show priority</option>
								</select>
								<label for="tp_priority_optional">Ticket priority</label>
								<br><small>Show or hide the ticket priority</small>
							</p>
							<p>
								<select name="tp_severity_optional" id="tp_severity_optional">
									<option value="0"<?php if(get_option('tp_severity_optional') == 0) echo ' selected'; ?>>Hide severity</option>
									<option value="1"<?php if(get_option('tp_severity_optional') == 1) echo ' selected'; ?>>Show severity</option>
								</select>
								<label for="tp_severity_optional">Ticket severity</label>
								<br><small>Show or hide the ticket severity</small>
							</p>
							<p>
								<select name="tp_milestone_optional" id="tp_milestone_optional">
									<option value="0"<?php if(get_option('tp_milestone_optional') == 0) echo ' selected'; ?>>Hide milestone</option>
									<option value="1"<?php if(get_option('tp_milestone_optional') == 1) echo ' selected'; ?>>Show milestone</option>
								</select>
								<label for="tp_milestone_optional">Ticket milestone</label>
								<br><small>Show or hide the ticket milestone</small>
							</p>
							<p>
								<select name="tp_type_optional" id="tp_type_optional">
									<option value="0"<?php if(get_option('tp_type_optional') == 0) echo ' selected'; ?>>Hide type</option>
									<option value="1"<?php if(get_option('tp_type_optional') == 1) echo ' selected'; ?>>Show type</option>
								</select>
								<label for="tp_type_optional">Ticket type</label>
								<br><small>Show or hide the ticket type</small>
							</p>
							<p>
								<select name="tp_workflow_optional" id="tp_workflow_optional">
									<option value="0"<?php if(get_option('tp_workflow_optional') == 0) echo ' selected'; ?>>Hide workflow</option>
									<option value="1"<?php if(get_option('tp_workflow_optional') == 1) echo ' selected'; ?>>Show workflow</option>
								</select>
								<label for="tp_workflow_optional">Ticket workflow</label>
								<br><small>Show or hide the ticket workflow</small>
							</p>
							<p>
								<select name="tp_comments_optional" id="tp_comments_optional">
									<option value="0"<?php if(get_option('tp_comments_optional') == '0') echo ' selected'; ?>>Hide comments</option>
									<option value="1"<?php if(get_option('tp_comments_optional') == '1') echo ' selected'; ?>>Show comments</option>
								</select>
								<label for="tp_comments_optional">Ticket comments</label>
								<br><small>Show or hide the comments number</small>
							</p>
							<p>
								<select name="tp_plus_optional" id="tp_plus_optional">
									<option value="0"<?php if(get_option('tp_plus_optional') == 0) echo ' selected'; ?>>Hide +1s</option>
									<option value="1"<?php if(get_option('tp_plus_optional') == 1) echo ' selected'; ?>>Show +1s</option>
								</select>
								<label for="tp_plus_optional">Ticket +1s</label>
								<br><small>Show or hide the number of +1s</small>
							</p>
							<p>
								<select name="tp_date_optional" id="tp_date_optional">
									<option value="0"<?php if(get_option('tp_date_optional') == 0) echo ' selected'; ?>>Hide date</option>
									<option value="1"<?php if(get_option('tp_date_optional') == 1) echo ' selected'; ?>>Show date</option>
								</select>
								<label for="tp_date_optional">Ticket date</label>
								<br><small>Show or hide the date</small>
							</p>
							<p>
								<input type="submit" name="isGSSubmit" value="Save Changes" class="button-primary">
							</p>
                        </form>
                    </div>
                </div>
            </div>
		<?php } ?>
		<?php if($active_tab == 'settings_tab') { ?>
			<?php
			if(isset($_POST['isGSSubmit'])) {
				update_option('tp_moderate', sanitize_text_field($_POST['tp_moderate']));
				update_option('tp_registration', sanitize_text_field($_POST['tp_registration']));

				update_option('tp_order', sanitize_text_field($_POST['tp_order']));
				update_option('tp_orderby', sanitize_text_field($_POST['tp_orderby']));

				update_option('tp_timebeforerevote', intval($_POST['tp_timebeforerevote']));
				update_option('tp_createusers', sanitize_text_field($_POST['tp_createusers']));

				echo '<div class="updated"><p>Settings updated successfully!</p></div>';
			}
			?>
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h3><?php _e('Submission and Display Settings', 'tracpress'); ?></h3>
					<div class="inside">
						<form method="post" action="">
							<p>
								<select name="tp_registration" id="tp_registration">
									<option value="0"<?php if(get_option('tp_registration') == '0') echo ' selected'; ?>>Require user registration (recommended)</option>
									<option value="1"<?php if(get_option('tp_registration') == '1') echo ' selected'; ?>>Do not require user registration</option>
								</select>
								<label for="tp_registration"><b>User</b> registration</label>
								<br><small>Require users to be registered and logged in to create tickets</small>
							</p>
							<p>
								<select name="tp_moderate" id="tp_moderate">
									<option value="0"<?php if(get_option('tp_moderate') == '0') echo ' selected'; ?>>Moderate all tickets (recommended)</option>
									<option value="1"<?php if(get_option('tp_moderate') == '1') echo ' selected'; ?>>Do not moderate tickets</option>
								</select>
								<label for="tp_moderate">Ticket moderation</label>
								<br><small>Moderate all submitted tickets (recommended)</small>
							</p>
							<p>
								<select name="tp_createusers" id="tp_createusers">
									<option value="1"<?php if(get_option('tp_createusers') == '1') echo ' selected'; ?>>Create users on ticket submit (subscriber role)</option>
									<option value="0"<?php if(get_option('tp_createusers') == '0') echo ' selected'; ?>>Do not create users on ticket submit (default)</option>
								</select>
								<label for="tp_createusers">User creation</label>
								<br><small>Create a user (subscriber) when a ticket is submitted</small>
							</p>
							<p>
								<input type="number" name="tp_timebeforerevote" id="tp_timebeforerevote" min="1" max="9999" value="<?php echo get_option('tp_timebeforerevote'); ?>">
								<label for="tp_timebeforerevote">Time before voting is allowed again (based on IP, in hours)</label>
								<br><small>Set time before a user is allowed to vote again (maximum is 9999 - more than a year)</small>
							</p>

							<h3>Sorting and Ordering</h3>
							<p>
								<select name="tp_order" id="tp_order">
									<option value="ASC"<?php if(get_option('tp_order') == 'ASC') echo ' selected'; ?>>ASC</option>
									<option value="DESC"<?php if(get_option('tp_order') == 'DESC') echo ' selected'; ?>>DESC</option>
								</select>
								<label for="tp_order">Ticket order type</label>
							</p>
							<p>
								<select name="tp_orderby" id="tp_orderby">
									<option value="none"<?php if(get_option('tp_orderby') == 'none') echo ' selected'; ?>>none</option>
									<option value="ID"<?php if(get_option('tp_orderby') == 'ID') echo ' selected'; ?>>ID</option>
									<option value="author"<?php if(get_option('tp_orderby') == 'author') echo ' selected'; ?>>author</option>
									<option value="title"<?php if(get_option('tp_orderby') == 'title') echo ' selected'; ?>>title</option>
									<option value="name"<?php if(get_option('tp_orderby') == 'name') echo ' selected'; ?>>name</option>
									<option value="date"<?php if(get_option('tp_orderby') == 'date') echo ' selected'; ?>>date</option>
									<option value="modified"<?php if(get_option('tp_orderby') == 'modified') echo ' selected'; ?>>modified</option>
									<option value="rand"<?php if(get_option('tp_orderby') == 'rand') echo ' selected'; ?>>rand</option>
									<option value="comment_count"<?php if(get_option('tp_orderby') == 'comment_count') echo ' selected'; ?>>comment_count</option>
								</select>
								<label for="tp_orderby">Ticket order mode</label>
							</p>

							<p>
								<input type="submit" name="isGSSubmit" value="Save Changes" class="button-primary">
							</p>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if($active_tab == 'email_tab') { ?>
			<?php
			if(isset($_POST['isGSSubmit'])) {
				update_option('tp_notification_email', sanitize_email($_POST['tp_notification_email']));
				update_option('approvednotification', sanitize_text_field($_POST['approvednotification']));
				update_option('declinednotification', sanitize_text_field($_POST['declinednotification']));

				echo '<div class="updated"><p>Settings updated successfully!</p></div>';
			}
			?>
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h3><?php _e('Email Settings', 'tracpress'); ?></h3>
					<div class="inside">
						<form method="post" action="">
							<p>
								<input type="text" name="tp_notification_email" id="tp_notification_email" value="<?php echo get_option('tp_notification_email'); ?>" class="regular-text">
								<label for="tp_notification_email">Administrator email (used for new ticket notification)</label>
								<br><small>The administrator will receive an email notification each time a new ticket is created</small>
								<br><small>Separate multiple addresses with comma</small>
							</p>
							<p>
								<input type="checkbox" id="approvednotification" name="approvednotification" value="yes" <?php if(get_option('approvednotification') == 'yes') echo 'checked'; ?>> <label for="approvednotification">Notify author when ticket is approved</label>
								<br>
								<input type="checkbox" id="declinednotification" name="declinednotification" value="yes" <?php if(get_option('declinednotification') == 'yes') echo 'checked'; ?>> <label for="declinednotification">Notify author when ticket is rejected</label>
							</p>
							<p>
								<input type="submit" name="isGSSubmit" value="Save Changes" class="button-primary">
							</p>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if($active_tab == 'label_tab') { ?>
			<?php
			if(isset($_POST['isGSSubmit'])) {
				update_option('ticket_summary_label', sanitize_text_field($_POST['ticket_summary_label']));
				update_option('ticket_type_label', sanitize_text_field($_POST['ticket_type_label']));
				update_option('ticket_component_label', sanitize_text_field($_POST['ticket_component_label']));
				update_option('ticket_description_label', sanitize_text_field($_POST['ticket_description_label']));
				update_option('ticket_create_label', sanitize_text_field($_POST['ticket_create_label']));
				update_option('ticket_tags_label', sanitize_text_field($_POST['ticket_tags_label']));
				update_option('ticket_version_label', sanitize_text_field($_POST['ticket_version_label']));

				echo '<div class="updated"><p>Settings updated successfully!</p></div>';
			}
			?>
			<div id="poststuff" class="ui-sortable meta-box-sortables">
				<div class="postbox">
					<h3><?php _e('Label Settings', 'tracpress'); ?></h3>
					<div class="inside">
						<form method="post" action="">
							<p>
								<input type="text" name="ticket_summary_label" id="ticket_summary_label" value="<?php echo get_option('ticket_summary_label'); ?>" class="regular-text">
								<label for="ticket_summary_label">Ticket summary label</label>
							</p>
							<p>
								<input type="text" name="ticket_type_label" id="ticket_type_label" value="<?php echo get_option('ticket_type_label'); ?>" class="regular-text">
								<label for="ticket_type_label">Ticket type label (dropdown)</label>
							</p>
							<p>
								<input type="text" name="ticket_component_label" id="ticket_component_label" value="<?php echo get_option('ticket_component_label'); ?>" class="regular-text">
								<label for="ticket_component_label">Ticket component label (dropdown)</label>
							</p>
							<p>
								<input type="text" name="ticket_description_label" id="ticket_description_label" value="<?php echo get_option('ticket_description_label'); ?>" class="regular-text">
								<label for="ticket_description_label">Ticket description label (textarea)</label>
								<br><small>Leave blank to disable</small>
							</p>
							<p>
								<input type="text" name="ticket_tags_label" id="ticket_tags_label" value="<?php echo get_option('ticket_tags_label'); ?>" class="regular-text">
								<label for="ticket_tags_label">Ticket tags label</label>
                                <br><small>Leave blank to disable</small>
							</p>
							<p>
								<input type="text" name="ticket_version_label" id="ticket_version_label" value="<?php echo get_option('ticket_version_label'); ?>" class="regular-text">
								<label for="ticket_version_label">Version label</label>
                                <br><small>Leave blank to disable</small>
							</p>
							<p>
								<input type="text" name="ticket_create_label" id="ticket_create_label" value="<?php echo get_option('ticket_create_label'); ?>" class="regular-text">
								<label for="ticket_create_label">Ticket create label (button)</label>
							</p>

							<p>
								<input type="submit" name="isGSSubmit" value="Save Changes" class="button-primary">
							</p>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
    </div>	
	<?php
}
?>
