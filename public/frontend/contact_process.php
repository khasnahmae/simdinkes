<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Ganti dengan SMTP server Anda
    $mail->SMTPAuth = true;
    $mail->Username = 'khasnahm@gmail.com';  // Ganti dengan email Anda
    $mail->Password = 'notqswraulmvwdur';  // Ganti dengan password email Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //Recipients
    $mail->setFrom($from, $name);
    $mail->addAddress($to);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to = "khasnahm@gmail.com";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $cmessage = $_POST['message'];

    // Verifikasi apakah form diisi dengan benar
    if (empty($name) || empty($from) || empty($subject) || empty($cmessage)) {
        echo "Semua kolom harus diisi.";
    } else {
        $headers = "From: $from\r\n";
        $headers .= "Reply-To: $from\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $body = "<p><strong>Name:</strong> $name</p>";
        $body .= "<p><strong>Email:</strong> $from</p>";
        $body .= "<p><strong>Subject:</strong> $subject</p>";
        $body .= "<p><strong>Message:</strong></p><p>$cmessage</p>";

        $send = mail($to, $subject, $body, $headers);

        // Debugging output
        if ($send) {
            echo "Pesan berhasil dikirim!";
        } else {
            echo "Terjadi kesalahan saat mengirim pesan.";
        }
    }
}
