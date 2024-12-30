<?php


//require 'vendor/autoload.php';

//Flight::route('/', function () {
//  echo '¡hola mundo!';
//});

//Flight::start();

require 'vendor/autoload.php';

// Configuración básica
Flight::set('flight.log_errors', true);

// estructura html
function render_html($title, $content) {
    echo "<!DOCTYPE html>";
    echo "<html lang='es'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>$title</title>";
    echo "<link rel='stylesheet' href='css/style.css'>";
    echo "</head>";
    echo "<body>";
    echo $content;
    echo "</body>";
    echo "</html>";
}

// Ruta principal
Flight::route('/', function() {
    $content = "
        <h1>¡Bienvenido a mi mini app con FlightPHP!</h1>
        <p>Explora las diferentes rutas disponibles:</p>
        <ul>
            <li><a href='/about'>Sobre mí</a></li>
            <li><a href='/random-number'>Número aleatorio</a></li>
            <li><a href='/json-data'>Datos en JSON</a></li>
        </ul>
    ";
    render_html('index', $content);
});


Flight::route('/about', function() {
    $content = "
        <h1>Sobre mí</h1>
        <p> Profesional motivado y comprometido con el aprendizaje continuo y el desarrollo profesional, buscando siempre expandir
 mis conocimientos y habilidades para mantenerme a la vanguardia en el sector. Enfocado en alcanzar resultados
 significativos y contribuir al progreso del equipo, valorando la colaboración, el intercambio de ideas y el apoyo mutuo para
 lograr objetivos comunes. Alto nivel de dedicación, proactividad y una disposición constante para asumir nuevos desafíos.
 Me distingo por mi capacidad de adaptarme a cambios, fomentar un ambiente positivo y aportar soluciones creativas que
 impulsan la innovación y el éxito colectivo. Siempre con una actitud de mejora constante, soy capaz de liderar y motivar a
 otros, asegurando el cumplimiento de metas y la excelencia en cada proyecto.</p>
        <h1>Experiencias</h1>
        <p>Tecnicatura Superior en  Desarrollo de software. </br>
Experto en una amplia variedad de lenguajes y tecnologías, incluyendo JavaScript, HTML, CSS, PHP, SQL, Java, Angular, React y Node.js. 
Dominio de metodologías ágiles para optimizar procesos de desarrollo y asegurar entregas eficientes y de alta calidad.
I.S.F.T N°232, Burzaco. Mar 2021 - Nov 2024.</p>
        <a href='/'>Volver al inicio</a>
    ";
    render_html('about me', $content);
});

// cosa que probe
Flight::route('/random-number', function() {
    $number = rand(1, 100);
    $content = "
        <h1>Número aleatorio</h1>
        <p>El número generado es: <strong>$number</strong></p>
        <br><a href='/'>Volver al inicio</a>
    ";
    render_html('numero random', $content);
});

// JSON
Flight::route('/json-data', function() {
    $data = [
        "name" => "Mini App con FlightPHP",
        "version" => "1.0.0",
        "features" => [
            "Rutas basicas",
            "Generacion de numeros aleatorios",
            "Datos en formato JSON",
        ]
    ];
    Flight::json($data);
});

// manejo de errores
Flight::map('notFound', function() {
    $content = "
        <h1>Error 404</h1>
        <p>Lo sentimos, la página que buscas no existe.</p>
        <a href='/'>Volver al inicio</a>
    ";
    render_html('ERROR', $content);
});

Flight::start();
