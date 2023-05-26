<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Add an Artist</title>
</head>

<body>
  <?php # Script 19.1 - add_artist.php
  //  if request method = post
  require_once('misc/add_artist_post.php');
  

  //  Check for an error nd pin it:
  if (isset($error)) {
    echo '<h1>Error!</h1>
      <p style="font-weight: bold; color: #C00">' . $error . ' Please try again.</p>';
  }

  //  Display the form...
  ?>

  <h1>Add a Print</h1> <!-- nie nahodou Artist..? -->
  <form action="add_artist.php" method="post">
    <fieldset>
      <legend>Fill out the form to add an artist:</legend>
      <p><b>First Name:<b> <input type="text" name="first_name" size="10" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
      <p><b>Middle Name:<b> <input type="text" name="middle_name" size="10" maxlength="20" value="<?php if (isset($_POST['middle_name'])) echo $_POST['middle_name']; ?>" /></p>
      <p><b>Last Name:<b> <input type="text" name="last_name" size="10" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
    </fieldset>
    <div align="center"><input type="submit" name="submit" value="Submit" /></div>
  </form>

</body>

</html>