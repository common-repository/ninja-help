<?php
/*
	Plugin Name: Ninja Help
	Plugin URI: http://www.customwpninjas.com/
	Description: Ninja Help
	Version: 2.0.1
	Author: CustomWPNinjas
	Author URI: http://www.CustomWPNinjas.com/
*/

/*  Copyright 2012, CustomWPNinjas.com.

Permission to use, copy, modify, and/or distribute this software for any purpose
with or without fee is strickly prohibited.

*/
/*
* Actions & Filters
*/

register_activation_hook( __FILE__, 'Ninja_Help_install' );

function Ninja_Help_install() {}

function Ninja_Help_admin_init() {
	wp_enqueue_script( 'ninja-help-tab-slide-out', plugins_url( 'js/jquery.tabSlideOut.v1.3.js', __FILE__ ) );
	wp_enqueue_style( 'ninja-help-style', plugins_url( 'css/style.css', __FILE__ ) );
}

add_action( 'admin_init', 'Ninja_Help_admin_init' );

function Ninja_Help_notice() {
	if(isset($_POST['Ninja_Help_submit'])) {
		$message  = 'URL : ' . $_POST['Ninja_Help_overall_url'] . '<br />';
		$message .= 'Name : ' . $_POST['Ninja_Help_name'] . '<br />';
		$message .= 'Email : ' . $_POST['Ninja_Help_email'] . '<br />';
		$message .= 'Subject : ' . $_POST['Ninja_Help_sub'] . '<br />';
		$message .= 'Message : ' . $_POST['Ninja_Help_msg'] . '<br />';
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		if(mail ( 'work@rawnuke.com' , 'Msg from Ninja Help Plugin' , $message, $headers )) {
			?>
			<div class="updated">
				<p>Thank you for reaching out to us. We will respond quickly. Stay tuned for a live chat version of this plugin! -= Ninjas =-</p>
			</div>
			<?php
		} else {
			?>
			<div class="updated">
				<p>For some reason your WP settings have blocked our Ninja Message from reaching its destination. Please email us directly at <a href="mailto:ninjas@customwpninjas.com">ninjas@customwpninjas.com</a> so we can fix this issue for you promptly.</p>
			</div>
			<?php
		}

	}
}

add_action( 'admin_notices', 'Ninja_Help_notice' );

function Ninja_Help_admin_footer() {
	
	echo '<div class="slide-out-div"><a class="handle" href="#">Content</a>
			<div class="Ninja-Help-contact-form-wrap">
				<div class="Ninja-Help-contact-form-title">Subscribe To Our FREE SEO News Letter</div>
				<div class="Ninja-Help-contact-form-content">
					<form action="https://madmimi.com/signups/subscribe/97451" id="mad_mimi_signup_form" method="post" target="_blank">
					   <p>Name:<br/><input data-required-field="This field is required" id="signup_name" name="signup[name]" type="text"/></p>
					   <p>Email:<br/><input data-invalid-email="This field is invalid" data-required-field="This field is required" id="signup_email" name="signup[email]" placeholder="you@example.com" type="text"/></p>
					   <p><input data-choose-list="&#8593; Choose a list" data-default-text="Subscribe" data-invalid-text="&#8593; You forgot some required fields" data-submitting-text="Sending..." id="webform_submit_button" name="commit" type="submit" value="Subscribe"/></p>
					</form>
				</div>
				<hr />
				<div id="craftysyntax_1"><script type="text/javascript" src="http://wphostingninjas.com/livehelp/livehelp_js.php?eo=0&amp;department=1&amp;serversession=1&amp;pingtimes=10&amp;dynamic=Y&amp;creditline=W"></script></div>
			</div>
		</div>';
?>
<script>
jQuery(function(){
	jQuery('.slide-out-div').tabSlideOut({
		tabHandle: '.handle',                     //class of the element that will become your tab
		pathToTabImage: '<?php echo plugins_url( 'images/ninja-help.png', __FILE__ ); ?>', //path to the image for the tab //Optionally can be set using css
		imageHeight: '180px',                     //height of tab image           //Optionally can be set using css
		imageWidth: '43px',                       //width of tab image            //Optionally can be set using css
		tabLocation: 'right',                      //side of screen where tab lives, top, right, bottom, or left
		speed: 300,                               //speed of animation
		action: 'click',                          //options: 'click' or 'hover', action to trigger animation
		topPos: '28px',                          //position from the top/ use if tabLocation is left or right
		leftPos: '20px',                          //position from left/ use if tabLocation is bottom or top
		fixedPosition: false                      //options: true makes it stick(fixed position) on scroll
	});
});
</script>
<?php

}
add_action('admin_footer', 'Ninja_Help_admin_footer');

?>