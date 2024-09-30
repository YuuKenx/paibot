<?php
// Carga el archivo de configuración de Moodle y la biblioteca adicional del plugin.
require_once('../../config.php');
require_once('lib.php');

// Verifica que el usuario haya iniciado sesión. Si no ha iniciado sesión, será redirigido a la página de login.
require_login();

// Establece el contexto global del sistema de Moodle para esta página.
$context = context_system::instance();
$PAGE->set_context($context);

// Establece la URL de la página actual, correspondiente al archivo 'chatbot.php' dentro del plugin local 'chatgpt_plugin'.
$PAGE->set_url(new moodle_url('/local/chatgpt_plugin/chatbot.php'));

// Incluye el archivo CSS específico del plugin para personalizar el estilo.
$PAGE->requires->css('/local/chatgpt_plugin/styles.css');

// Establece el título de la página en 'PAIBot'.
$PAGE->set_title('PAIBot');

// Establece el encabezado de la página como 'PAIBot'.
$PAGE->set_heading('PAIBot');

// Variables inicializadas para el input del usuario y la respuesta del chatbot.
$input = '';
$response = '';

// Si el usuario ha enviado el formulario con el campo 'input' (verificando con 'optional_param'),
// el valor del campo se limpia de espacios en blanco y se asigna a la variable $input.
// Luego, se obtiene una respuesta de la función 'obtener_respuesta_chatgpt' usando el input del usuario.
if (optional_param('input', '', PARAM_TEXT)) {
    $input = trim(optional_param('input', '', PARAM_TEXT));
    $response = obtener_respuesta_chatgpt($input);
}

// Muestra el encabezado de la página (parte superior de la interfaz) utilizando el tema actual de Moodle.
echo $OUTPUT->header();
?>

<!-- Contenedor del formulario para el input del usuario -->
<div id="chat-container1" styles="margin-bottom: 0px;, padding-bottom:0px;">
    <!-- Formulario para enviar el mensaje del usuario al chatbot -->
    <form id="chat-form" method="POST" action="" onsubmit="clearInput()">
        <!-- Campo de texto donde el usuario ingresa su mensaje -->
        <input type="text" id="input" name="input" value="<?php echo htmlspecialchars($input); ?>" placeholder="Escribe tu mensaje..." required>
        <!-- Botón para enviar el mensaje -->
        <button type="submit">Enviar</button>
    </form>
</div>
<br>

<!-- Contenedor para mostrar la conversación (preguntas y respuestas) -->
<div id="chat-container2" styles="margin-top: 0px;,  padding-top:0px;">
    <!-- Caja que contiene los mensajes intercambiados -->
    <div id="chat-box">
        <div id="chat-messages">
            <!-- Si el usuario ha ingresado un mensaje, se muestra su mensaje en la interfaz -->
            <?php
            if (!empty($input)) {
                echo "<div class='message user-message'>" . htmlspecialchars($input) . "</div>";
            }
            // Si hay una respuesta del chatbot, se muestra debajo del mensaje del usuario.
            if (!empty($response)) {
                echo "<div class='message bot-message'>" . htmlspecialchars($response) . "</div>";
            }
            ?>
        </div>
    </div>
</div>

<?php
// Muestra el pie de página (parte inferior de la interfaz) utilizando el tema actual de Moodle.
echo $OUTPUT->footer();
?>
