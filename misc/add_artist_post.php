



<?php

//  This page allows the administrator to add an artist.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fn = (!empty($_POST['first_name'])) ? trim($_POST['first_name']) : NULL;
    $mn = (!empty($_POST['middle_name'])) ? trim($_POST['middle_name']) : NULL;
    //  }   Azz dole konci tato podmienka

    if (!empty($_POST['last_name'])) {
      $ln = trim($_POST['last_name']);

      //  Add the artist to the database:
      require('../mysqli_connect.php');     //  wehere is your mysql connect..?
      $q = 'INSERT INTO artists (first_name, middle_name, last_name) VALUES (?, ?, ?)';
      $stmt = mysqli_prepare($dbc, $q);
      mysqli_stmt_bind_param($stmt, 'sss', $fn, $mn, $ln);
      mysqli_stmt_execute($stmt);

      //  Check the results...
      if (mysqli_stmt_affected_rows($stmt) == 1) {
        echo '<p>The artist has been added.</p>';
        $_POST = array();
      } else {  //  Error!
        $error = 'The new artist could not be added to the database!';
      }

      //  Close this prepared statement:
      mysqli_stmt_close($stmt);
      mysqli_close($dbc); //  Close the database connection.
    } else {  //  No last name value.
      $error = 'Please enter the artist\'s name!';
    }
  }   //  tato zatvorka vyzera naviac..?  Zevrj end of submission if..?




