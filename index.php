<?php
// Carga el archivo de configuración de Moodle, que incluye las rutas y parámetros necesarios.
require_once(__DIR__.'/../../config.php');

// Verifica que el usuario haya iniciado sesión. Si no, lo redirige a la página de login.
require_login();

// Configura la URL de la página actual, en este caso, la página del plugin local 'chatgpt_plugin'.
$PAGE->set_url(new moodle_url('/local/chatgpt_plugin/index.php'));

// Establece el contexto como el sistema global de Moodle, lo que significa que este plugin se aplica en todo el sitio.
$PAGE->set_context(context_system::instance());

// Define el título de la página, usando la cadena 'pluginname' definida en los archivos de idioma del plugin.
$PAGE->set_title(get_string('pluginname', 'local_chatgpt_plugin'));

// Define el encabezado de la página, también utilizando la cadena 'pluginname' del archivo de idioma.
$PAGE->set_heading(get_string('pluginname', 'local_chatgpt_plugin'));

// Incluye un archivo CSS específico para personalizar el estilo de la página.
$PAGE->requires->css('/local/chatgpt_plugin/styles.css');

// Muestra el encabezado de la página (parte superior de la interfaz) usando el tema actual de Moodle.
echo $OUTPUT->header();

// Verifica si el formulario ha sido enviado con una pregunta (si 'user_input' está definido en el array $_POST).
if (isset($_POST['user_input'])) {
    // Elimina los espacios en blanco antes y después del input del usuario.
    $input = trim($_POST['user_input']);
    
    // Si el input no está vacío, llama a la función 'obtener_respuesta_chatgpt' para obtener una respuesta.
    if (!empty($input)) {
        $response = obtener_respuesta_chatgpt($input);
        // Muestra la respuesta de ChatGPT en la página.
        echo "<p><strong>Respuesta de ChatGPT:</strong></p><p>$response</p>";
    } else {
        // Si el input está vacío, muestra un mensaje pidiendo al usuario que ingrese una pregunta.
        echo "<p><strong>Por favor, ingresa una pregunta.</strong></p>";
    }
}

// Genera un formulario HTML simple para que el usuario ingrese su pregunta.
echo '<form method="post">';  // El formulario usa el método POST para enviar los datos.
echo '<label for="user_input">Escribe tu pregunta:</label>';  // Etiqueta para el campo de texto.
echo '<input type="text" name="user_input" id="user_input" size="50">';  // Campo de texto para ingresar la pregunta.
echo '<input type="submit" value="Enviar">';  // Botón de envío.
echo '</form>';  // Cierra el formulario.

// Muestra el pie de página (parte inferior de la interfaz) usando el tema actual de Moodle.
echo $OUTPUT->footer();
?>
