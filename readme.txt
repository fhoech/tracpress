=== TracPress ===
Contributors: butterflymedia, fhoech
Tags: ticket, issue, tracker, bug, management
License: GPLv3
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 2.0

== Description ==

TracPress is an enhanced issue tracking system for software development projects. TracPress uses a minimalistic approach to web-based software project management. TracPress is a WordPress-powered ticket manager and issue tracker featuring multiple projects, multiple users, milestones, attachments and much more.

== Installation ==

1. Upload the 'tracpress' folder to your '/wp-content/plugins/' directory
2. Activate the plugin via the Plugins menu in WordPress
4. A new TracPress menu will appear in WordPress with options and general help

== Changelog ==

= 2.1 =
* Added 'notabug' resolution

= 2.0 =
* Support ticket revisions
* Changed permalink structure to prepend ticket slug
* Added quick edit metabox
* Set default ticket status to 'new'
* Streamlined ticket display and form layout
* Added 'duplicate', 'implemented', 'cantfix', 'worksforme' and 'rejected' resolutions
* Added version field to ticket edit metabox
* Added ability to query by ticket terms, status, resolution and version
* Added option to set default sort for tickets to modified date
* Automatically flush rewrite rules when changing ticket slug
* Ticket description is now treated like other post content (i.e. can contain linebreaks and formatting) and can be edited with the WP visual editor in the frontend
* Changed ticket slug to use the post ID
* Added ability to provide 'taxonomy', 'field' and 'offset' parameters to tracpress-timeline shortcode and change sort order to modified date
* Added ability to provide 'taxonomy', 'field', 'resolution' and 'version' parameters to tracpress-milestone shortcode
* Only notify for post status transitions if the post is a tracpress ticket
* Added some more theme templates to documentation folder (based on twentyfourteen theme)

= 1.4 =
* FIX: Removed wrong title sanitization
* FEATURE: Added component shortcode to list all tickets in the specified component
* UPDATE: Updated meter style

= 1.3 =
* UPDATE: Updated plugin URL

= 1.2.1 =
* FIX: Removed limit of posts for milestone ticket count

= 1.2 =
* Updated FontAwesome to 4.3.0

= 1.1 =
* Checked for ticket moderation before showing a link to the ticket
* Added more translation strings (2) and removed unused ones (11)

= 1.0 =
* First public release
