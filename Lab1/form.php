<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submission</title>
</head>
<body>
    <h2>Form Submission</h2>

    <?php
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $message = $_POST["message"] ?? "";

    $error = "";
    if (empty($name)) {
        $error = "Name is required";
    } elseif (strlen($name) > 100) {
        $error = "Name must be less than 100 characters";
    } elseif (empty($email)) {
        $error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email is not valid";
    } elseif (empty($message)) {
        $error = "Message is required";
    } elseif (strlen($message) > 255) {
        $error = "Message must be less than 255 characters";
    }

    if ($error) {
        echo "<p style='color: red;'>** $error</p>";
        echo "<a href='index.html'>Go back to the form</a>";
    } else {
        echo "<p style='color: green;'>Thank you for contacting Us</p>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Message: $message<br>";
        echo "<a href='index.html'>Go back to the form</a>";
    }
    ?>
</body>
</html>