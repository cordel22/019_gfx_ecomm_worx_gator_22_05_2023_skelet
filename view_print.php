<?php # Script 19.7 - view_print.php
//  This page displays the details for a particular print.

$row = FALSE; //  ssume nothing!

if (isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
  //  Make sure there is a print ID!
  $pid = $_GET['pid'];

  //  Get the print info:
  require('./mysqli_connect.php');   //  where is the mysqli_connect..?
  //  Connect to the database.


  //  select query 
  require_once('utils/view_print_select_q.php');


  $r = mysqli_query($dbc, $q);
  if (mysqli_num_rows($r) == 1) {
    //  Good to go!
    //  Fetch the information:
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

    //  Start the HTML page:
    $page_title = $row['print_name'];
    include('includes/header.html');

    //  buffer

    echo '<div id="buffer">
         
    <p></p><br />
    <p></p><br />
    <p></p><br />
    </div>';

    //  end buffer

    //  Display a header:
    echo "<div align=\"center\"><b>{$row['print_name']}</b> by {$row['artist']}<br />";

    //  Print the sizze or a default message:
    echo (is_null($row['size'])) ? '(No size information avilable)' : $row['size'];

    echo "<br />\${$row['price']}
      <a href=\"add_cart.php?pid=$pid\">Add to Cart</a>
      </div><br />";

    //  Get the image information and display the image:
    if ($image = @getimagesize("./uploads/$pid.jpg")) {       //  with .jpg
      echo "<div align=\"center\"><img src=\"show_image.php?image=$pid&name="
        . urlencode($row['image_name']) . "\" $image[3] alt=\"{$row['print_name']}\" /></div>\n";
    } else {
      echo "<div align=\"center\">No image avilable.</div>\n";
    }

    //  Add the description or a default message:
    echo '<p align="center">'
      . ((is_null($row['description'])) ? '(No description available)' : $row['description'])
      . '</p>';
  } //  End of the mysqli_num_rows() IF.

  mysqli_close($dbc);
} //  End of $_GET['pid'] IF.

if (!$row) {
  //  Show an error message.
  $page_title = 'Error';
  include('includes/header.html');
  echo '<div align="center">This page haas been accessed in error!</div>';
}

//  Complete the page:
include('includes/footer.html');


  //  za boha nechce ulozit
  
  /* ?> */
