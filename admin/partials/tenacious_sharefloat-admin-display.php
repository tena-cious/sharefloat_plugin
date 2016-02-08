<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://amydalrymple.org/
 * @since      1.0.0
 *
 * @package    Tenacious_sharefloat
 * @subpackage Tenacious_sharefloat/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2><?php _e( 'tena.cious Floating Share Bar Options' ) ?></h2>

    <form method="post" name="sharefloat_options" action="options.php">
		<?php
	        //Grab all options
            $options = get_option($this->plugin_name);

	        // Services to Display
	        $fblike = $options['fblike'];
	        $fbshare = $options['fbshare'];
	        $twitter = $options['twitter'];
	        $linkedin = $options['linkedin'];
	        $pinterest = $options['pinterest'];
	        $googleplus = $options['googleplus'];
            $email = $options['email'];

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

            // var_dump($options);
	    ?>

    	<?php settings_fields($this->plugin_name); do_settings_sections($this->plugin_name); ?>

        <input type="hidden" name="sharefloat_hidden" value="Y">
        <?php    echo "<h3>" . __( 'tena.cious Floating Share Bar Settings', 'sharefloat_trdom' ) . "</h3>"; ?>

        <table class="form-table">
            <tr>
                <th scope="row">Select services to display:</th>
                <td>
                    <fieldset>
                        <ul>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-fblike">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-fblike" name="<?php echo $this->plugin_name; ?>[fblike]" value="1" <?php checked( $fblike, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Facebook (Like)', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-fbshare">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-fbshare" name="<?php echo $this->plugin_name; ?>[fbshare]" value="1" <?php checked( $fbshare, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Facebook (Share)', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-twitter">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-twitter" name="<?php echo $this->plugin_name; ?>[twitter]" value="1" <?php checked( $twitter, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Twitter', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-linkedin">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-linkedin" name="<?php echo $this->plugin_name; ?>[linkedin]" value="1" <?php checked( $linkedin, 1 ); ?> />
                                    <span><?php esc_attr_e( 'LinkedIn', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-pinterest">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-pinterest" name="<?php echo $this->plugin_name; ?>[pinterest]" value="1" <?php checked( $pinterest, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Pinterest', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-googleplus">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-googleplus" name="<?php echo $this->plugin_name; ?>[googleplus]" value="1" <?php checked( $googleplus, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Google+', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-email">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-email" name="<?php echo $this->plugin_name; ?>[email]" value="1" <?php checked( $email, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Email', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                        </ul>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">Styling the display:</th>
                <td>
                    <fieldset>
                        <ul>
                            <li><label for="<?php echo $this->plugin_name; ?>-bgcolor">
                                <span>Background color:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[bgcolor]" placeholder="#000000" value="<?php echo $bgcolor ?>" /></label>&nbsp;
                                <div style="background-color: <?php echo $bgcolor ?>; width: 1.4em; height: 1.4em; display: inline-block;">&nbsp;</div></li>
                            <li><label for="<?php echo $this->plugin_name; ?>-bghover">
                                <span>Background color (on hover):</span> <input type="text" name="<?php echo $this->plugin_name; ?>[bghover]" placeholder="#000000" value="<?php echo $bghover ?>" /></label>&nbsp;
                                <div style="background-color: <?php echo $bghover ?>; width: 1.4em; height: 1.4em; display: inline-block;">&nbsp;</div></li>
                            <li><label for="<?php echo $this->plugin_name; ?>-iconcolor">
                                <span>Icon color:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[iconcolor]" placeholder="#ffffff" value="<?php echo $iconcolor ?>" /></label>&nbsp;
                                <div style="background-color: <?php echo $iconcolor ?>; width: 1.4em; height: 1.4em; display: inline-block;">&nbsp;</div></li>
                            <li><label for="<?php echo $this->plugin_name; ?>-iconhover">
                                <span>Icon color (on hover):</span> <input type="text" name="<?php echo $this->plugin_name; ?>[iconhover]" placeholder="#ffffff" value="<?php echo $iconhover ?>" /></label>&nbsp;
                                <div style="background-color: <?php echo $iconhover ?>; width: 1.4em; height: 1.4em; display: inline-block;">&nbsp;</div></li>
            <!--                 <li>
                                <label title='g:i a' for="sideposition">Which side of the browser window should this appear on?</label><br>
                                <input type="radio" name="<?php echo $this->plugin_name; ?>[sideposition]" value="1" <?php checked( '1', '<?php echo $this->plugin_name; ?>[sideposition]' ); if ($sideposition == "1") echo 'checked'; ?> />
                                <span><?php esc_attr_e( 'Left', 'wp_admin_style' ); ?></span>
                                <br>
                                <input type="radio" name="<?php echo $this->plugin_name; ?>[sideposition]" value="2" <?php checked( '2', '<?php echo $this->plugin_name; ?>[sideposition]' ); if ($sideposition == "2") echo 'checked'; ?> />
                                <span><?php esc_attr_e( 'Right', 'wp_admin_style' ); ?></span>
                            </li>
             -->            </ul>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">Additional settings:</th>
                <td>
                    <fieldset>
                        <ul>
                            <li><label for="<?php echo $this->plugin_name; ?>-facebookurl"><span>Facebook Page URL:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[facebookurl]" placeholder="http://facebook.com/YourPageHere" value="<?php echo $facebookurl ?>" /></label></li>
                            <li><label for="<?php echo $this->plugin_name; ?>-twittername"><span>Twitter username:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[twittername]" placeholder="@username" value="<?php echo $twittername ?>" /></label><br><small>(Twitter screen name to append to tweets with the <em>via</em> attribute. Do not include @ symbol.)</small></li>
                        </ul>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">Tracking:</th>
                <td>
                    <fieldset>
                        <legend>Add parameters to your shared URLs to track social traffic sources via Google Analytics.</legend>
                        <ul>
                            <li>
                                <label for="<?php echo $this->plugin_name; ?>-tracking">
                                    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-tracking" name="<?php echo $this->plugin_name; ?>[tracking]" value="tracking" <?php checked( $tracking, 1 ); ?> />
                                    <span><?php esc_attr_e( 'Add tracking?', $this->plugin_name ); ?></span>
                                </label>
                            </li>
                            <li><label for="<?php echo $this->plugin_name; ?>-utmsource"><span>Campaign Source:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[utmsource]" placeholder="tenaciousshareplugin" value="<?php echo $utmsource ?>" /></label></li>
                            <li><label for="<?php echo $this->plugin_name; ?>-utmmedium"><span>Campaign Medium:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[utmmedium]" placeholder="{service}" value="<?php echo $utmmedium ?>" /></label><br><small>(You may use "{service}" to include the share service name (e.g. "facebook", "twitter").)</small></li>
                            <li><label for="<?php echo $this->plugin_name; ?>-utmname"><span>Campaign Name:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[utmname]" placeholder="tenacioushare" value="<?php echo $utmname ?>" /></label></li>
                        </ul>
                    </fieldset>      
                </td>
            </tr>

            <!-- <tr>
                <th scope="row"></th>
                <td>

                </td>
            </tr> -->
        </table>



<!--         <p><strong>Display rules:</strong></p>
        <ul>
            <li><label for="showrules">Where should this appear?</label><br>
                <input type="radio" name="showrules" value="every" checked> Every Page<br>
                <input type="radio" name="showrules" value="postonly"> On Posts Only<br>
        </ul>
 -->

        <fieldset style="display: none;">
            <legend><strong>Sharing counts:</strong></legend>
            <ul>
                <li>
                    <label for="<?php echo $this->plugin_name; ?>-showshares">
                        <input type="checkbox" id="<?php echo $this->plugin_name; ?>-showshares" name="<?php echo $this->plugin_name; ?>[showshares]" value="1" <?php checked( $showshares, 1 ); ?> />
                        <span><?php esc_attr_e( 'Show Share Count?', $this->plugin_name ); ?></span>
                    </label>
                </li>
                <li><label for="<?php echo $this->plugin_name; ?>-minshares"><span>Share Count Minimum:</span> <input type="text" name="<?php echo $this->plugin_name; ?>[minshares]" placeholder="1" value="<?php echo $minshares ?>" /></label><br><small>(Only show the share count when there are at least this many shares.)</small></li>
            </ul>
        </fieldset>

     
        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
    </form>
</div>