<?php
/**
 * @package WordPress
 * @subpackage Blank Three Column
 * @since BTC 1.0
 */
?>


</div><!-- #content-box -->

</div><!-- #container -->

<div id="footer" role="contentinfo">
		<div id="footerContent">


			<div id="site-info">


				<p><span style="font-style:italic; font-weight:bold">Our Hub</span>: connecting existing networks and communities of media related visionaries</p>

                <table id="footer_logos">
                    <tr>
                        <td>
                            <a href="http://crji.org" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/crji_logo.png" alt="" /></td>
                            </a>
                        <td>
                        <td>
                            <a href="http://activewatch.ro" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/activewatch_logo.png" alt="" /></td>
                            </a>
                        <td>
                            <a href="http://apti.ro" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/apti_logo.png" alt="" />
                            </a>
                        </td>
                        <td>
                            <a href="http://ceata.org" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/ceata_logo.png" alt="" />
                            </a>
                        </td>
                        <td>
                            <a href="http://geo-spatial.org" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/geo-spatial_logo.png" alt="" />
                            </a>
                        </td>
                        <td>
                            <a href="http://rosedu.org" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/rosedu_logo.png" alt="" />
                            </a>
                        </td>
                        <td>
                            <a href="http://fspub.unibuc.ro" target="_blank">
                                <img src="<?php echo bloginfo('template_directory'); ?>/images/fspub_logo.png" alt="" />
                            </a>
                        </td>
                    </tr>
                </table>
			</div><!-- #site-info -->

                <div id="site-generator">

				<div id="contact_button"><a href="mailto:stefancandea@yahoo.de"><img src="<?php echo get_template_directory_uri(); ?>/images/contact_us.png" alt=""/></a></div>
				<div id="logo_button"><img src="<?php echo get_template_directory_uri(); ?>/images/logo_footer.png" alt=""/></div>

            </div><!-- #site-generator -->

		</div><!-- #colophon -->
</div><!-- #footer -->





<?php wp_footer(); ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	$('#menu-item-686 a').attr('href','http://omc.thesponge.eu');
	$('#menu-item-686 a').attr('target','_blank');
	$('#menu-item-686 a').css('height','16px');
	$('#menu-item-686 ').css('background','url("<?php echo get_template_directory_uri(); ?>/images/omc_button.png")');
	//$('#menu-item-686 a').html('<img src="<?php echo get_template_directory_uri(); ?>/images/omc_button.png">');
</script>
</body>
</html>
