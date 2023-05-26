


<?php

if (isset($_GET['aid']) && filter_var($_GET['aid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    //  Overwrite the query:
    $q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) AS
      artist, print_name, price, description, print_id FROM artists, prints WHERE
      artists.artist_id=prints.artist_id AND prints.artist_id={$_GET['aid']} ORDER BY prints.print_name";
  }



  