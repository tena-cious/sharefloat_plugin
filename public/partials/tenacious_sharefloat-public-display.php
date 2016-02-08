<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://amydalrymple.org/
 * @since      1.0.0
 *
 * @package    Tenacious_sharefloat
 * @subpackage Tenacious_sharefloat/public/partials
 *
 * @uses WP_Query
 * @uses get_queried_object()
 * @extends get_the_ID()
 * @see get_the_ID()
 *
 * @return int
 */

function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// <!-- This file should primarily consist of HTML with a little bit of PHP. -->
if(!is_admin() || !is_login_page()) : 

	$options = get_option($this->plugin_name); 
	// print_r($options);

    // Services to Display
    $fblike = $options['fblike'];
    $fbshare = $options['fbshare'];
    $twitter = $options['twitter'];
    $linkedin = $options['linkedin'];
    $pinterest = $options['pinterest'];
    $googleplus = $options['googleplus'];
    $email = $options['email'];

    $services;
    if(!empty($fblike) || !empty($fbshare) || !empty($twitter) || !empty($linkedin) || !empty($pinterest) || !empty($googleplus) || !empty($email)) {
    	$services = 1;
    }

    // Styling
    $bgcolor = $options['bgcolor'];
    $bghover = $options['bghover'];
    $iconcolor = $options['iconcolor'];
    $iconhover = $options['iconhover'];
    // $sideposition = $options['sideposition'];

    // Counts
    $showshares = $options['showshares'];
    $minshares = $options['minshares'];

    $facebookurl = $options['facebookurl'];
    $twittername = $options['twittername'];

    $tracking = $options['tracking'];
    $utmsource = $options['utmsource'];
    $utmmedium = $options['utmmedium'];
    $utmname = $options['utmname'];

    $trackingurl = "";

    // var_dump('$tracking is ' . $tracking);

    $url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    global $post;
	$articletitle = '';
	$pagethumb = '';

    if(is_single()) {
	    $articletitle = $post->post_title; 
    	// var_dump('single: ' . $post->post_title);

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full-size', true);
		$pagethumb = $thumb_url_array[0];
	    // var_dump($pagethumb);   	
    } elseif(is_page() && !(is_home() || is_front_page())) {
	    $articletitle = $post->post_title; 
    	// var_dump('page: ' . $post->post_title);

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full-size', true);
		$pagethumb = $thumb_url_array[0];
	    // var_dump($pagethumb);   
    }

    if($articletitle == '' || null) {
    	$articletitle = get_option( 'blogname' );
    } else {
    	$articletitle = $articletitle . ' on ' . get_option( 'blogname' );
   	}
   	// var_dump($articletitle);

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
	<?php if(!empty($services)) : ?>

		<!-- custom styling per dashboard/admin -->
		<style type="text/css">
		    body.login .tenacious_sharefloat, body.wp-admin .tenacious_sharefloat {
		        display: none; 
		    }

			.tenacious_sharefloat {
				background: <?php if(!empty($bgcolor)) { echo $bgcolor; } else { echo '#000'; } ?>;
			}
			.tenacious_sharefloat, .tenacious_sharefloat a {
				color: <?php if(!empty($iconcolor)) { echo $iconcolor; } else { echo '#fff'; } ?>;
			}
			.tenacious_sharefloat a:hover {
				background: <?php if(!empty($bghover)) { echo $bghover; } else { echo '#000'; } ?>;
				color: <?php if(!empty($iconhover)) { echo $iconhover; } else { echo '#fff'; } ?>;
			}
		</style>

		<!-- WIDGET DISPLAY -->
		<div class="<?php echo $this->plugin_name; ?>">
			<ul>
				<?php if(!empty($fblike) && !empty($facebookurl)) : ?>
					<li>
						<a href="<?php echo $facebookurl ?>" data-share="fblike" target="_blank"><span aria-hidden="true" class="icon-fb_like"></a>
					</li>
				<?php endif; ?>
				
				<?php if(!empty($fbshare)) : ?>
					<li>
						<?php 
						    if ($tracking === 1 && (!empty($utmsource) || !empty($utmmedium) || !empty($utmname))) {
							    if ($utmmedium === "{service}" || null) { 
							    	$utmmedium = 'facebook';
							    }
						    	$trackingurl = "%3Futm_source=$utmsource%26utm_medium=$utmmedium%26utm_campaign=$utmname";
						    	// var_dump($trackingurl);
						    }
						 ?>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url . $trackingurl; ?>" title="Share on Facebook" data-share="fbshare" onclick="window.open(this.href,'newWindow','toolbar=no,menubar=no,resizable,width=600,height=400');return false;"><span aria-hidden="true" class="icon-fb_share"></span></a></li>
				<?php endif; ?>
				
				<?php if(!empty($twitter)) : ?>
					<li>
						<?php 
						    if ($tracking === 1 && (!empty($utmsource) || !empty($utmmedium) || !empty($utmname))) {
							    if ($utmmedium === "{service}" || null || 'facebook') { 
							    	$utmmedium = 'twitter';
							    }
						    	$trackingurl = "%3Futm_source=$utmsource%26utm_medium=$utmmedium%26utm_campaign=$utmname";
						    	// var_dump($trackingurl);
						    }
						 ?>
						<a href="https://twitter.com/intent/tweet?text=<?php echo $articletitle; ?>&url=<?php echo $url . $trackingurl; if(!empty($twittername)) { echo '&via=' . $twittername; } ?>" onclick="window.open(this.href,'newWindow','toolbar=no,menubar=no,resizable,width=600,height=400');return false;"><span aria-hidden="true" class="icon-twitter"></span></a></li>
				<?php endif; ?>
				
				<?php if(!empty($linkedin)) : ?>
					<li>
						<?php 
						    if ($tracking === 1 && (!empty($utmsource) || !empty($utmmedium) || !empty($utmname))) {
							    if ($utmmedium === "{service}" || null || 'facebook' || 'twitter') { 
							    	$utmmedium = 'linkedin';
							    }
						    	$trackingurl = "%3Futm_source=$utmsource%26utm_medium=$utmmedium%26utm_campaign=$utmname";
						    	// var_dump($trackingurl);
						    }
						 ?>
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url . $trackingurl; ?>&title=<?php echo $articletitle; ?>&summary=<?php echo get_option( 'blogdescription' ); ?>" data-share="linkedin" onclick="window.open(this.href,'newWindow','toolbar=no,menubar=no,resizable,width=600,height=400');return false;"><span aria-hidden="true" class="icon-linkedin"></span></a></li>
				<?php endif; ?>
				
				<!-- IS THERE A FEATURED IMAGE?? -->
				<?php 
					if(!empty($pinterest) && has_post_thumbnail()) : ?>
					<li>
						<?php 
						    if ($tracking === 1 && (!empty($utmsource) || !empty($utmmedium) || !empty($utmname))) {
							    if ($utmmedium === "{service}" || null || 'facebook' || 'twitter' || 'linkedin') { 
							    	$utmmedium = 'pinterest';
							    }
						    	$trackingurl = "%3Futm_source=$utmsource%26utm_medium=$utmmedium%26utm_campaign=$utmname";
						    	// var_dump($trackingurl);
						    }
						 ?>
						<a href="https://pinterest.com/pin/create/button/?url=<?php echo $url . $trackingurl; ?>&media=<?php echo $pagethumb; ?>&description=<?php echo $articletitle; ?>" data-share="pinterest" onclick="window.open(this.href,'newWindow','toolbar=no,menubar=no,resizable,width=800,height=400');return false;"><span aria-hidden="true" class="icon-pinterest"></span></a></li>
				<?php endif; ?>
				
				<?php if(!empty($googleplus)) : ?>
					<li>
						<?php 
						    if ($tracking === 1 && (!empty($utmsource) || !empty($utmmedium) || !empty($utmname))) {
							    if ($utmmedium === "{service}" || null || 'facebook' || 'twitter' || 'linkedin' || 'pinterest') { 
							    	$utmmedium = 'googleplus';
							    }
						    	$trackingurl = "%3Futm_source=$utmsource%26utm_medium=$utmmedium%26utm_campaign=$utmname";
						    	// var_dump($trackingurl);
						    }
						 ?>
						<a href="https://plus.google.com/share?url=<?php echo $url . $trackingurl; ?>" data-share="googleplus" onclick="window.open(this.href,'newWindow','toolbar=no,menubar=no,resizable,width=600,height=400');return false;"><span aria-hidden="true" class="icon-googleplus"></span></a></li>
				<?php endif; ?>
				
				<?php if(!empty($email)) : ?>
					<li>
						<?php 
						    if ($tracking === 1 && (!empty($utmsource) || !empty($utmmedium) || !empty($utmname))) {
							    if ($utmmedium === "{service}" || null || 'facebook' || 'twitter' || 'linkedin' || 'pinterest' || 'googleplus') { 
							    	$utmmedium = 'email';
							    }
						    	$trackingurl = "%3Futm_source=$utmsource%26utm_medium=$utmmedium%26utm_campaign=$utmname";
						    	// var_dump($trackingurl);
						    }
						 ?>
						<a href="mailto:?&subject=I think you'll enjoy this!&body=Check%20out%20this%20link%20%C2%BB%20<?php echo $articletitle; ?>%20<?php echo $url . $trackingurl; ?>" data-share="email"><span aria-hidden="true" class="icon-email"></span></a></li>
				<?php endif; ?>
			</ul>

		</div> 

	<?php endif; ?> <!-- endif(!empty($services)) -->
<?php endif; ?> <!-- endif(!is_admin()) -->