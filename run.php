<?php

/**
 * run.php
 *
 * Punto de entrada principal de la aplicación.
 * Configura la visualización de errores, carga archivos esenciales
 * y ejecuta la función de inicialización.
 * Todo eso sin pestañear...
 *
 */

// Mostrar todos los errores de PHP
error_reporting(E_ALL); // Reporta todos los errores, advertencias y avisos
ini_set('display_errors', 1); // Muestra los errores en pantalla

/**
 * Carga el archivo de configuración de la aplicación.
 */
require __DIR__ . '/includes/config.php';

/**
 * Carga el archivo de funciones comunes.
 * Aquí se definen funciones reutilizables en toda la aplicación.
 */
require __DIR__ . '/includes/functions.php';

/**
 * Inicializa la aplicación.
 */
init();
