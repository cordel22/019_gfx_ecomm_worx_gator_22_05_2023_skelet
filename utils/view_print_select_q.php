



<?php


$q = "SELECT CONCAT_WS(' ', first_name, middle_name, last_name) AS
artist, print_name, price, description, size, image_name FROM
artists, prints WHERE artists.artist_id=prints.artist_id AND prints.print_id=$pid";
