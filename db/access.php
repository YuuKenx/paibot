<?php
// Asegura que el script no sea accedido directamente fuera de Moodle.
defined('MOODLE_INTERNAL') || die();

// Definición de capacidades (permissions) para el plugin.
$capabilities = array(
    
    // Define la capacidad 'local/chatgpt_plugin:view', que permite a los usuarios ver el plugin.
    'local/chatgpt_plugin:view' => array(
        // El tipo de capacidad es de solo lectura.
        'captype' => 'read',
        // Define el nivel de contexto en el que se aplica esta capacidad. En este caso, es a nivel del sistema.
        'contextlevel' => CONTEXT_SYSTEM,
        // Los arquetipos especifican qué roles tienen esta capacidad por defecto. Aquí, los usuarios comunes tienen permiso.
        'archetypes' => array(
            'user' => CAP_ALLOW,  // Los usuarios comunes tienen permitido ver el plugin.
        ),
    ),
    
    // Define la capacidad 'local/chatgpt_plugin:manage', que permite a los usuarios gestionar o administrar el plugin.
    'local/chatgpt_plugin:manage' => array(
        // El tipo de capacidad es de escritura, ya que implica acciones administrativas.
        'captype' => 'write',
        // El nivel de contexto es el mismo, aplicado a nivel del sistema.
        'contextlevel' => CONTEXT_SYSTEM,
        // Los arquetipos especifican qué roles tienen esta capacidad por defecto. Aquí, solo los managers tienen permiso.
        'archetypes' => array(
            'manager' => CAP_ALLOW,  // Los managers pueden administrar el plugin.
        ),
    ),
);
?>
