<?php
defined('MOODLE_INTERNAL') || die(); 

// Define el componente del plugin, en este caso, 'local_chatgpt_plugin'. 
$plugin->component = 'local_chatgpt_plugin'; 

// Define la versión del plugin en formato AAAAMMDDXX (Año, Mes, Día, seguido de dos dígitos para versiones del día).
// Esto es importante para controlar las actualizaciones del plugin.
$plugin->version = 2023091700; 

// Indica la versión mínima de Moodle requerida para que el plugin funcione. 
$plugin->requires = 2020061500; 

// Define el estado de madurez del plugin. En este caso, 'MATURITY_ALPHA' significa que el plugin está en una fase temprana de desarrollo.
$plugin->maturity = MATURITY_ALPHA; 

// Especifica la versión pública del plugin en formato de cadena. Aquí, se establece como 'v0.1', lo que sugiere que es una versión inicial.
$plugin->release = 'v0.1'; 
