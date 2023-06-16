<?php

require __DIR__ .'/../../vendor/autoload.php';
require __DIR__ . '/../../suports/helpers.php';

use Src\Models\Setting;

verifyMethod(500, 'POST');

$setting = new Setting();

$current_setting = $setting->first();

$current_site_logo_main = !empty($current_setting) ? $current_setting[0]['site_logo_main'] : null;
$current_site_logo_secondary = !empty($current_setting) ? $current_setting[0]['site_logo_secondary'] : null;
$current_site_favicon = !empty($current_setting) ? $current_setting[0]['site_favicon'] : null;
$current_site_bg_login = !empty($current_setting) ? $current_setting[0]['site_bg_login'] : null;

$site_logo_main = !empty($_FILES['site_logo_main']['name']) ? saveImage($_FILES['site_logo_main'], $current_site_logo_main) : null;
$site_logo_secondary = !empty($_FILES['site_logo_secondary']['name']) ? saveImage($_FILES['site_logo_secondary'], $current_site_logo_secondary) : null;
$site_favicon = !empty($_FILES['site_favicon']['name']) ? saveImage($_FILES['site_favicon'], $current_site_favicon) : null;
$site_bg_login = !empty($_FILES['site_bg_login']['name']) ? saveImage($_FILES['site_bg_login'], $current_site_bg_login) : null;
$preloader = isset($_POST['preloader']) ? $_POST['preloader'] : 'off';
$cookies = isset($_POST['cookies']) ? $_POST['cookies'] : 'off';

if(empty($current_setting)):
    $setting->create([
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
        'facebook_pixel'      => $_POST['facebook_pixel'],
        'copyright'           => $_POST['copyright'],
        'telegram_message'    => $_POST['telegram_message'],
        'whatsapp_message'    => $_POST['whatsapp_message'],
        'site_logo_main'      => $site_logo_main,
        'site_logo_secondary' => $site_logo_secondary,
        'site_favicon'        => $site_favicon,
        'site_bg_login'       => $site_bg_login,
        'preloader'           => $preloader,
        'cookies'             => $cookies,
        'preloader_image'     => $_POST['preloader_image']
    ]);
else:
    $setting->update([
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
        'site_logo_main'      => is_null($site_logo_main) ? $current_setting[0]['site_logo_main'] : $site_logo_main,
        'site_logo_secondary' => is_null($site_logo_secondary) ? $current_setting[0]['site_logo_secondary'] : $site_logo_secondary,
        'site_favicon'        => is_null($site_favicon) ? $current_setting[0]['site_favicon'] : $site_favicon,
        'site_bg_login'       => is_null($site_bg_login) ? $current_setting[0]['site_bg_login'] : $site_bg_login,
        'preloader'           => $preloader,
        'cookies'             => $cookies,
        'preloader_image'     => $_POST['preloader_image'],
        'update_at'           => date('Y-m-d H:i:s')
    ], $current_setting[0]['id']);
endif;

unset($_SESSION['site_settings']);

session([
    'message' => 'Configurações atualizadas com sucesso!',
    'type'    => 'cm-success'
]);

return header('Location: /admin/settings', true, 302);
