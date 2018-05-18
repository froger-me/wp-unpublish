# WP Unpublish - simple & useful post status for your workflow

WP Unpublish adds a post status "Unpublished" to your WordPress Posts.

Consider the 8 default post statuses that WordPress uses by default:
- **Publish**: Viewable by everyone. (publish)
- **Future**: Scheduled to be published in a future date. (future)
- **Draft**: Incomplete post viewable by anyone with proper user role. (draft)
- **Pending**: Awaiting a user with the publish_posts capability (typically a user assigned the Editor role) to publish. (pending)
- **Private**: Viewable only to WordPress users at Administrator level. (private)
- **Trash**: Posts in the Trash are assigned the trash status. (trash)
- **Auto-Draft**: Revisions that WordPress saves automatically while you are editing. (auto-draft)
- **Inherit** - Used with a child post (such as Attachments and Revisions) to determine the actual status from the parent post. (inherit)

A typical publishing workflow would be:
`Auto-Draft > Draft > Pending > Future > Publish`  
But what then? `Trash`? `Private`? These seem inadapted.

This is where the **Unpublished** (unpublish) post status provided by this plugin comes into play.  
It allows content publishers to assign a dedicated status to content they desire not to be published, and avoid assigning a semantically inaccurate status.

### Installation
Upload the plugin files to the `/wp-content/plugins/WP Unpublish` directory of your WordPress installation.

### Deactivate and Uninstall

When deactivated, all the posts maked Unpublished are not accessible anymore in the wordpress Admin Dashboard.  
When uninstalled, all the posts maked Unpublished are marked Private.

## Hooks - filters

WP Unpublish gives developers the possibilty to debug the plugin using a filter (use un-minified javascript).
___ 

```php
apply_filters( 'wp_unpublish_debug', bool $debug );
```

**Description**  
Filter wether to activate debug mode (use un-minified javascript).  

**Parameters**  
$debug
> (bool) true if debug mode is activated, false otherwise - default false
___ 
