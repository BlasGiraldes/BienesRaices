<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{

    public static function login(Router $router)
    {


        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Admin($_POST);

            $errores = $auth->validar();


            if (empty($errores)) {

                // Verificar user

                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    // verificar si el usuario existe o no 
                    $errores = Admin::getErrores();
                } else {
                    // Verificar pw
                    $autenticado =  $auth->comprobarPassword($resultado);


                    if ($autenticado) {
                        // Autenticar
                        $auth->autenticar();

                    } else {

                        //pw incorrecto
                        $errores = Admin::getErrores();
                    }
                }
            }
        }
        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout()    {

    session_start();

    $_SESSION = [];

    header('Location: /');
    }
}
