<?php


function site_name()
{
    $var = config('name');
    echo $var;
}

function site_url()
{
    $var = config('site_url');
    echo $var;
}

function site_path()
{
    $var = config('path');
    echo $var;
}

function site_version()
{
    $var = config('version');
    echo $var;
}


function nav_menu($sep = ' | ')
{
    $nav_menu = '';
    $nav_items = config('nav_menu');

    foreach ($nav_items as $uri => $name) {
        $query_string = str_replace('page=', '', $_SERVER['QUERY_STRING'] ?? '');
        $class = $query_string == $uri ? ' active' : '';
        $url = config('site_url') . '/' . ($uri == '' ? '' : '?page=') . $uri;
        
        // Constuir menú de navegación, atentos al uso de  (.=)
        $nav_menu .= '<a href="' . $url . '" title="' . $name . '" class="item ' . $class . '">' . $name . '</a>' . $sep;
    }

    echo trim($nav_menu, $sep);
}


function page_title()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'Home';
    $titulo = [                             
            'Home' => '>>Inicio',                 // Título parametrizable en función
            'about-us' => '>>Acerca de',          // del nombre de la página física
            'products' => '>>Productos',
            'contact' => '>>Contacto',
    ];  
    echo  $titulo[$page];
}


function page_content()
{
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path =  config('content_path') . '/' . $page . '.phtml';   // Obtiene ruta para volcar
    if (! file_exists($path)) {
        $path =  config('content_path') . '/404.phtml';
    }
    echo file_get_contents($path);          // Volcar contenidos
}

function init()
{
    require config('template_path') . '/template.php';
}
