<?php
function tracpress_registration() {
    $ticket_slug = get_option('ticket_slug');

    // tickets
	$ticket_type_labels = array(
		'name' 					=> _x('Tickets', 'post type general name'),
		'singular_name' 		=> _x('Ticket', 'post type singular name'),
		'add_new' 				=> _x('Add New Ticket', 'image'),
		'add_new_item' 			=> __('Add New Ticket'),
		'edit_item' 			=> __('Edit Ticket'),
		'new_item' 				=> __('Add New Ticket'),
		'all_items' 			=> __('View Tickets'),
		'view_item' 			=> __('View Ticket'),
		'search_items' 			=> __('Search Tickets'),
		'not_found' 			=> __('No tickets found'),
		'not_found_in_trash' 	=> __('No tickets found in trash'), 
		'parent_item_colon' 	=> '',
		'menu_name' 			=> __('TracPress', 'tracpress')
	);

	$ticket_type_args = array(
		'labels' 				=> $ticket_type_labels,
		'public' 				=> true,
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'has_archive' 			=> true,
		'hierarchical' 			=> false,
		'map_meta_cap' 			=> true,
		'menu_position' 		=> null,
		'supports' 				=> array('title', 'editor', 'author', 'comments', 'revisions'),
		'menu_icon' 			=> 'dashicons-flag',
	);

	register_post_type($ticket_slug, $ticket_type_args);

    // types
	$ticket_type_labels = array(
		'name' 					=> _x('Ticket Types', 'taxonomy general name'),
		'singular_name' 		=> _x('Ticket Type', 'taxonomy singular name'),
		'search_items' 			=> __('Search Ticket Types'),
		'all_items' 			=> __('All Ticket Types'),
		'parent_item' 			=> __('Parent Ticket Type'),
		'parent_item_colon' 	=> __('Parent Ticket Type:'),
		'edit_item' 			=> __('Edit Ticket Type'), 
		'update_item' 			=> __('Update Ticket Type'),
		'add_new_item' 			=> __('Add New Ticket Type'),
		'new_item_name' 		=> __('New Ticket Type Name'),
		'menu_name' 			=> __('Ticket Types'),
	);

	$ticket_type_args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $ticket_type_labels,
		'show_ui' 				=> true,
		//'show_admin_column'          => true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => $ticket_slug . '/type'),
	);

	register_taxonomy('tracpress_ticket_type', array($ticket_slug), $ticket_type_args);

    // components
	$ticket_component_labels = array(
		'name' 					=> _x('Ticket Components', 'taxonomy general name'),
		'singular_name' 		=> _x('Ticket Component', 'taxonomy singular name'),
		'search_items' 			=> __('Search Ticket Components'),
		'all_items' 			=> __('All Ticket Components'),
		'parent_item' 			=> __('Parent Ticket Component'),
		'parent_item_colon' 	=> __('Parent Ticket Component:'),
		'edit_item' 			=> __('Edit Ticket Component'), 
		'update_item' 			=> __('Update Ticket Component'),
		'add_new_item' 			=> __('Add New Ticket Component'),
		'new_item_name' 		=> __('New Ticket Component Name'),
		'menu_name' 			=> __('Ticket Components'),
	);

	$ticket_component_args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $ticket_component_labels,
		'show_ui' 				=> true,
		//'show_admin_column'          => true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => $ticket_slug . '/component'),
	);

	register_taxonomy('tracpress_ticket_component', array($ticket_slug), $ticket_component_args);

    // severity
	$ticket_severity_labels = array(
		'name' 					=> _x('Ticket Severities', 'taxonomy general name'),
		'singular_name' 		=> _x('Ticket Severity', 'taxonomy singular name'),
		'search_items' 			=> __('Search Ticket Severities'),
		'all_items' 			=> __('All Ticket Severities'),
		'parent_item' 			=> __('Parent Ticket Severity'),
		'parent_item_colon' 	=> __('Parent Ticket Severity:'),
		'edit_item' 			=> __('Edit Ticket Severity'), 
		'update_item' 			=> __('Update Ticket Severity'),
		'add_new_item' 			=> __('Add New Ticket Severity'),
		'new_item_name' 		=> __('New Ticket Severity Name'),
		'menu_name' 			=> __('Ticket Severities'),
	);

	$ticket_severity_args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $ticket_severity_labels,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => $ticket_slug . '/severity'),
	);

	register_taxonomy('tracpress_ticket_severity', array($ticket_slug), $ticket_severity_args);

    // priority
	$ticket_priority_labels = array(
		'name' 					=> _x('Ticket Priorities', 'taxonomy general name'),
		'singular_name' 		=> _x('Ticket Priority', 'taxonomy singular name'),
		'search_items' 			=> __('Search Ticket Priorities'),
		'all_items' 			=> __('All Ticket Priorities'),
		'parent_item' 			=> __('Parent Ticket Priority'),
		'parent_item_colon' 	=> __('Parent Ticket Priority:'),
		'edit_item' 			=> __('Edit Ticket Priority'), 
		'update_item' 			=> __('Update Ticket Priority'),
		'add_new_item' 			=> __('Add New Ticket Priority'),
		'new_item_name' 		=> __('New Ticket Priority Name'),
		'menu_name' 			=> __('Ticket Priorities'),
	);

	$ticket_priority_args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $ticket_priority_labels,
		'show_ui' 				=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => $ticket_slug . '/priority'),
	);

	register_taxonomy('tracpress_ticket_priority', array($ticket_slug), $ticket_priority_args);

    // milestone
	$ticket_milestone_labels = array(
		'name' 					=> _x('Milestones', 'taxonomy general name'),
		'singular_name' 		=> _x('Milestone', 'taxonomy singular name'),
		'search_items' 			=> __('Search Milestones'),
		'all_items' 			=> __('All Milestones'),
		'parent_item' 			=> __('Parent Milestone'),
		'parent_item_colon' 	=> __('Parent Milestone:'),
		'edit_item' 			=> __('Edit Milestone'), 
		'update_item' 			=> __('Update Milestone'),
		'add_new_item' 			=> __('Add New Milestone'),
		'new_item_name' 		=> __('New Milestone Name'),
		'menu_name' 			=> __('Milestones'),
	);

	$ticket_milestone_args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $ticket_milestone_labels,
		'show_ui' 				=> true,
		//'show_admin_column'          => true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => $ticket_slug . '/milestone'),
	);

	register_taxonomy('tracpress_ticket_milestone', array($ticket_slug), $ticket_milestone_args);

    // workflow
	$ticket_workflow_labels = array(
		'name' 					=> _x('Ticket Workflows', 'taxonomy general name'),
		'singular_name' 		=> _x('Ticket Workflow', 'taxonomy singular name'),
		'search_items' 			=> __('Search Ticket Workflows'),
		'all_items' 			=> __('All Ticket Workflows'),
		'parent_item' 			=> __('Parent Ticket Workflow'),
		'parent_item_colon' 	=> __('Parent Ticket Workflow:'),
		'edit_item' 			=> __('Edit Ticket Workflow'), 
		'update_item' 			=> __('Update Ticket Workflow'),
		'add_new_item' 			=> __('Add New Ticket Workflow'),
		'new_item_name' 		=> __('New Ticket Workflow Name'),
		'menu_name' 			=> __('Ticket Workflows'),
	);

	$ticket_workflow_args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $ticket_workflow_labels,
		'show_ui' 				=> true,
		//'show_admin_column'          => true,
		'query_var' 			=> true,
		'rewrite' 				=> array('slug' => $ticket_slug . '/workflow'),
	);

	register_taxonomy('tracpress_ticket_workflow', array($ticket_slug), $ticket_workflow_args);

    // tags
    $labels = array(
		'name'                       => _x('Ticket Tags', 'Taxonomy General Name', 'tracpress'),
		'singular_name'              => _x('Ticket Tag', 'Taxonomy Singular Name', 'tracpress'),
		'menu_name'                  => __('Ticket Tags', 'tracpress'),
		'all_items'                  => __('All Tags', 'tracpress'),
		'parent_item'                => __('Parent Tag', 'tracpress'),
		'parent_item_colon'          => __('Parent Tag:', 'tracpress'),
		'new_item_name'              => __('New Tag Name', 'tracpress'),
		'add_new_item'               => __('Add New Tag', 'tracpress'),
		'edit_item'                  => __('Edit Tag', 'tracpress'),
		'update_item'                => __('Update Tag', 'tracpress'),
		'separate_items_with_commas' => __('Separate tags with commas', 'tracpress'),
		'search_items'               => __('Search Tags', 'tracpress'),
		'add_or_remove_items'        => __('Add or remove tags', 'tracpress'),
		'choose_from_most_used'      => __('Choose from the most used tags', 'tracpress'),
		'not_found'                  => __('Not Found', 'tracpress'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite' 					 => array('slug' => $ticket_slug . '/tag'),
	);

    register_taxonomy('tracpress_ticket_tag', array($ticket_slug), $args);

	// Quick Edit meta box
	add_filter('manage_' . get_option('ticket_slug') . '_posts_columns', 'tracpress_manage_posts_columns', 10, 2);
	add_action('manage_' . get_option('ticket_slug') . '_posts_custom_column', 'tracpress_manage_posts_custom_column', 10, 2);
	add_action('quick_edit_custom_box', 'quick_edit_tracpress_metabox', 10, 2);
}

