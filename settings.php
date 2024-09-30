<?php
// Asegura que el archivo solo sea accesible a través de Moodle. Si se intenta acceder directamente, el script se detiene.
defined('MOODLE_INTERNAL') || die();

// Verifica si se está construyendo el árbol completo de configuraciones del administrador.
if ($ADMIN->fulltree) {

    // Verifica si la variable $settings está definida. Si no lo está, se crea una nueva página de configuración para el plugin.
    if (!isset($settings)) {
        // Crea una nueva página de configuración en la sección de administración de Moodle.
        // El primer parámetro es el nombre único de la página ('local_chatgpt_plugin') y el segundo es el título que se muestra en la interfaz de administración.
        $settings = new admin_settingpage('local_chatgpt_plugin', get_string('pluginname', 'local_chatgpt_plugin'));
    }

    // Añade un campo de texto de configuración para la clave API del chatbot.
    // Esta configuración será visible en la página de ajustes del plugin en el panel de administración de Moodle.
    $settings->add(new admin_setting_configtext(
        'local_chatgpt_plugin/api_key', // Nombre interno de la configuración.
        get_string('apikey', 'local_chatgpt_plugin'), // Etiqueta que se muestra al administrador en la interfaz.
        get_string('apikey_desc', 'local_chatgpt_plugin'), // Descripción que se muestra para explicar el propósito de este campo.
        '', // Valor predeterminado, en este caso, se deja vacío ya que el usuario deberá ingresar su clave API.
        PARAM_TEXT // Define que este campo aceptará texto.
    ));

    // Añade la página de configuración al árbol de configuraciones de 'localplugins', que es donde se agrupan los plugins locales en Moodle.
    $ADMIN->add('localplugins', $settings);
}
