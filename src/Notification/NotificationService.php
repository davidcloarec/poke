<?php

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class NotificationService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMailCreation($senderMail, $receiverMail){
        $email = (new Email())
            ->from($senderMail)
            ->to($receiverMail)
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Ajout de pokemon')
            ->text('Un pokémon a bien été ajouté !')
            ->html('<p>Voila voila</p>');

        $this->mailer->send($email);
    }
}