function tracpress_manage_posts_columns($posts_columns) {
	$posts_columns['tracpress_column_status'] = 'Status';
	$posts_columns['tracpress_column_resolution'] = 'Resolution';
	$posts_columns['tracpress_column_version'] = 'Version';
	return $posts_columns;
}

function tracpress_manage_posts_custom_column($column, $post_id) {
	if ($column == 'tracpress_column_status')
		echo esc_html( get_post_meta($post_id, '_ticket_status', true) );
	else if ($column == 'tracpress_column_resolution')
		echo esc_html( get_post_meta($post_id, '_ticket_resolution', true) );
	else if ($column == 'tracpress_column_version')
		echo esc_html( get_post_meta($post_id, 'ticket_version', true) );
}

function quick_edit_tracpress_metabox($column_name, $post_type) {
    if ( 'tracpress_column_status' == $column_name ) {
		?>
		<fieldset class="inline-edit-col-right">
			<div class="inline-edit-col">
			<?php
				tracpress_meta_box_callback(NULL);
			?>
			</div>
		</fieldset>
		<script>
			jQuery(function ($) {
				function tracpressQuickEditMetaBox() {
					$('.editinline').click(function () {
						var $this = $(this);
						// Populate after timeout, else it won't work
						setTimeout(function () {
							console.info('Quick edit - ticket status:', $this.parents('tr').children('.tracpress_column_status').text());
							console.info('Quick edit - ticket resolution:', $this.parents('tr').children('.tracpress_column_resolution').text());
							console.info('Quick edit - ticket version:', $this.parents('tr').children('.tracpress_column_version').text());
							$('#tracpress_status').val($this.parents('tr').children('.tracpress_column_status').text());
							$('#tracpress_resolution').val($this.parents('tr').children('.tracpress_column_resolution').text());
							$('#tracpress_version').val($this.parents('tr').children('.tracpress_column_version').text());
						}, 0);
					});
				}
				tracpressQuickEditMetaBox();
				jQuery(document).ajaxComplete(tracpressQuickEditMetaBox);
			});
		</script>
		<?php
    }
}

