


<?php

$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, middle_name, last_name) AS
  artist, print_name, price, description, print_id FROM artists, prints WHERE 
  artists.artist_id = prints.artist_id ORDER BY artists.last_name ASC, prints.print_name ASC";


