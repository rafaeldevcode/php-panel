<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\Setting;

verifyMethod(500, 'POST');

$setting = new Setting();
$requests = requests();
$current_setting = $setting->first();

$current_site_logo_main = isset($current_setting) ? $current_setting->site_logo_main : null;
$current_site_logo_secondary = isset($current_setting) ? $current_setting->site_logo_secondary : null;
$current_site_favicon = isset($current_setting) ? $current_setting->site_favicon : null;
$current_site_bg_login = isset($current_setting) ? $current_setting->site_bg_login : null;

$site_logo_main = saveImage('site_logo_main', $current_site_logo_main, null);
$site_logo_secondary = saveImage('site_logo_secondary', $current_site_logo_secondary, null);
$site_favicon = saveImage('site_favicon', $current_site_favicon, null);
$site_bg_login = saveImage('site_bg_login', $current_site_bg_login, null);
$preloader = isset($requests->preloader) ? $requests->preloader : 'off';
$cookies = isset($requests->cookies) ? $requests->cookies : 'off';

    $data = [
        'site_name' => $requests->site_name,
        'site_description' => $requests->site_description,
        'andress' => $requests->andress,
        'phone' => $requests->phone,
        'email' => $requests->email,
        'whatsapp' => $requests->whatsapp,
        'telegram' => $requests->telegram,
        'profile_linkedin' => $requests->profile_linkedin,
        'profile_facebook' => $requests->profile_facebook,
        'profile_instagram' => $requests->profile_instagram,
        'google_analytics' => $requests->google_analytics,
        'copyright' => $requests->copyright,
        'telegram_message' => $requests->telegram_message,
        'whatsapp_message' => $requests->whatsapp_message,
        'facebook_pixel' => $requests->facebook_pixel,
        'preloader' => $preloader,
        'cookies' => $cookies,
        'preloader_image' => $requests->preloader_image
    ];

if(!isset($current_setting)):
    $data['site_logo_main'] = $site_logo_main;
    $data['site_logo_secondary'] = $site_logo_secondary;
    $data['site_favicon'] = $site_favicon;
    $data['site_bg_login'] = $site_bg_login;

    $setting->create($data);
else:
    $data['site_logo_main'] = is_null($site_logo_main) ? $current_setting->site_logo_main : $site_logo_main;
    $data['site_logo_secondary'] = is_null($site_logo_secondary) ? $current_setting->site_logo_secondary : $site_logo_secondary;
    $data['site_favicon'] = is_null($site_favicon) ? $current_setting->site_favicon : $site_favicon;
    $data['site_bg_login'] = is_null($site_bg_login) ? $current_setting->site_bg_login : $site_bg_login;

    $setting->find($current_setting->id)->update($data);
endif;

unset($_SESSION['site_settings']);

session([
    'message' => 'Configurações atualizadas com sucesso!',
    'type' => 'cm-success'
]);

return header('Location: /admin/settings', true, 302);
