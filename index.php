<?php # Script 19.5 - index.php
//  This is the main page for the site.

//  Set the page_title

$page_title = "Make an Impression!";

//  Include the HTML header:
include('includes/header.html');

?>

<!-- carousel -->

<?php
  require_once('utils/index_carousel.php')
?>

<!-- end carousel -->

<h3>Master Painters</h3>
<p><em>We just love arts!</em></p>
<p>With PHP, MySQL and some Bootstrap we have created a fictional entrtaining art gallery with an option of purchase.
  We dont deliver the marchendise, however, your money is well apprecited...</p>

<p>
  Welcome to our site... please use the links above...blah, blah, blah.
</p>

<p>

  N' importe quoi...:
  // The content on this page is introducty text
  // pulled from the database, based upon the
  // selected language:
  // echo $words['intro'];
</p>

<p>
  Now meet our artistic consultants:
</p>

<br />

<!--  artistic consultants  -->
<?php
  require_once('utils/index_artists.php')
?>





// Include the HTML footer file:
<?php
include('includes/footer.html');
?>