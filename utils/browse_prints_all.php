


<?php


$r = mysqli_query($dbc, $q);
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  //  Display each record:
  echo "\t<tr>
    <td align=\"left\"><a href=\"browse_prints.php?aid={$row['artist_id']}\">{$row['artist']}
    </a></td>
    <td align=\"left\"><a href=\"view_print.php?pid={$row['print_id']}\">{$row['print_name']}</td>
    <td align=\"left\">{$row['description']}</td>
    <td align=\"right\">\${$row['price']}</td>
  </tr>\n";
} //  End of while loop.