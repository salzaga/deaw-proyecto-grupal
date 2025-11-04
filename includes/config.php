<?php

/**
 * Used to store website configuration information.
 *More information in this web.
 * @var string or null
 *Comment by Lucia
 */
define("PATH","http://localhost/deaw");

function config($key = '')
{
    $config = [
        'path' => PATH,
        'name' => 'Sitio Web realizado con PHP',
        'site_url' => PATH .'/run.php',
        'nav_menu' => [
            '' => 'Inicio',
            'about-us' => 'Acerca de',
            'products' => 'Productos',
            'contact' => 'Contacto',
        ],
        'template_path' => $_SERVER["DOCUMENT_ROOT"].'/deaw/template',
        'content_path' => $_SERVER["DOCUMENT_ROOT"] .'/deaw/content',
        'version' => 'v3.1',
    ];
    $var = isset($config[$key]) ? $config[$key] : null;
    return $var;
}
