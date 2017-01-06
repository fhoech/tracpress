<?php

$query_orderby = isset( $_GET['orderby'] ) ? $_GET['orderby'] : 'undefined';
$query_order = isset( $_GET['order'] ) ? $_GET['order'] : 'DESC';

get_header(); ?>

<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="entry-header">
				<h1 class="entry-title alignleft"><?php printf( __( 'Tickets—Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
			</header><!-- .archive-header -->

			<div class="entry-content">

			<?php if ( have_posts() ) : ?>
				<p class="entry-meta" style="text-transform: none">
					Showing results
					<?php echo max( $wp_query->query_vars['paged'] - 1, 0 ) * 20 + 1; ?>
					through
					<?php echo min( max( $wp_query->query_vars['paged'], 1 ) * 20, $wp_query->found_posts ); ?>
					of
					<?php echo $wp_query->found_posts; ?>
					tickets
				</p>
				<?php
					$u = uniqid();

					function tracpress_th( $field, $html, $title=false, $default_order='DESC' ) {
						$query_orderby = isset( $_GET['orderby'] ) ? $_GET['orderby'] : 'undefined';
						$query_order = isset( $_GET['order'] ) ? $_GET['order'] : 'DESC';
						$order = ( $field == $query_orderby ? ( $query_order == 'ASC' ? 'DESC' : 'ASC' ) : $default_order );
						return '<th class="orderby-' . strtolower( sanitize_html_class( $field ) ) . ' order-' . strtolower( sanitize_html_class( $order ) ) . '"' . ( !empty($title) ? ' title="' . esc_html( $title ) . '"' : '' ) . '><a href="' . esc_url( add_query_arg( array( 'orderby' => $field, 'order' => $order ) ) ) . '" rel="nofollow" style="display: inline-block; width: 100%">' . $html . ( $field == $query_orderby ? ( $query_order == 'ASC' ? '&#9650; ' : '&#9660; ' ) : '' ) . '</a></th>';
					}

					$out = '<table id="sortme" class="tracpress-' . $u . ' orderby-' . strtolower( sanitize_html_class( $query_orderby, get_option('tp_orderby') ) ) . ' order-' . strtolower( sanitize_html_class( $query_order, 'DESC' ) ) . '"><thead><tr>';
								if(get_option('tp_id_optional') == 1)
									$out .= tracpress_th('ID', 'Ticket');
								if(get_option('tp_summary_optional') == 1)
									$out .= tracpress_th('title', 'Summary', false, 'ASC');
								if(get_option('tp_author_optional') == 1)
									$out .= tracpress_th('author', 'Reporter', false, 'ASC');
								if(get_option('tp_component_optional') == 1)
									$out .= tracpress_th('component,version', 'Component', false, 'ASC');
								if(get_option('tp_priority_optional') == 1)
									$out .= tracpress_th('priority', '', 'Priority');
								if(get_option('tp_severity_optional') == 1)
									$out .= tracpress_th('severity', '', 'Severity');
								if(get_option('tp_milestone_optional') == 1)
									$out .= tracpress_th('milestone', 'Milestone', false, 'ASC');
								if(get_option('tp_type_optional') == 1)
									$out .= tracpress_th('type', 'Type', false, 'ASC');
								if(get_option('tp_workflow_optional') == 1)
									$out .= tracpress_th('workflow', 'Workflow', false, 'ASC');
								$out .= tracpress_th('resolution,status', 'Status/Resolution', false, 'ASC');
								if(get_option('tp_comments_optional') == 1)
									$out .= tracpress_th('comment_count', '<i class="fa fa-comments"></i>', 'Comments', 'ASC');
								if(get_option('tp_plus_optional') == 1)
									$out .= tracpress_th('votes_count', '+1s');
								if(get_option('tp_date_optional') == 1)
									$out .= tracpress_th('date', 'Date');
							$out .= '</tr></thead>';
					// Start the Loop.
					while ( have_posts() ) : the_post();
						$ticket = get_post();

						$user_info = get_userdata($ticket->post_author);

						$status = get_post_meta($ticket->ID, '_ticket_status', true);
						$resolution = get_post_meta($ticket->ID, '_ticket_resolution', true);
						$version = get_post_meta($ticket->ID, 'ticket_version', true);

						if($status == 'new') $icon = 'file-o';
						if($status == 'accepted') $icon = 'file-o';
						if($status == 'assigned') $icon = 'user';
						if($status == 'reviewing') $icon = 'wrench';
						if($status == 'closed') $icon = 'check';
						if($status == 'reopened') $icon = 'file-o';

						if($status == '') $icon = 'question';

						if($resolution == 'cantfix') $icon = 'close';
						if($resolution == 'duplicate') $icon = 'files-o';
						if($resolution == 'invalid') $icon = 'close';
						if($resolution == 'postpone') $icon = 'clock-o';
						if($resolution == 'rejected') $icon = 'close';
						if($resolution == 'wontdo') $icon = 'close';
						if($resolution == 'wontfix') $icon = 'close';
						if($resolution == 'worksforme') $icon = 'times';

						$out .= '<tr class="tracpress-status-' . ($status ? $status : 'unset') . ' tracpress-resolution-' . ($resolution ? $resolution : 'unset') . '">';
							if(get_option('tp_id_optional') == 1) {
								$out .= '<td style="white-space: nowrap"><i class="fa fa-fw fa-' . $icon . '" title="' . tracpress_resolution_desc($status ? $status : 'unset') . (!empty($resolution) && $resolution != 'resolved' ? ' as ' . tracpress_resolution_desc($resolution) : '') . '"></i> ';
								if ($status == 'closed') $out .= '<del>';
								$out .= '#' . $ticket->ID;
								if ($status == 'closed') $out .= '</del>';
								$out .= '</td>';
							}
							if(get_option('tp_summary_optional') == 1)
								$out .= '<td><a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/' . $ticket->ID . '/') ) . '">' . get_the_title($ticket->ID) . '</a></td>';
							if(get_option('tp_author_optional') == 1)
								$out .= '<td>' . $user_info->display_name . '</td>';
							if(get_option('tp_component_optional') == 1)
								$out .= '<td>' . get_the_term_list($ticket->ID, 'tracpress_ticket_component', '', ', ', '') . (!empty($version) ? ' <a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/version/' . $version) ) . '/">' . $version . '</a>' : '') . '</td>';
							if(get_option('tp_priority_optional') == 1)
								$out .= '<td style="white-space: nowrap">' . get_the_term_list($ticket->ID, 'tracpress_ticket_priority', '', ', ', '') . '</td>';
							if(get_option('tp_severity_optional') == 1)
								$out .= '<td style="white-space: nowrap">' . get_the_term_list($ticket->ID, 'tracpress_ticket_severity', '', ', ', '') . '</td>';
							if(get_option('tp_milestone_optional') == 1)
								$out .= '<td>' . get_the_term_list($ticket->ID, 'tracpress_ticket_milestone', '', ', ', '') . '</td>';
							if(get_option('tp_type_optional') == 1)
								$out .= '<td>' . get_the_term_list($ticket->ID, 'tracpress_ticket_type', '', ', ', '') . '</td>';
							if(get_option('tp_workflow_optional') == 1)
								$out .= '<td style="white-space: nowrap">' . get_the_term_list($ticket->ID, 'tracpress_ticket_workflow', '', ', ', '') . '</td>';
							$out .= '<td style="white-space: nowrap">' . (!empty($resolution) ? '<a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/resolution/' . $resolution) ) . '" title="' . tracpress_resolution_desc($status ? $status : 'unset') . ($resolution != 'resolved' ? ' as ' . tracpress_resolution_desc($resolution) : '') . '">' . tracpress_resolution_desc($resolution) . '</a>' : '<a href="' . esc_url( site_url('/' . get_option('ticket_slug') . '/status/' . $status) ) . '/">' . ucfirst($status) . '</a>') . '</td>';
							if(get_option('tp_comments_optional') == 1)
								$out .= '<td>' . get_comments_number($ticket->ID) . '</td>';
							if(get_option('tp_plus_optional') == 1)
								$out .= '<td>' . getPostLikeLink($ticket->ID, false) . '</td>';
							if(get_option('tp_date_optional') == 1)
								$out .= '<td style="white-space: nowrap">' . get_the_date('', $ticket->ID) . '</td>';
						$out .= '</tr>';

					endwhile;
					$out .= '</table>';
					echo $out;
				?>

			</div>

			<?php

					// Previous/next page navigation.
					if ( function_exists( 'twentyfourteen_paging_nav' ) ) twentyfourteen_paging_nav();

				else :
					echo __('No tickets found!', 'tracpress');
			?>

			</div>

			<?php

				endif;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
</div>

<?php
get_sidebar();
get_footer();
?>