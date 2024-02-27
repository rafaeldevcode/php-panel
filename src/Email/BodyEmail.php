<?php

namespace Src\Email;

class BodyEmail
{
    public static function contact(array $data): string
    {
        $message = "<ul>
            <li><strong>Nome</strong>: {$data['name']}</li>
            <li><strong>Telefone</strong>: {$data['phone']}</li>
            <li><strong>Mensagem</strong>: {$data['message']}</li>
        </ul>";

        return $message;
    }
}
