<?php

namespace Src\Email;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailServices
{
    private $body;
    private $subject;
    private $mail;
    private $emailsTo;

    public function __construct(string $body, string $subject, bool $contact = false)
    {
        $this->body = $body;
        $this->subject = $subject;
        $this->mail = new PHPMailer(true);
        $this->emailsTo = [];
    }

    public function setEmailTo(string $email): self
    {
        array_push($this->emailsTo, $email);

        return $this;
    }

    public function setAddress(): void
    {
        foreach($this->emailsTo as $email):
            $this->mail->addAddress($email);
        endforeach;
    }

    public function setDebug(): self
    {
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;

        return $this;
    }

    public function setEncription(): self
    {
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        return $this;
    }

    public function send(): void
    {
        if (env('SMTP_SERVICE') === 'true') {
            $this->mail->isSMTP();
            $this->mail->Host = env('SMTP_HOST');
            $this->mail->SMTPAuth = true;
            $this->mail->Username = env('SMTP_EMAIL_ORIGIN');
            $this->mail->Password = env('SMTP_PASSWORD');
            $this->mail->Port = env('SMTP_PORT');

            $this->mail->setFrom(env('SMTP_EMAIL_ORIGIN'));
            $this->setAddress();

            $this->mail->isHTML(true);
            $this->mail->Subject = $this->subject;
            $this->mail->Body = $this->body;
            $this->mail->AltBody = $this->body;
            $this->mail->CharSet = 'UTF-8';

            $this->mail->send();
        }
    }
}
