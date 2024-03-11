<?php
// Nombre del estudiante
$nombre_estudiante = "Rodolfo";

// Función para obtener la imagen generada por inteligencia artificial usando la API de OpenAI Leonardo
function obtener_imagen_ai() {
    $url = "https://api.openai.com/v1/images";
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer your-api-key-here"
    );
    $data = array(
        "prompt" => "An artistic rendering of a futuristic city skyline.",
        "max_tokens" => 50
    );

    $data_string = json_encode($data);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $result_array = json_decode($result, true);

    $image_url = $result_array['output']['url'];

    return $image_url;
}

// Obtener la imagen generada por la inteligencia artificial
$image_url = obtener_imagen_ai();

// Mostrar el mensaje "Hola mundo, soy [nombre del estudiante]" y la imagen
echo "<h1>Hola mundo, soy $nombre_estudiante</h1>";
echo "<img src='$image_url' alt='Imagen generada por inteligencia artificial'>";
?>


