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
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Available Glasses</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr>

    <?php foreach ($data as $row): ?>
        <tr>
  <td><?= $row['id'] ?></td>
  <td><?= htmlspecialchars($row['product_name']) ?></td>
  <td>
    <img src="images/<?= htmlspecialchars($row['Photo']) ?>" width="50" height="50" alt="glass image">
  </td>
  <td><?= htmlspecialchars($row['list_price']) ?> $</td>
</tr>
    <?php endforeach; ?>

</table>

</body>
</html>
