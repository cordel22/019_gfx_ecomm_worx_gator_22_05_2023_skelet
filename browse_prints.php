<?php # Script 19.6 - browse_prints.php
$page_title = 'Browse the Prints';
include('includes/header.html');
require('./mysqli_connect.php');

//  select query 
require_once('utils/browse_prints_select_q.php');


//  Are we looking at a particular artist?
require_once('utils/browse_prints_one_artist.php');



//  buffer

echo '<div id="buffer">
         
 <p></p><br />
 <p></p><br />
 <p></p><br />
 </div>';

//  end buffer

//  Create the table hed:
echo '<table border="0" width="90% cellspacing="3" cellpadding="3" align="center">
  <tr>
    <td align="left width="20%"><b>Artist</b></td>
    <td align="left width="20%"><b>Print Name</b></td>
    <td align="left width="40%"><b>Description</b></td>
    <td align="right width="20%"><b>Price</b></td>
  </tr>';

//  Disply all the prints, linked to URLs:
require_once('utils/browse_prints_all.php');


echo '</table>';
mysqli_close($dbc);
include('includes/footer.html');