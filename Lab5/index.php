<?php
require_once("autoload.php");

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$start = ($page - 1) * RECORDS_PER_PAGE;

$db = new MySQLHandler("items");
$data = $db->get_data([], $start);

$total_items_result = $db->getConnection()->query("SELECT COUNT(*) as count FROM items");
$total_items_row = $total_items_result->fetch_assoc();
$total_items = $total_items_row['count'];
$total_pages = ceil($total_items / RECORDS_PER_PAGE);
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
    h2 { text-align: center; margin-top: 30px; color: #333; }
    table { width: 80%; margin: 30px auto; border-collapse: collapse; background-color: white; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden; }
    th, td { padding: 15px; text-align: center; border-bottom: 1px solid #ddd; font-size: 16px; }
    th { background-color: #007bff; color: white; font-weight: bold; }
    tr:hover { background-color: #f1f1f1; }
    img { border-radius: 8px; border: 1px solid #ddd; }
    .pagination { text-align: center; margin-top: 20px; }
    .pagination a { margin: 0 10px; text-decoration: none; color: #007bff; font-weight: bold; }

    .more {
      background-color:blue;
      color:white;
      text-decoration:none;
      padding:5px;
      border-radius:5px;

    }
    </style>
</head>
<body>

<h2>Available Glasses</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Photo</th>
        <th>Price</th>
        <th>More</th> 
    </tr>

    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['product_name']) ?></td>
        <td><img src="Resources/images/<?= htmlspecialchars($row['photo']) ?>" width="50" height="50" alt="glass image"></td>
        <td><?= htmlspecialchars($row['list_price']) ?> $</td>
        <td ><a class="more" href="details.php?id=<?= $row['id'] ?> ">More</a></td> 
    </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>">Previous</a>
    <?php endif; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?= $page + 1 ?>">Next</a>
    <?php endif; ?>
</div>

</body>
</html>
