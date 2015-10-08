<?php
/*
Plugin Name: Book
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     1.5
Author:      Asmit Rajbhandari
Author URI:  http://URI_Of_The_Plugin_Author
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset
*/
?>


<?php
function Book_plugin(){
	?>
	<div class="bookConsult hidden-xs">

		<div id="consult">
			<a class="" href="<?php echo site_url();?>/contact/">BOOK A <span>CONSULTATION</span></a>
		</div>
		<a class="glyphicon glyphicon-remove" id="close_consult"></a>
	</div>
	<?php
}
function short_code1(){
	Book_plugin();
}
add_shortcode('Book_shortcode', 'short_code1');

?>