$timebeforerevote = get_option('tp_timebeforerevote'); // in hours

if(!function_exists('post_like')) {
    function post_like() {
        $nonce = $_POST['nonce'];
        if(!wp_verify_nonce($nonce, 'ajax-nonce'))
            die();

        if(isset($_POST['post_like'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $post_id = intval($_POST['post_id']);

            $meta_IP = get_post_meta($post_id, 'voted_IP');

            $voted_IP = $meta_IP[0];
            if(!is_array($voted_IP))
                $voted_IP = array();

            $meta_count = get_post_meta($post_id, "votes_count", true);

            if(!hasAlreadyVoted($post_id)) {
                $voted_IP[$ip] = time();

                update_post_meta($post_id, "voted_IP", $voted_IP);
                update_post_meta($post_id, "votes_count", ++$meta_count);

                echo $meta_count;
            }
            else
                echo 'already';
        }
        exit;
    }
}

if(!function_exists('hasAlreadyVoted')) {
    function hasAlreadyVoted($post_id) {
        global $timebeforerevote;

        $meta_IP = get_post_meta($post_id, 'voted_IP');
        if(!empty($meta_IP[0]))
            $voted_IP = $meta_IP[0];
        else
            $voted_IP = '';

        if(!is_array($voted_IP))
            $voted_IP = array();

        $ip = $_SERVER['REMOTE_ADDR'];

        if(in_array($ip, array_keys($voted_IP))) {
            $time = $voted_IP[$ip];
            $now = time();

            if(round(($now - $time) / 60) > $timebeforerevote)
                return false;

            return true;
        }

        return false;
    }
}

if(!function_exists('getPostLikeLink')) {
    function getPostLikeLink($post_id, $enable = true) {
        $vote_count = get_post_meta($post_id, 'votes_count', true);
        if(empty($vote_count))
            $vote_count = 0;

        if($enable == true) {
            if(hasAlreadyVoted($post_id))
                $output = '<span class="post-like"><a class="hasvoted" href="#" data-post_id="' . $post_id . '">+1</a> ' . $vote_count . '</span>';
            else
                $output = '<span class="post-like"><a class="hasnotvoted" href="#" data-post_id="' . $post_id . '">+1</a> ' . $vote_count . '</span>';
        }
        else
            $output = '<span class="post-like">' . $vote_count . '</span>';

        return $output;
    }
}

// front-end image editor
function wp_get_object_terms_exclude_filter($terms, $object_ids, $taxonomies, $args) {
    if(isset($args['exclude']) && $args['fields'] == 'all') {
        foreach($terms as $key => $term) {
            foreach($args['exclude'] as $exclude_term) {
                if($term->term_id == $exclude_term) {
                    unset($terms[$key]);
                }
            }
        }
    }
    $terms = array_values($terms);
    return $terms;
}
add_filter('wp_get_object_terms', 'wp_get_object_terms_exclude_filter', 10, 4);

// frontend image editor
function tp_editor() {
    global $post;

    // check if user is author // show author tools
	$action = 'edit';
	if(isset($_GET['d'])) {
		$post_id = $_GET['d'];
		$action = 'delete';
	}
	else if (isset($_POST['post_id'])) {
		$post_id = intval($_POST['post_id']);
	}
	else {
		$post_id = get_the_ID();
	}
	$post_type = get_post_type($post_id);
	$allowed = current_user_can($action . '_' . (('page' == $post_type) ? 'page' : 'post'), $post_id);
	if ((isset($_GET['d']) || isset($_POST['post_id'])) && !$allowed) {
		echo "<p>You are not allowed to $action this ticket.</p>";
	}
    if($post->post_author == get_current_user_id() || $allowed) { ?>
		<div>
			<p><a href="#" class="tp-editor-display" style="display: inline"><i class="fa fa-fw fa-pencil"></i> Edit ticket</a></p>
		</div>
        <?php

        if(isset($_GET['d']) && $allowed) {
            wp_delete_post($post_id);
            echo '<script>window.location.href="' . home_url() . '?deleted"</script>';
        }
        else if('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['post_id']) && !empty($_POST['post_title']) && isset($_POST['update_post_nonce']) && isset($_POST['postcontent']) && wp_verify_nonce($_POST['update_post_nonce'], 'update_post_'. $post_id)) {
			$post = array(
				'ID'             => esc_sql($post_id),
				'post_content'   => (stripslashes($_POST['postcontent'])),
				'post_title'     => esc_sql($_POST['post_title'])
			);
			wp_update_post($post);

			// multiple images
			if(1 == get_option('tp_upload_secondary')) {
				$files = $_FILES['tracpress_additional'];
				if(!empty($files)) {
					foreach($files['name'] as $key => $value) {
						if($files['name'][$key]) {
							$file = array(
								'name' => $files['name'][$key],
								'type' => $files['type'][$key],
								'tmp_name' => $files['tmp_name'][$key],
								'error' => $files['error'][$key],
								'size' => $files['size'][$key]
							);  
						}
						$_FILES = array("tracpress_additional" => $file);
						foreach($_FILES as $file => $array) {
							tracpress_process_image_secondary('tracpress_additional', $post_id, '');
						}
					}
				}
			}
			// end multiple images

			wp_set_object_terms($post_id, (int)$_POST['tracpress_ticket_type'], 'tracpress_ticket_type');
			if(get_option('tracpress_allow_components') == 1)
				wp_set_object_terms($post_id, (int)$_POST['tracpress_ticket_component'], 'tracpress_ticket_component');

			if('' != get_option('ticket_version_label'))
				update_post_meta((int)$post_id, 'ticket_version', (string)$_POST['ticket_version']);

			echo '<script>window.location.href="' . $_SERVER['REQUEST_URI'] . '"</script>';
        }
        ?>
        <div id="info" class="tp-editor">
            <form id="post" class="post-edit front-end-form tracpress-form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <?php wp_nonce_field('update_post_' . $post_id, 'update_post_nonce'); ?>

                <p><input type="text" id="post_title" name="post_title" value="<?php echo get_the_title($post_id); ?>"></p>
                <?php
				wp_editor( get_post_field('post_content', $post_id), 'postcontent', array( 'media_buttons' => false ) );
				?>
				<p></p>

                <?php $tp_category = wp_get_object_terms($post_id, 'tracpress_ticket_type', array('exclude' => array(4))); ?>
                <?php if(get_option('tracpress_allow_components') == 1) $tp_tag = wp_get_post_terms($post_id, 'tracpress_ticket_component'); ?>

                <p>
                    <?php echo tracpress_get_categories_dropdown('tracpress_ticket_type', $tp_category[0]->term_id); ?> 
                    <?php if(get_option('tracpress_allow_components') == 1) echo tracpress_get_tags_dropdown('tracpress_ticket_component', $tp_tag[0]->term_id); ?> 
					<?php if('' != get_option('ticket_version_label')) { ?>
						<input type="text" name="ticket_version" value="<?php echo get_post_meta($post_id, 'ticket_version', true); ?>" placeholder="<?php echo get_option('ticket_version_label'); ?>" style="width: auto">
					<?php } ?>
                </p>

                <?php if(1 == get_option('tp_upload_secondary')) { ?>
				<hr>
					<?php
                    $media = get_attached_media('', $post_id);
                    if($media) {
                        foreach($media as $attachment) {
                            echo '<a href="#" data-id="' . $attachment->ID . '" data-nonce="' . wp_create_nonce('my_delete_post_nonce') . '" class="delete-post tp-action-icon"><i class="fa fa-times-circle"></i></a> ' . $attachment->post_title . '</a> <small>(' . $attachment->post_mime_type . ' | ' . $attachment->post_date . ')</small><br>';
                        }
						?>
						<hr>
						<?php
                    }
                    ?>

                    <p><label for="tracpress_additional"><i class="fa fa-cloud-upload"></i> Add more files...</label><br><input type="file" name="tracpress_additional[]" id="tracpress_additional" multiple></p>
                <?php } ?>

                <hr>
                <p>
                    <input type="submit" value="Update ticket" class="button noir-secondary">
					<?php if (current_user_can(('page' == $post_type) ? 'delete_page' : 'delete_post', $post_id)) { ?>
                    <a href="?d=<?php echo get_the_ID(); ?>" class="ask button tp-floatright"><i class="fa fa-trash-o"></i></a>
					<?php } ?>
                </p>
            </form>
        </div>
        <?php wp_reset_query(); ?>
    <?php }
}

// tp_editor() related actions
add_action('wp_ajax_my_delete_post', 'my_delete_post');
function my_delete_post() {
    $permission = check_ajax_referer('my_delete_post_nonce', 'nonce', false);
    if($permission == false) {
        echo 'error';
    }
    else {
        wp_delete_post($_REQUEST['id']);
        echo 'success';
    }
    die();
}



// main TracPress image function
function tp_main($i) {
	$type = get_the_terms(get_the_ID(), 'tracpress_ticket_type');
	$component = get_the_term_list(get_the_ID(), 'tracpress_ticket_component', '', ', ', '');
	$milestone = get_the_term_list(get_the_ID(), 'tracpress_ticket_milestone', '', ', ', '');
	$priority = get_the_term_list(get_the_ID(), 'tracpress_ticket_priority', '', ', ', '');
	$severity = get_the_term_list(get_the_ID(), 'tracpress_ticket_severity', '', ', ', '');
	$workflow_optional = get_option('tp_workflow_optional');
	if ($workflow_optional) $workflows = get_the_terms(get_the_ID(), 'tracpress_ticket_workflow');
	$tags =  get_the_term_list(get_the_ID(), 'tracpress_ticket_tag', '', ' ', '');
	$ticket_status = get_post_meta(get_the_ID(), '_ticket_status', true);
	$ticket_resolution = get_post_meta(get_the_ID(), '_ticket_resolution', true);
	$ticket_version = get_post_meta(get_the_ID(), 'ticket_version', true);

	if($ticket_status == 'new') $icon = 'file-o';
	if($ticket_status == 'accepted') $icon = 'file-o';
	if($ticket_status == 'assigned') $icon = 'user';
	if($ticket_status == 'reviewing') $icon = 'wrench';
	if($ticket_status == 'closed') $icon = 'check';
	if($ticket_status == 'reopened') $icon = 'file-o';

	if($ticket_status == '') {
		$icon = 'question';
		$ticket_status = 'unopened';
	}
    ?>

    <h3>#<?php echo $i; echo !empty($type) && !is_wp_error($type) ? ' (' . $type[0]->name . ')' : ''; ?> <?php echo get_the_title($i); ?></h3>
	<?php
    // show editor
    tp_editor();
	?>
	<p>
		<?php echo getPostLikeLink($i); ?>
	</p>
    <p>
		<i class="fa fa-fw fa-<?php echo $icon; ?>"></i> <?php echo '<a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/status/' . $ticket_status) ) . '">' . tracpress_resolution_desc($ticket_status) . '</a>'; ?><br>
        <?php
        if(get_option('tracpress_allow_components') == 1 && ($component || $ticket_version))
            echo '<i class="fa fa-fw fa-info-circle"></i> Component: ' . $component . ($ticket_version ? ' <a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/version/' . $ticket_version) ) . '/">' . $ticket_version . '</a>' : '') . ($milestone ? ' | Milestone: ' . $milestone : '') . '<br>';
        ?>
		<i class="fa fa-fw fa-user"></i> Created by <?php the_author_posts_link(); ?> <time datetime="<?php the_time('Y-m-d'); ?>T<?php the_time('H:i:s'); ?>" title="<?php the_time(get_option('date_format')); ?> <?php the_time('H:i:s'); ?>"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></time><br>
		<?php
			if ( ! empty( $workflows ) ) {
				echo '<i class="fa fa-fw fa-cogs"></i> ';
				foreach ( $workflows as $workflow ) {
					$seq = array();
					while ( 1 ) {
						array_unshift( $seq, '<a href="' . get_term_link( $workflow ) . '">' . $workflow->name . '</a>' );
						if ( ! $workflow->parent ) break;
						$workflow = get_term( $workflow->parent );
					}
					echo implode( ', ', $seq );
				}
			}
			if ( $ticket_resolution ) {
				if ( ! empty( $workflows ) ) echo '<br>';
				echo '<i class="fa fa-fw fa-cog"></i>  <a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/resolution/' . $ticket_resolution) ) . '">' . tracpress_resolution_desc($ticket_resolution) . '</a>';
			}
			if ( ! empty( $tags ) ) {
		?>
    <p>
        <small>
			<?php if ( $priority || $severity ) : ?>
				<i class="fa fa-fw fa-exclamation-circle"></i>
				<?php if ( $priority ) : ?>
					Priority: <?php echo $priority; ?>
				<?php endif; ?>
				<?php if ( $priority && $severity ) : ?>
				|
				<?php endif; ?>
				<?php if ( $severity ) : ?>
					Severity: <?php echo $severity; ?>
				<?php endif; ?>
				<br>
			<?php endif; ?>
			<i class="fa fa-fw fa-clock-o"></i> Last modified <time datetime="<?php the_modified_date('Y-m-d'); ?>T<?php the_modified_time('H:i:s'); ?>" title="<?php the_modified_date(get_option('date_format')); ?> <?php the_modified_time('H:i:s'); ?>"><?php echo human_time_diff(get_the_modified_time('U'), current_time('timestamp')) . ' ago'; ?></time>
		</small>
    </p>
	<p class="entry-meta">
		<span class="tag-links">
			<?php
				echo $tags;
			?>
		</span>
		<?php
			}
		?>
	</p>

    <section>
        <hr>
        <?php echo wpautop(make_clickable(get_the_content())); ?>
        <p>
            <?php
            $media = get_attached_media('', $i);
            if($media) {
                echo '<hr>';
                foreach($media as $attachment) {
                    echo '<a href="' . $attachment->guid . '">' . $attachment->post_title . '</a> <small>(' . $attachment->post_mime_type . ' | ' . $attachment->post_date . ')</small></a><br>';
                }
            }
            ?>
        </p>
        <hr>
    </section>

    <section role="navigation">
        <?php previous_post_link('%link', '<i class="fa fa-fw fa-chevron-left"></i> Previous'); ?>
        <?php next_post_link('%link', 'Next <i class="fa fa-fw fa-chevron-right"></i>'); ?>
    </section>

    <?php
}




