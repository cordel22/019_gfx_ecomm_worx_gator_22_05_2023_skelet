


<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //  Handle the form.
    //  Validate the incoming data...
    $errors = array();

    //  Check for a print name:
    if (!empty($_POST['print_name'])) {
      $pn = trim($_POST['print_name']);
    } else {
      $errors[] = 'Please enter the print\'s name!';
    }

    //  Check for an image:
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      //  Create a temporary file name:
      $temp = '../uploads/' . md5($_FILES['image']['name']);    //  spravnu cestu do uploadov!
      //  debug
      echo 'look at $temp variable : $temp = ' . $temp . " \n";
      //  end debug

      //  Move the file over:
      if (move_uploaded_file($_FILES['image']['tmp_name'], $temp)) {
        echo '<p>The file has been uploaded!</p>';

        //  Set the $i variable to the image's name:
        $i = $_FILES['image']['tmp_name'];

        //  debug
        echo 'Set the $i variable to the images name: $i = ' . $i . " \n";
        //  end debug

      } else {  //  Couldn't move the file over.
        $errors[] = 'The file could not be moved.';
        $temp = $_FILES['image']['tmp_name'];
      }
    } else {
      //  No uploaded file.
      $errors[] = 'No file was uploaded.';
      $temp = NULL;
    }

    //   Check for a size (not required)
    $s = (!empty($_POST['size'])) ? trim($_POST['size']) : NULL;
    //  debug
    echo 'Check for a size (not required): $s = ' . $s . " \n";
    //  end debug

    //  Check for a price:
    if (is_numeric($_POST['price']) && ($_POST['price'] > 0)) {
      $p = (float) $_POST['price'];
      //  debug
      echo 'Check for a price: $p = ' . $p . " \n";
      //  end debug
    } else {
      $errors[] = 'Please enter the print\'s price!';
    }

    //  Check for a description (not required):
    $d = (!empty($_POST['description'])) ? trim($_POST['description']) : NULL;
    //  debug
    echo 'Check for a description (not required): $d = ' . $d . " \n";
    //  end debug

    //  Validate the artist...
    if (isset($_POST['artist']) && filter_var($_POST['artist'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
      $a = $_POST['artist'];
      //  debug
      echo 'Validate the artist...: $a = ' . $a . " \n";
      //  end debug
    } else {
      //  No artist selected.
      $errors[] = 'Please select the print\'s artist!';
    }

    if (empty($errors)) {
      //  debug
      echo 'No errors; $a = ' . $a . '\n $pn =  ' . $pn . '\n $p = ' . $p . '\n $s = ' . $s . '\n $d = ' . $d . '\n $i = ' . $i . '\ we should want to connect now... ';
      //  end debug
      //  If everything's OK.
      //  Add the print to the database:
      $q = 'INSERT INTO prints (artist_id, print_name, price, size, description, image_name) VALUES (?, ?, ?, ?, ?, ?)';
      $stmt = mysqli_prepare($dbc, $q);
      mysqli_stmt_bind_param($stmt, 'isdsss', $a, $pn, $p, $s, $d, $i);
      mysqli_stmt_execute($stmt);

      //  Check the results...
      if (mysqli_stmt_affected_rows($stmt) == 1) {

        //  Print a message:
        echo '<p>The print hs been added.</p>';

        //  Rename the image:
        $id = mysqli_stmt_insert_id($stmt);   //  Get the print ID.

        //  debug
        echo 'look at $temp variable : $temp = ' . $temp . " \n";
        //  end debug
        rename($temp, "../uploads/$id.jpg");   //  add .jpg to books template   //   a bach na tu druhu cestu ../dve_bodky/napriklad/

        //  Clear $_POST:
        $_POST = array();
      } else {
        //  Error!
        echo '<p style="font-weight: bold; color: #C00">Your submission could not be processed due to a system error.</p>';
      }

      mysqli_stmt_close($stmt);
    }   //  End of the submission IF.

    //  Check for any errors and print them:
    if (!empty($errors) && is_array($errors)) {
      echo '<h1>Error!</h1>
          <p style="font-weight: bold; color: #C00">The following error(s) occured:<br />';
      foreach ($errors as $msg) {
        echo " - $msg<br />\n";
      }
      echo 'Please reselect the print image and try agin.</p>';
    }

    //  Display the form...
  }   //  zas mi vyslo na viac, ale neni ziadny error..?



  