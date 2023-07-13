<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;




class MailService {
    Private $mailer;

    Public function __construct(MailerInterface $mailerInterface){
        $this->mailer = $mailerInterface;
    }

    public function envoieMail($email,$to,$message){
        $email = (new Email())
        ->from($email)
        ->to($to)
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('Time for Symfony Mailer!')
        ->text($message)
        ->html($message);

        $this->mailer->send($email);
    }
    }

