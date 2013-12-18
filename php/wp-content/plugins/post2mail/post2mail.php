<?php
/*
Plugin Name: Post 2 Mail
Version: 2.3.1
Plugin URI: http://www.moon-blog.com/2007/12/wordpress-plugin-post2mail-send-post-to-email.html
Description: Mails the current post to the e-mail addresses configured in the post2mail.config.php file.
Author: William Long , Jason Goldsmith (Unteins)
Author URI: http://www.moon-blog.com and http://jason.goldsmith.us
*/ 

function post2mail($post_ID){
	global $linktext;
	require_once('post2mail.config.php');

	$the_post = get_postdata($post_ID);
	$subject = stripslashes($the_post['Title']);
	
	/* message */
	if ($sendHTML) {
		/* To send HTML mail, you can set the Content-type header. */
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		$message = convert_chars($the_post['Content'], 'html');
		$message .= addMailLinkBack($post_ID);
	}
	else {
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=utf-8\r\n";
		$headers .= "Content-Transfer-Encoding: 8bit\r\n";
		$message = stripslashes(strip_tags($the_post['Content']));
		$message .= "\r\n\r\n" . $linktext . ': ' . get_permalink($post_ID); 
		$subject = "=?UTF-8?B?".base64_encode($subject)."?="; 
	}

	/* additional headers */
	$headers .= "From: $from\r\n";
	if ($cc != '') {
		$headers .= "Cc: $cc\r\n";
	}
	if ($bcc != '') {
		$headers .= "Bcc: $bcc\r\n";
	}

	/* and now mail it */
	mail($to, $subject, $message, $headers);
	
	return $post_ID;
}

add_action('publish_post', 'post2mail', 5);
?>
