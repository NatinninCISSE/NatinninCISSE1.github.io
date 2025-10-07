<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $sujet = $_POST['sujet'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP pour les tests locaux
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // ou smtp.mailtrap.io pour les tests
        $mail->SMTPAuth = true;
        $mail->Username = 'natinnincisse07@gmail.com';
        $mail->Password = 'ykfj jkwe lcio abbt';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom($email, $nom);
        $mail->addAddress('natinnincisse07@gmail.com'); // adresse de réception
        $to = "natinnincisse07@gmail.com"; // Remplace par ton email
        $subject = "Formulaire de contact : $sujet";
        $body = "Nom : $nom\nEmail : $email\n\nMessage :\n$message";
        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = $sujet;
        $mail->Body = nl2br($message);

        $mail->send();
        echo 'Message envoyé avec succès !';
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
