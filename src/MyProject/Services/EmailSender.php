<?php

namespace MyProject\Services;

use MyProject\Models\Users\User;

class EmailSender
{
    public static function send(
        User $reciever,
        string $subject,
        string $tamplateName,
        array $templateVars = []
    ): void
    {
        extract($templateVars);

        ob_start();
        require __DIR__ . '/../../../templates/mail/' . $tamplateName;
        $body = ob_get_contents();
        ob_end_clean();

        mail($reciever->getEmail(), $subject, $body, 'Content-Type: text/html; charset=UTF-8');


    }


}