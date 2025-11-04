<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
define("PATH","http://localhost/deaw");

/**
 * Devuelve un valor de configuración según la clave proporcionada.
 *
 * Si no se proporciona ninguna clave, se devuelve `null`.
 *
 * @param string $key Clave de configuración a consultar.
 * @return mixed Valor correspondiente a la clave o null si no existe.
 */

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
