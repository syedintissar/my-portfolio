<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize inputs
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill all fields.";
        exit;
    }

    $to = "contact@intissar.dev";
    $subject = "New Contact Form Message - Intissar.dev";

    $body = "
    Name: $name\n
    Email: $email\n
    Message:\n$message
    ";

    $headers = "From: Intissar.dev <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
