<?php

// Chargement automatique via Composer
require _ROOTPATH_ . 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Récupération des données envoyées en JSON
$data = json_decode(file_get_contents("php://input"), true);

// Sécurisation des données
$lastname_contact = htmlspecialchars(trim($data['lastnameContact'] ?? ''));
$name_contact = htmlspecialchars(trim($data['nameContact'] ?? ''));
$email_contact = filter_var(trim($data['emailContact'] ?? ''), FILTER_SANITIZE_EMAIL);
$phone_contact = htmlspecialchars(trim($data['phoneContact'] ?? ''));
$subject_contact = htmlspecialchars(trim($data['subjectContact'] ?? ''));
$message_contact = nl2br(htmlspecialchars(trim($data['messageContact'] ?? '')));

// Vérification minimale
if (!$lastname_contact || !$name_contact || !$email_contact || !$phone_contact || !$subject_contact || !$message_contact) {
    http_response_code(400);
    echo "Certains champs sont manquants ou invalides.";
    exit;
}

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';


try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'contact2ecoride@gmail.com';
    $mail->Password   = 'xqopughorogfulvq';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // === MAIL VERS L'ÉQUIPE ECORIDE ===
    $mail->setFrom('contact2ecoride@gmail.com', 'Formulaire Ecoride');
    $mail->addAddress('contact2ecoride@gmail.com', 'Support Ecoride');

    $mail->isHTML(true);
    $mail->Subject = "Nouveau message de contact : {$subject_contact}";
    $mail->Body = "
        <h2>Nouveau message via le formulaire Ecoride</h2>
        <p><strong>Nom :</strong> {$lastname_contact}</p>
        <p><strong>Prénom :</strong> {$name_contact}</p>
        <p><strong>Email :</strong> {$email_contact}</p>
        <p><strong>Téléphone :</strong> {$phone_contact}</p>
        <p><strong>Sujet :</strong> {$subject_contact}</p>
        <p><strong>Message :</strong><br>{$message_contact}</p>
    ";
    $mail->send();

    // Réinitialisation pour le second mail
    $mail->clearAddresses();

    // === CONFIRMATION À L'UTILISATEUR ===
    $mail->addAddress($email_contact);
    $mail->Subject = "Votre message à Ecoride a bien été reçu";
    $mail->Body = "
        <p>Bonjour {$name_contact},</p>
        <p>Merci pour votre message. Nous vous répondrons dès que possible.</p>
        <hr>
        <p><strong>Résumé :</strong></p>
        <ul>
            <li><strong>Nom :</strong> {$lastname_contact}</li>
            <li><strong>Prénom :</strong> {$name_contact}</li>
            <li><strong>Sujet :</strong> {$subject_contact}</li>
        </ul>
        <p><strong>Message :</strong><br>{$message_contact}</p>
        <br>
        <p>À bientôt,<br>L'équipe Ecoride</p>
    ";
    $mail->send();

    echo "Votre message a bien été envoyé. Merci !";
} catch (\Exception $e) {
    http_response_code(500);
    echo "Erreur lors de l'envoi du mail : {$mail->ErrorInfo}";
}
