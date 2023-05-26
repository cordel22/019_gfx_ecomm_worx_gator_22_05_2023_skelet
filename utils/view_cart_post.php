


<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //  Chnge any quantities:
    foreach ($_POST['qty'] as $k => $v) {
      //  Must be integers!
      $pid = (int) $k;
      $qty = (int) $v;
  
      if ($qty == 0) {
        //  Delete.
        unset($_SESSION['cart'][$pid]);
      } elseif ($qty > 0) {
        //  Change quantity.
        $_SESSION['cart'][$pid]['quantity'] = $qty;
      }
    } //  End of FOREACH.
  }   //  End of SUBMITTED IF.




