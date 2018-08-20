=== Plugin Name ===
Contributors: dazunj
Donate link: http://dasun.blog
Tags: bio collection , custom post types
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin is to maintain the collections of bios of the people 
please not that front-end form submission contains only basic validations
and this plugin was done to get the job done ( of collecting bio ).

TODO ` bio submit froms needs to be secured.`


== Description ==


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `bio-collection.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

== Frequently Asked Questions ==


`Display the submitted profiles` - Create a new page and add the following short code [list]
you can customize number of columns by adding [list col="4"] ,
3 - will add four columns
4 - will add three columns
6 - will add two columns

you can add number of post per page by adding [list count="10"] etc.

`Frontend submission forms` - Create a new page and add following short code to display [submit]