/**
 * Adds a box to the main column on the ticket edit screens.
 */
function tracpress_add_meta_box() {
    $screens = array(get_option('ticket_slug'));
	foreach($screens as $screen) {
        add_meta_box('tracpress_x', __('Ticket', 'tracpress'), 'tracpress_meta_box_callback', $screen, 'side', 'high');
    }
}
add_action('add_meta_boxes', 'tracpress_add_meta_box');

function tracpress_meta_box_callback($post) {
    wp_nonce_field('tracpress_meta_box', 'tracpress_meta_box_nonce');
    $value1 = $post ? get_post_meta($post->ID, '_ticket_status', true) : '';
    $value2 = $post ? get_post_meta($post->ID, '_ticket_resolution', true) : '';
    $version = $post ? get_post_meta($post->ID, 'ticket_version', true) : '';

    echo '<div><label for="tracpress_status"><span class="title">Current status of the ticket</span><br>';
    echo '<select id="tracpress_status" name="tracpress_status">';
    if ($value1) echo '        <option value="' . esc_attr( $value1 ) . '" selected>' . esc_attr( $value1 ) . '</option>';
    echo '        <option value=""></option>
        <option value="new">new</option>
        <option value="accepted">accepted</option>
        <option value="assigned">assigned</option>
        <option value="reviewing">reviewing</option>
        <option value="closed">closed</option>
        <option value="reopened">reopened</option>
    </select></label></div>';

	echo '<div><label for="tracpress_resolution"><span class="title">Current resolution of the ticket</span><br>';
    echo '<select id="tracpress_resolution" name="tracpress_resolution">';
    if ($value2) echo '        <option value="' . esc_attr( $value2 ) . '" selected>' . esc_attr( $value2 ) . '</option>';
    echo '        <option value=""></option>
        <option value="duplicate">duplicate</option>
        <option value="fixed">fixed</option>
        <option value="implemented">implemented</option>
        <option value="invalid">invalid</option>
        <option value="cantfix">cantfix</option>
        <option value="wontfix">wontfix</option>
        <option value="worksforme">worksforme</option>
        <option value="done">done</option>
        <option value="wontdo">wontdo</option>
        <option value="postpone">postpone</option>
        <option value="rejected">rejected</option>
        <option value="resolved">resolved</option>
    </select></label></div>';

	echo '<div><label for="tracpress_version"><span class="title">Version</span><br>';
    echo '<input type="text" id="tracpress_version" name="tracpress_version" value="' . esc_attr( $version ) . '" /></label></div>';

}

