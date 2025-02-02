<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "innovativegermanacadmey@gmail.com"; // Receiver's email
    $subject = "New Course Application";

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $course = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($email === false) {
        echo "Invalid email address.";
        exit;
    }

    $body = "Name: $name\nEmail: $email\nPhone: $phone\nCourse: $course\nMessage: $message";

    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Application submitted successfully!";
    } else {
        $errorMessage = error_get_last()['message'];
        echo "Failed to send application. Error: $errorMessage";
    }
}
?>
