<?php

require_once('includes/config.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class passwordResetClass
{
    private $conn;
    private $smarty;
    
    // Constructor to initialize connection and Smarty
    public function __construct($conn, $smarty)
    {
        $this->conn = $conn;
        $this->smarty = $smarty;
    }

    // Reset password
    public function sendResetLink($email)
    {
        // Check if email exists in the database
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // If email exists
        if ($result->num_rows > 0) {
            // Get user's data
            $user = $result->fetch_assoc();
            $reset_code = bin2hex(random_bytes(16));

            // Update user's reset code in the database
            $stmt = $this->conn->prepare("UPDATE users SET reset_code = ? WHERE id = ?");
            $stmt->bind_param("si", $reset_code, $user['id']);

            // If reset code is updated successfully
            if ($stmt->execute()) {
                // Send reset link via email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'hsbochumiksy2@gmail.com';
                    $mail->Password = 'horqllveffnsruod';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    // Recipients
                    $mail->setFrom('hsbochumiksy2@gmail.com');
                    $mail->addAddress($email);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'no reply';
                    $mail->Body = 'Here is your password reset link <b><a href="http://localhost/myTranslate/change_password.php?reset=' . $reset_code . '">Reset Password</a></b>';
                    $mail->send();

                    // Show success message if email is sent successfully
                    $this->smarty->assign('success', "A password reset link has been sent to your email address.");
                } catch (Exception $e) {
                    // Show error message if email cannot be sent
                    $this->smarty->assign('error', "Password reset link could not be sent. Mailer Error: {$mail->ErrorInfo}");
                }
            } else {
                // Show error message if reset code cannot be updated
                $this->smarty->assign('error', 'An error occurred.');
            }
        } else {
            // Show error message if email does not exist
            $this->smarty->assign('error', 'Email not found. Please try again or register.');
        }
    }
}
