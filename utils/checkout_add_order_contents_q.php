


<?php


//  Prepre the query:
$q = "INSERT INTO order_contents (order_id, print_id, quantity, price) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($dbc, $q);
mysqli_stmt_bind_param($stmt, 'iiid', $oid, $pid, $qty, $price);

//  Execute each query; count the total affected:
$affected = 0;
foreach ($_SESSION['cart'] as $pid => $item) {
  $qty = $item['quantity'];
  $price = $item['price'];
  mysqli_stmt_execute($stmt);
  $affected += mysqli_stmt_affected_rows($stmt);
}