function tracpress_save_meta_box_data($post_id) {
    if(!isset($_POST['tracpress_meta_box_nonce']))
		return;
    if(!wp_verify_nonce($_POST['tracpress_meta_box_nonce'], 'tracpress_meta_box'))
		return;
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if(isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if(!current_user_can('edit_page', $post_id))
			return;
	}
    else {
		if(!current_user_can('edit_post', $post_id))
            return;
    }

//	if(!isset($_POST['tracpress_status']))
//        return;

	$tracpress_status = sanitize_text_field($_POST['tracpress_status']);
	$tracpress_resolution = sanitize_text_field($_POST['tracpress_resolution']);
	$tracpress_version = sanitize_text_field($_POST['tracpress_version']);

	update_post_meta($post_id, '_ticket_status', $tracpress_status);
	update_post_meta($post_id, '_ticket_resolution', $tracpress_resolution);
	update_post_meta($post_id, 'ticket_version', $tracpress_version);
}
add_action('save_post', 'tracpress_save_meta_box_data');

function tracpress_resolution_desc( $resolution ) {
	$map = array( '!closed' => "Open" );
	if ( isset( $map[$resolution] ) ) return $map[ $resolution ];
	if ( substr( $resolution, 0, 1 ) == '!' ) $logical = 'Not ';
	else $logical = '';
	$resolution_sanizized = ltrim( $resolution, '!' );
	$map = array( 'cantfix' => "Can't Fix",
				  'wontfix' => "Won't Fix",
				  'worksforme' => "Works For Me" );
	if ( isset( $map[$resolution_sanizized] ) ) return $map[ $resolution_sanizized ];
	return $logical . ucfirst( $resolution_sanizized );
}

