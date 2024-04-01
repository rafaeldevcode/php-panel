<?php

namespace Src\Email;

class BodyEmail
{
    public static function contact(array $data, string $title = ''): string
    {
        $nameTrans = __('Name');
        $emailTrans = __('Email');

        $message = <<<EOT
            <div style="padding: 1rem; background: #ffffff; border-radius: 5px; color: #3695FF;">
                <ul style="list-style: none; margin: 0;">
                    <li><strong>{$nameTrans}</strong>: {$data['name']}</li>
                    <li><strong>{$emailTrans}</strong>: {$data['email']}</li>
                    <li style="margin-top: 20px;">{$data['message']}</li>
                </ul>
            </div>
        EOT;

        return self::getLayout($message, $title);
    }

    private static function getLayout(string $slot, string $title): string
    {
        $copy = !is_null(SETTINGS) && !empty(SETTINGS['copyright']) ? SETTINGS['copyright'] : '';

        return <<<EOT
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        <body style="padding: 1.4rem; background: #3695FF; font-family: sans-serif">
            <div style="color: #ffffff; padding: 1rem 0; text-align: center;">
                <h1>{$title}</h1>
            </div>

            {$slot}

            <div style="padding: 1rem; background: #6C757D; margin-top: 20px; color: #ffffff; text-align: center; border-radius: 5px;">
                <p>{$copy}</p>
            </div>
        </body>
        </html>
        EOT;
    }
}
