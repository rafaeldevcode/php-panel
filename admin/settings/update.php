<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\Setting;

verifyMethod(500, 'POST');

$setting = new Setting();

$current_setting = $setting->first();

$current_site_logo_main = isset($current_setting) ? $current_setting->site_logo_main : null;
$current_site_logo_secondary = isset($current_setting) ? $current_setting->site_logo_secondary : null;
$current_site_favicon = isset($current_setting) ? $current_setting->site_favicon : null;
$current_site_bg_login = isset($current_setting) ? $current_setting->site_bg_login : null;

$site_logo_main = saveImage($_FILES, 'site_logo_main', $current_site_logo_main);
$site_logo_secondary = saveImage($_FILES, 'site_logo_secondary', $current_site_logo_secondary);
$site_favicon = saveImage($_FILES, 'site_favicon', $current_site_favicon);
$site_bg_login = saveImage($_FILES, 'site_bg_login', $current_site_bg_login);
$preloader = isset($_POST['preloader']) ? $_POST['preloader'] : 'off';
$cookies = isset($_POST['cookies']) ? $_POST['cookies'] : 'off';

    $data = [
        'site_name'           => $_POST['site_name'],
        'site_description'    => $_POST['site_description'],
        'andress'             => $_POST['andress'],
        'phone'               => $_POST['phone'],
        'email'               => $_POST['email'],
        'whatsapp'            => $_POST['whatsapp'],
        'telegram'            => $_POST['telegram'],
        'profile_linkedin'    => $_POST['profile_linkedin'],
        'profile_facebook'    => $_POST['profile_facebook'],
        'profile_instagram'   => $_POST['profile_instagram'],
        'google_analytics'    => $_POST['google_analytics'],
        'copyright'           => $_POST['copyright'],
        'telegram_message'    => $_POST['telegram_message'],
        'whatsapp_message'    => $_POST['whatsapp_message'],
        'facebook_pixel'      => $_POST['facebook_pixel'],
        'preloader'           => $preloader,
        'cookies'             => $cookies,
        'preloader_image'     => $_POST['preloader_image']
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
    'type'    => 'cm-success'
]);

return header('Location: /admin/settings', true, 302);
