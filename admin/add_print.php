
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Add a Print</title>
</head>

<body>
  <?php # Script 19.2 - add_print.php
  //  This page allows the administrator to add  print (product).

  require('../mysqli_connect.php');

  //  if request method = post
  require_once('misc/add_print_post');

  
  ?>

  <h1>Add a Print</h1>
  <form enctype="multipart/form-data" action="add_print.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
    <fieldset>
      <legend>Fill out the form to add print to the catalog:</legend>
      <p><b>Print Name:</b><input type="text" name="print_name" size="30" maxlength="60" value="<?php if (isset($_POST['print_name'])) echo htmlspecialchars($_POST['print_name']); ?>" /></p>

      <p><b>Image:</b> <input type="file" name="image" /></p>

      <p><b>Artist:</b>
        <select name="artist">
          <option>Select One</option>
          <?php //  Retrieve all the artists and add to the pull-down menu.
          require_once('misc/add_print_pulldown_query.php');
          
          mysqli_close($dbc); //  Close the database connection.
          ?>
        </select>
      </p>
      <!-- bacha na cisla! -->
      <p><b>Price:</b> <input type="number" name="price" size="10" maxlength="10" value="<?php
                                                                                          if (isset($_POST['price'])) echo $_POST['price']; ?>" /> <small>Do not include the dollar sign or
          commas.</small></p>
      <!-- tu nechces cisl..? -->
      <p><b>Size:</b> <input type="number" name="size" size="30" maxlength="60" value="<?php
                                                                                        if (isset($_POST['size'])) echo htmlspecialchars($_POST['size']); ?>" /> (optional)</p>

      <p><b>Description:</b> <textarea name="description" cols="40" rows="5"><?php
                                                                              if (isset($_POST['description'])) echo $_POST['description']; ?></textarea> (optional)</p>

    </fieldset>

    <div align="center"><input type="submit" name="submit" value="Submit" /></div>
  </form>

</body>

</html>