function tracpress_pre_get_posts( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( get_option( 'ticket_slug' ) ) )
		return;

	// Meta query
	$map = array( 'status' => '_ticket_status',
				  'resolution' => '_ticket_resolution',
				  'version' => 'ticket_version',
				  'votes_count' => 'votes_count' );

	$meta_query = array();

	foreach ( $map as $query_var_name => $meta_key ) {
		$query_var = get_query_var( $query_var_name );
		if ( ! empty( $query_var ) ) {
			$query_var = explode( ',', $query_var );
			if ( count( $query_var ) > 1 ) {
				$meta_subquery = array();
				$meta_subquery['relation'] = 'OR';
			}
			else $meta_subquery = &$meta_query;
			foreach ( $query_var as $value ) {
				if ( preg_match( '/[*?[\]]/', $value ) ) {
					// glob-style pattern matching
					if ( substr( $value, 0, 1 ) == '!' ) {
						$compare = 'NOT REGEXP';
						$value = ltrim($value, '!');
					}
					else $compare = 'REGEXP';
					$value = preg_quote( $value );
					$value = str_replace( '\*', '.*', $value );
					$value = str_replace( '\?', '.', $value );
					$value = str_replace( '\[\!', '[^', $value );
					$value = str_replace( '\[', '[', $value );
					$value = str_replace( '\]', ']', $value );
					$value = '^' . $value . '$';
				}
				else if ( substr( $value, 0, 1 ) == '!' ) $compare = '!=';
				else $compare = '=';
				$meta_subquery_subquery = array( 'key' => $meta_key, 'value' => ltrim($value, '!'), 'compare' => $compare );
				if ( count( $query_var ) > 1 )
					$meta_subquery[] = $meta_subquery_subquery;
				else
					$meta_query[$query_var_name] = $meta_subquery_subquery;
			}
			if ( count( $query_var ) > 1 )
				$meta_query[$query_var_name] = $meta_subquery;
		}
	}

	if ( count( $meta_query ) > 0 )
		$query->set( 'meta_query', $meta_query );

	// Sorting
	$orderby = get_query_var( 'orderby' );
	if ( ! empty( $orderby ) ) {
		$order = explode( ',', get_query_var( 'order' ) );
		$orderby = explode( ',', $orderby );
		if ( count( $orderby ) > 1 ) {
			set_query_var( 'orderby', array() );
			unset( $query->query_vars['order'] );
		}
		foreach ( $orderby as $value ) {
			if ( isset( $map[$value] ) && ! isset( $query->query_vars['meta_query'][$value] ) )
				$query->query_vars['meta_query'][$value] = array( 'key' => $map[$value],
																  'compare' => 'EXISTS' );
			if ( count( $orderby ) > 1 ) {
				if ( ! empty( $order ) ) $orderby_order = array_shift( $order );
				$query->query_vars['orderby'][$value] = ! empty( $orderby_order ) ? $orderby_order : 'DESC';
			}
		}
	}

	if ( isset( $query->query_vars['meta_query'] ) && count( $query->query_vars['meta_query'] ) > 1 )
		$query->query_vars['meta_query']['relation'] = 'AND';

	if ( is_post_type_archive( get_option( 'ticket_slug' ) ) && defined( 'WP_DEBUG' ) && WP_DEBUG && current_user_can( 'administrator' ) )
		file_put_contents( __DIR__ . '/query_debug.log', print_r( $query->query_vars, true ) );
}
add_action( 'pre_get_posts', 'tracpress_pre_get_posts', 1 );

