


<?php



$q = "SELECT artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) FROM artists 
ORDER BY last_name, first_name ASC";
    $r = mysqli_query($dbc, $q);
    if (mysqli_num_rows($r) > 0) {
      while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
        echo "<option value=\"$row[0]\"";
        //  Check for stickyness:
        if (isset($_POST['existing']) && ($_POST['existing'] == $row[0])) echo ' selected="selected"';
        echo ">$row[1]</option>\n";
      }
    } else {
      echo '<option>Please add a new artist first.</option>';
    }
