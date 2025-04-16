<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission</title>
</head>
<body>
    <h2>Form Submission</h2>

    
    <?php
$config = require 'config.php';

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$message = $_POST["message"] ?? "";
$ip = $_SERVER['REMOTE_ADDR'];
$date = date("F j Y g:i a");

$error = "";
if (empty($name)) {
    $error = "Name is required";
} elseif (strlen($name) > $config['max_name_length']) {
    $error = "Name must be less than {$config['max_name_length']} characters";
} elseif (empty($email)) {
    $error = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Email is not valid";
} elseif (empty($message)) {
    $error = "Message is required";
} elseif (strlen($message) > $config['max_message_length']) {
    $error = "Message must be less than {$config['max_message_length']} characters";
}

if ($error) {
    echo "<p style='color: red;'>** $error</p>";
    echo "<a href='index.html'>Go back to the form</a>";
} else {
    $logLine = "$date,::{$ip},{$email},{$name}" . PHP_EOL;

    $file = fopen($config['log_file'], "a");
    if ($file) {
        fwrite($file, $logLine);
        fclose($file);
    }

    echo "<p style='color: green;'>Thank you for contacting Us</p>";
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Message: $message<br>";
    echo "<a href='index.html'>Go back to the form</a>";
}
?>

</body>
</html>