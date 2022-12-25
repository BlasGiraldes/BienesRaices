<?php



define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', ($_SERVER['DOCUMENT_ROOT']. '/imagenes/'));

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/${nombre}.php";
}

function limitar_cadena($cadena, $limite, $sufijo)
{
    // Si la longitud es mayor que el límite...
    if (strlen($cadena) > $limite) {
        // Entonces corta la cadena y ponle el sufijo
        return substr($cadena, 0, $limite) . $sufijo;
    }

    // Si no, entonces devuelve la cadena normal
    return $cadena;
}

function estaAutenticado()
{
    session_start();
    if (!$_SESSION['login'])
        header('Location: /');
}


function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}


// Sanitizar  el html

function  s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido

function validarTipoContenido($tipo)
{
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes

function mostrarNotificacion($codigo)
{
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $resultado = "Creado Corretamente";
            break;
        case 2:
            $resultado = "Actualizado Corretamente";
            break;
        case 3:
            $resultado = "Eliminado Corretamente";
            break;

        default: 
            $mensaje = false;
            break;

    }

    return $mensaje;
}

function validarORediccionar(string $url){
    // VALIDAR ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: ${url}");
}

return $id;
}