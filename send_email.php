<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "innovativegermanacadmey@gmail.com; // Receiver's email
    $subject = "New Course Application";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $course = $_POST["course"];
    $message = $_POST["message"];

    $body = "Name: $name\nEmail: $email\nPhone: $phone\nCourse: $course\nMessage: $message";

    $headers = "From: $email\r\nReply-To: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Application submitted successfully!";
    } else {
        echo "Failed to send application.";
    }
}
?>