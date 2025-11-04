<?php
/**
 * Archivo documentado por Sara Alzaga
 * Contiene funciones principales del sitio web.
 */
/**
 * Funciones principales del sitio web.
 * 
 * Este archivo contiene un conjunto de funciones que recuperan
 * información de configuración, generan el menú de navegación y
 * gestionan la carga de contenido y la plantilla principal.
 * 
 * @author Sara Alzaga
 * @version 1.0
 */

/**
 * Muestra el nombre del sitio configurado.
 *
 * @return void
 */
function site_name()
{
    $var = config('name');
    echo $var;
}

/**
 * Muestra la URL base del sitio.
 *
 * @return void
 */
function site_url()
{
    $var = config('site_url');
    echo $var;
}

/**
 * Muestra la ruta raíz del sitio.
 *
 * @return void
 */
function site_path()
{
    $var = config('path');
    echo $var;
}

/**
 * Muestra la versión actual del sitio.
 *
 * @return void
 */
function site_version()
{
    $var = config('version');
    echo $var;
}

/**
 * Genera el menú de navegación principal del sitio.
 *
 * @param string $sep Separador entre los enlaces del menú (por defecto " | ").
 * @return void
 */
function nav_menu($sep = ' | ')
{
    $nav_menu = '';
    $nav_items = config('nav_menu');

    foreach ($nav_items as $uri => $name) {
        $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
        $class = $query_string == $uri ? ' active' : '';
        $url = config('site_url') . '/' . ($uri == '' ? '' : '?page=') . $uri;

        // Construir menú de navegación dinámico
        $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
    }

    echo trim($nav_menu, $sep);
}

/**
 * Muestra el título de la página actual en función del parámetro "page".
 *
 * @return void
 */
function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';
    $titulo = [
        'Home' => '>>Inicio',
        'about-us' => '>>Acerca de',
        'products' => '>>Productos',
        'contact' => '>>Contacto',
    ];
    echo $titulo[$page];
}

/**
 * Carga y muestra el contenido dinámico de la página seleccionada.
 *
 * Si la página no existe, se muestra el contenido del archivo 404.phtml.
 *
 * @return void
 */
function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = config('content_path') . '/' . $page . '.phtml';

    if (!file_exists($path)) {
        $path = config('content_path') . '/404.phtml';
    }

    echo file_get_contents($path);
}

/**
 * Inicializa la plantilla principal del sitio.
 *
 * @return void
 */
function init()
{
    require config('template_path') . '/template.php';
}
