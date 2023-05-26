<?php # Script 19.10 - view_crt.php
//  This page displys the contents of the shopping cart.
//  This page also lets the user updat the contents of the cart.

//  Set the page title and include the HTML header:
$page_title = 'View Your Shopping Cart';
include('includes/header.html');

//  Check if the form hs been submitted (to update the cart):

  //  if request method = post
  require_once('utils/view_cart_post.php');



//  buffer

echo '<div id="buffer">
         
<p></p><br />
<p></p><br />
<p></p><br />
</div>';

//  end buffer

//  Disply the cart if it's not empty...
require_once('utils/view_cart_display.php');



include('includes/footer.html');

  //  nejde zmazt
  /* ?> */