<?php
// Settings
$sendHTML = false;

// Change this to change what the link says.
$linktext = 'This is the mirror blog, you can browse the origin one here: ';

/* recipients */

// Send the post to these addresses
// Uncomment the next line and duplicate to send to multiple addresses
//$to  .= "mary@example.com" . ", " ; // note the comma
$to .= "jiffy.win@gmail.com";

// CC the post to these addresses
// Uncomment the next line and duplicate to send to multiple addresses
//$cc  .= "mary@example.com" . ", " ; // note the comma
$cc .= "jiffy.won@gmail.com";

// BCC the post to these addresses
// Uncomment the next line and duplicate to send to multiple addresses
//$bcc  .= "mary@example.com" . ", " ; // note the comma
$bcc .= "";

//Set this to the address you are sending from
$from = "admin@now-code.com";

function addMailLinkBack($postID) {
	global $linktext;
	$permalinkURL = get_permalink($postID);

	$text = '';
	$text = '<p><font size=-1><a href="' . $permalinkURL . '">' . $linktext . '</a></font></p>';
	// Uncomment the line 'return;' if you do not want a link back to your
	// blog in the e-mail
	// return;
	return $text;
}
?>