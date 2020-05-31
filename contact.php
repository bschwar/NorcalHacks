<?php
require_once("model.php");
	require("header.php");
	
	
?>
<h1 id="center3">Contact Us</h1>

<form id="contactus" action="https://formspree.io/mdowegwp" method="POST">
	<input type="text" name="name" placeholder="Name">
    <input type="text" name="_replyto" placeholder="Email Address">
    <textarea name="message" placeholder="Your Message"></textarea>
	</br>
  <button type="submit">Send</button>
</form>
<?			
	require("footer.php");
