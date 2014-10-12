<?php
/*
Plugin Name: The J A Mortram Share This Story
Plugin URI: https://github.com/bigflannel/The-J-A-Mortram-Share-This-Story
Description: Once activated, plugin adds 'Share This Story' buttons to the end of a single post before the comments. Posts can be shared on Twitter, Facebook and Google+. This plugin does not embed tags from any of the above services in your WordPress site. Instead it simply posts the page URL and any other information relevant to each network's API.
Version: 1.06
Author: Mike Hartley
Author URI: http://bigflannel.com
License: GPL2

Copyright 2013  Mike Hartley  (email : mike@bigflannel.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists("JAMortramShareThisStory")) {
	class JAMortramShareThisStory {
		function JAMortramShareThisStory() {
			add_action( 'wp_enqueue_scripts', array( $this, "add_css" ) ); 
			add_filter( "comments_template", array( $this, "add_share" ) );
		}
		function add_css() {
			wp_register_style( 'jamortram-share-style', plugins_url( 'jamortram-share.css' , __FILE__ ) );
			wp_enqueue_style( 'jamortram-share-style' );
		}
		function add_share() {
			if ( is_single() ) { ?>
				<h3><?php _e( 'Share This Story', 'the-j-a-mortram-share-this-story' ); ?></h3>
				<nav class="jam-center">	
					<ul>
						<li><a href="http://twitter.com/share?text=<?php echo urlencode(the_title_attribute('echo=0')); ?>&amp;url=<?php echo get_permalink(); ?>" target="_blank"><img class="jam-social-share" src="<?php echo plugins_url( 'img/twitter.png' , __FILE__ ); ?>" alt="share on twitter" /></a>
						</li>
						<li><a href="http://www.facebook.com/sharer.php?title=<?php echo urlencode(the_title_attribute('echo=0')); ?>&amp;u=<?php echo get_permalink(); ?>"><img class="jam-social-share" src="<?php echo plugins_url( 'img/facebook.png' , __FILE__ ); ?>" alt="share on Facebook" /></a>
						</li>
						<li><a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><img class="jam-social-share" src="<?php echo plugins_url( 'img/gplus.png' , __FILE__ ); ?>" alt="share on Google+" /></a>
						</li>
					</ul>
				</nav>
			<?php }
		}	
	}
}

if (class_exists("JAMortramShareThisStory")) {
    $JAMortramShareThisStory = new JAMortramShareThisStory();
}

?>