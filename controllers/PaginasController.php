<?php


namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController
{
    public static function index(Router $router)
    {

        $propiedades = Propiedad::get(3);

        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {

        $propiedades = Propiedad::all();



        $router->render('paginas/propiedades', [

            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {

        $id = validarORediccionar('/propiedades');

        // buscar id

        $propiedad = Propiedad::find($id);


        $router->render('paginas/propiedad', [

            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }


    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $respuestas = $_POST['contacto'];
           
            // Crear una instancia de PHPMailer

            $mail = new PHPMailer();


            // CONFIGURAR SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'de31401d2140e8';
            $mail->Password = '533b92e8baf0a0';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            // Habilitar HTML

            $mail->isHTML(TRUE);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre']    . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje']    . '</p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo']    . '</p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio']    . '</p>';
            $contenido .= '</html>';

            // Enviar de forma condicional algunos campos de email o telefono

            if ($respuestas['contacto'] === 'telefono') {
                $contenido .='<p> Eligió ser contactado por Telefono: </p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono']    . '</p>';
                $contenido .= '<p>Fecha contacto: ' . $respuestas['fecha']    . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora']    . '</p>';
            } else{
                // Es email, campo email
                $contenido .='<p> Eligió ser contactado por email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['email']    . '</p>';

            }


            $mail->Body = $contenido;

            $mail->AltBody = 'Esto es texto alternaticvo sin HTML';
            // Enviar el mail

            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            }else{
                $mensaje = "El mensaje no se puedo enviar... Intentalo de nuevo.";
            }

        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);

    }
}
