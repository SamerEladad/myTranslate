<?php
// Include configuration file and PHPMailer
require_once('includes/config.php');
require ('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role_name = $_POST['role'];
    $language_name = isset($_POST['language']) ? $_POST['language'] : null;

    // Fetch role id based on role_name
    $role_stmt = $conn->prepare("SELECT id FROM role WHERE role_name = ?");
    $role_stmt->bind_param("s", $role_name);
    $role_stmt->execute();
    $role_result = $role_stmt->get_result();
    $role_row = $role_result->fetch_assoc();
    $role_id = $role_row['id'];

    // Fetch language id based on language_name
    $language_id = null;
    if($language_name) {
        $language_stmt = $conn->prepare("SELECT id FROM language WHERE language_name = ?");
        $language_stmt->bind_param("s", $language_name);
        $language_stmt->execute();
        $language_result = $language_stmt->get_result();
        $language_row = $language_result->fetch_assoc();
        $language_id = $language_row['id'];
    }

    // Validate form data
    if ($password !== $confirm_password) {
        $smarty->assign('error', 'Passwords do not match.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $smarty->assign('error', 'Invalid email address.');
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
        $smarty->assign('error', 'The password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, and one number.');
    } else {
        // Check if the email already exists
        $email_check = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $email_check->bind_param("s", $email);
        $email_check->execute();
        $email_check_result = $email_check->get_result();

        if ($email_check_result->num_rows > 0) {
            $smarty->assign('error', 'Email already exists. Please use another email.');
        } else {
            // If the email does not exist, hash the password and insert the user into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $code = bin2hex(random_bytes(16));
            $verified = 0;

            $stmt = $conn->prepare("INSERT INTO users (name, email, password, role_id, language_id, code, verified) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiisi", $name, $email, $hashed_password, $role_id, $language_id, $code, $verified);

            if ($stmt->execute()) {
                // Send email confirmation link
                $mail = new PHPMailer(true);

                try {
                    // Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'hsbochumiksy2@gmail.com';
                    $mail->Password   = 'horqllveffnsruod';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    // Recipients
                    $mail->setFrom('hsbochumiksy2@gmail.com');
                    $mail->addAddress($email);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'no reply';
                    $mail->Body    = 'Here is your verification link <b><a href="http://localhost/myTranslate/verify.php?code='.$code.'">Confirm Email</a></b>';

                    $mail->send();
                } catch (Exception $e) {
                    $smarty->assign('error', "Confirmation E-Mail could not be sent. Mailer Error: {$mail->ErrorInfo}");
                }

                $smarty->assign('success', 'A confirmation link has been sent to your email address.');
            } else {
                $smarty->assign('error', 'An error occurred while registering.');
            }
        }
    }
}

// Display the register page
$smarty->display(dirname(__FILE__) . '/templates/register.tpl');
?>
