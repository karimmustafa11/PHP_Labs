<?php
require_once("autoload.php");

if (!isset($_GET['id'])) {
    die("No ID provided");
}

$id = (int)$_GET['id'];
$db = new MySQLHandler("items");
$item = $db->get_record_by_id($id, 'id');

if (!$item) {
    die("Item not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Item Details</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 20px;
    }
    .container {
        width: 60%;
        margin: auto;
        background-color: white;
        padding: 20px;
        box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        border-radius: 10px;
    }
    img {
        max-width: 100%;
        border-radius: 10px;
        border: 1px solid #ccc;
    }
    h1 { text-align: center; color: #333; }
    p { font-size: 18px; color: #555; }

    .div1 {
        text-align:center;
    }
    </style>
</head>
<body>

<div class="container div1">
    <h1><?= htmlspecialchars($item['product_name']) ?></h1>
    <img src="Resources/images/<?= htmlspecialchars($item['photo']) ?>" alt="Glass Image">
    <p><strong>Price:</strong> <?= htmlspecialchars($item['list_price']) ?> $</p>
    <p><strong>Category:</strong> <?= htmlspecialchars($item['category']) ?></p>
</div>

</body>
</html>
