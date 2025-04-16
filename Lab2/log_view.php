<?php $config = require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Log File Data</h2>
    <?php
    $filename = $config['log_file'];
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            list($datetime, $ip, $email, $name) = explode(",", $line);
            echo "<div style='margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom: 10px;'>";
            echo "<p>Visit Date: $datetime</p>";
            echo "<p>IP Address: $ip</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Name: $name</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No log file found.</p>";
    }
    ?>
</body>
</html>