function tracpress_register_query_vars( $vars ) {
	$vars[] = 'status';
	$vars[] = 'resolution';
	$vars[] = 'version';
	$vars[] = 'votes_count';
	return $vars;
}
add_filter( 'query_vars', 'tracpress_register_query_vars' );

function tracpress_add_rewrite_tags() {
	add_rewrite_tag( '%status%', '([^&]+)' );
	add_rewrite_tag( '%resolution%', '([^&]+)' );
	add_rewrite_tag( '%version%', '([^&]+)' );
	add_rewrite_tag( '%votes_count%', '([^&]+)' );
}
add_action('init', 'tracpress_add_rewrite_tags', 10, 0);

function tracpress_add_rewrite_rule_meta(&$meta, $pattern, $redirect, $i, $debug) {
	$meta_pattern = '';
	$meta_redirect = '';
	$j = $i;
	foreach ( $meta as $meta_key ) {
		$meta_pattern .= '/(' . implode( '|', $meta ) . ')/([^/]*)';
		$meta_redirect .= '&$matches[' . ( ++ $j ) . ']=$matches[' . ( ++ $j ) . ']';
		if ( $debug ) file_put_contents( __DIR__ . '/rewrite_debug.log', $pattern . $meta_pattern . '/?$' . ' => ' . $redirect . $meta_redirect . "\n", FILE_APPEND );
		add_rewrite_rule( $pattern . $meta_pattern . '/?$', $redirect . $meta_redirect, 'top' );
		if ( $debug ) file_put_contents( __DIR__ . '/rewrite_debug.log', $pattern . $meta_pattern . '/page/([^/]*)/?' . ' => ' . $redirect . $meta_redirect . '&paged=$matches[' . ( $i + 1 ) . ']' . "\n", FILE_APPEND );
		add_rewrite_rule( $pattern . $meta_pattern . '/page/([^/]*)/?', $redirect . $meta_redirect . '&paged=$matches[' . ( $j + 1 ) . ']', 'top' );
	}
}

