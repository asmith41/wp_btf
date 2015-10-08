<?php
/*
Plugin Name: Contact
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     1.5
Author:      John Smith
Author URI:  http://URI_Of_The_Plugin_Author
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset
*/
?>


<?php
$error=false;
function is_valid(&$subject, &$message){
			if(!preg_match('/^[A-Z]+$/i',$subject)){
				echo "invalid subject topic entered";
				return $error=true;		
			}
			else{
				$subject=trim($subject);
			}
			if(!preg_match('/^[A-Z]+$/i',$message)){
				echo "invalid message entered";
			return $error=true;
			}
			else{
				$message=trim($message);
			}
			return false;
		}

	function contact_plugin(){
		if( isset($_POST['submit']) ){
			$username=$_POST['username'];
			$subject=$_POST['subject'];
			$message=$_POST['content'];


			echo "<br/>";echo "<br/>";echo "<br/>";echo "<br/>";

			echo $username;

			if(is_valid($subject, $message)== false ){
				echo "</br></br></br>";
				echo $subject."</br>";
				echo $message;	
				
				$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

				mail("asmit@gmail.com",$subject,$message,$headers);
			}
		}
echo '<div class="contain">';
	echo '<form action="" method="post">';
 		echo '<div class="form-group">';
    		echo '<label>Enter Your name</label>';
    		echo '<input  name="username" class="form-control" id="un" required ">';

    		echo '<label>Topic</label>';
    		echo '<input  name="subject" class="form-control" id="un" required ">';
  
    		echo '<label>Message</label>';
   				echo '<textarea class="form-control" rows="5" name="content" id="comment"></textarea>';
 			echo '<div id="button1">';
  				echo '<button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>';
  			echo '</div>';
  		echo '</div>';
	echo '</form>';
echo '</div>';
}

function short_code(){
//	ob_start();
	contact_plugin();
//	ob_get_clean();
}

add_shortcode('contact_shortcode', 'short_code');

?>


