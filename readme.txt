=== WP Unpublish ===
Contributors: frogerme
Tags: workflow, post status, publication
Requires at least: 4.9.5
Tested up to: 5.0
Stable tag: trunk
Requires PHP: 7.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

WP Unpublish adds a post status "Unpublished" to your WordPress Posts (Classic Editor).

== Description ==

Consider the 8 default post statuses that WordPress uses by default:
* **Publish**: Viewable by everyone. (publish)
* **Future**: Scheduled to be published in a future date. (future)
* **Draft**: Incomplete post viewable by anyone with proper user role. (draft)
* **Pending**: Awaiting a user with the publish_posts capability (typically a user assigned the Editor role) to publish. (pending)
* **Private**: Viewable only to WordPress users at Administrator level. (private)
* **Trash**: Posts in the Trash are assigned the trash status. (trash)
* **Auto-Draft**: Revisions that WordPress saves automatically while you are editing. (auto-draft)
* **Inherit** - Used with a child post (such as Attachments and Revisions) to determine the actual status from the parent post. (inherit)

A typical publishing workflow would be:
`Auto-Draft` > `Draft` > `Pending` > `Future` > `Publish`  
But what then? `Trash`? `Private`? These seem inadapted.

This is where the **Unpublished** (unpublish) post status provided by this plugin comes into play.  
It allows content publishers to assign a dedicated status to content they desire not to be published, and avoid assigning a semantically inaccurate status.

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin files to the `/wp-content/plugins/unpublish` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Voilà!

== Frequently Asked Questions ==

= What happens when I deactivate the plugin? =

When deactivated, all the posts maked Unpublished are not accessible anymore in the wordpress Admin Dashboard.  

= What happens when I uninstall the plugin? =

When uninstalled, all the posts maked Unpublished are marked Private.

== Changelog ==
= 1.1.1 =
* Fix warning on non-post edit pages
* WC tested up to: 3.9.2

= 1.1 =
* Bump version and support notice for WordPress 5.0

= 1.0 =
* First version