function tracpress_add_rewrite_rules() {
	$taxonomies = explode( '|', 'type|component|severity|priority|milestone|workflow|tag' );
	$meta = explode( '|', 'status|resolution|version' );

	$debug = defined( 'WP_DEBUG' ) && WP_DEBUG && current_user_can( 'administrator' );
	if ( $debug ) file_put_contents( __DIR__ . '/rewrite_debug.log', '' );

	$pattern = '^' . get_option( 'ticket_slug' );
	$redirect = 'index.php?post_type=' . get_option( 'ticket_slug' );
	$i = 0;
	tracpress_add_rewrite_rule_meta($meta, $pattern, $redirect, $i, $debug);
	foreach ( $taxonomies as $taxonomy ) {
		$pattern .= '/(' . implode( '|', $taxonomies ) . ')/([^/]*)';
		$redirect .= '&tracpress_ticket_$matches[' . ( ++ $i ) . ']=$matches[' . ( ++ $i ) . ']';
		if ( $debug ) file_put_contents( __DIR__ . '/rewrite_debug.log', $pattern . '/?$' . ' => ' . $redirect . "\n", FILE_APPEND );
		add_rewrite_rule( $pattern . '/?$', $redirect, 'top' );
		if ( $debug ) file_put_contents( __DIR__ . '/rewrite_debug.log', $pattern . '/page/([^/]*)/?' . ' => ' . $redirect . '&paged=$matches[' . ( $i + 1 ) . ']' . "\n", FILE_APPEND );
		add_rewrite_rule( $pattern . '/page/([^/]*)/?', $redirect . '&paged=$matches[' . ( $i + 1 ) . ']', 'top' );
		tracpress_add_rewrite_rule_meta($meta, $pattern, $redirect, $i, $debug);
	}
}
add_action('init', 'tracpress_add_rewrite_rules', 10, 0);

function tracpress_orderby_tax_clauses( $clauses, $wp_query ) {
	global $wpdb;
	if ( isset( $wp_query->query['orderby'] ) ) {
		if ( $wp_query->get('orderby') == 'author' || isset( $wp_query->query_vars['orderby']['author'] ) ) {
			$clauses['join'] .= " LEFT JOIN {$wpdb->users} ON {$wpdb->posts}.post_author={$wpdb->users}.ID";
			$clauses['orderby']  = " {$wpdb->users}.display_name " . ( 'ASC' == strtoupper( $wp_query->get('order') ) ? 'ASC' : ( isset( $wp_query->query_vars['orderby']['author'] ) ? $wp_query->query_vars['orderby']['author'] : 'DESC' ) );
		}
		$taxonomies = array( 'component',
							 'priority',
							 'severity',
							 'milestone',
							 'type',
							 'workflow',
							 'tag' );
		foreach ($taxonomies as $taxonomy) {
			if ( $taxonomy == $wp_query->query['orderby'] || isset( $wp_query->query_vars['orderby'][$taxonomy] )  ) {
				//$clauses['join'] .=<<<SQL
 //LEFT OUTER JOIN {$wpdb->term_relationships} AS term_relationships_orderby ON {$wpdb->posts}.ID=term_relationships_orderby.object_id
//LEFT OUTER JOIN {$wpdb->term_taxonomy} AS term_taxonomy_orderby ON (term_relationships_orderby.term_taxonomy_id=term_taxonomy_orderby.term_taxonomy_id)
//LEFT OUTER JOIN {$wpdb->terms} AS terms_orderby ON (term_taxonomy_orderby.term_id=terms_orderby.term_id)
//SQL;
				//$clauses['where'] .= " AND (term_taxonomy_orderby.taxonomy = 'tracpress_ticket_{$taxonomy}' OR term_taxonomy_orderby.taxonomy IS NULL)";
				//$clauses['groupby'] = "term_relationships_orderby.object_id";
				$orderby = $clauses['orderby'];
				//$clauses['orderby'] = "GROUP_CONCAT(terms_orderby.name ORDER BY name ASC) ";
				// http://scribu.net/wordpress/sortable-taxonomy-columns.html
				$clauses['orderby'] = "(
			SELECT GROUP_CONCAT(name ORDER BY name ASC)
			FROM $wpdb->term_relationships
			INNER JOIN $wpdb->term_taxonomy USING (term_taxonomy_id)
			INNER JOIN $wpdb->terms USING (term_id)
			WHERE $wpdb->posts.ID = object_id
			AND taxonomy = 'tracpress_ticket_{$taxonomy}'
			GROUP BY object_id
		) ";
				$clauses['orderby'] .= 'ASC' == strtoupper( $wp_query->get('order') ) ? 'ASC' : ( isset( $wp_query->query_vars['orderby'][$taxonomy] ) ? $wp_query->query_vars['orderby'][$taxonomy] : 'DESC' );
				$clauses['orderby'] .= ", " . $orderby;
			}
		}
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG && current_user_can( 'administrator' ) ) file_put_contents( __DIR__ . '/posts_clauses_debug.log', print_r( $clauses, true ) . "\n\n\n" .  print_r( $wp_query, true ) );
	}
	return $clauses;
}
add_filter('posts_clauses', 'tracpress_orderby_tax_clauses', 10, 2 );
?>
