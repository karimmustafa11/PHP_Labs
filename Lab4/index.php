<?php
require_once("autoload.php");

$db = new MySQLHandler("items");
$data = $db->get_data();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Glasses Shop</title>
    <style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  h2 {
    text-align: center;
    margin-top: 30px;
    color: #333;
  }

  table {
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: white;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
  }

  th, td {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
  }

  th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  img {
    border-radius: 8px;
    border: 1px solid #ddd;
  }
</style>
</head>
<body>

<h2 style="text-align:center;">Available Glasses</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Price</th>
    </tr>

    <?php foreach ($data as $row): ?>
        <tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['product_name']) ?></td>
  <td>
  <img src="Resources/images/<?= htmlspecialchars($row['photo']) ?>" width="50" height="50" alt="glass image">

  </td>
  <td><?= htmlspecialchars($row['list_price']) ?> $</td>
</tr>
    <?php endforeach; ?>

</table>

</body>
</html>
