<?php

require 'app.php';



$empresa = new Dim_empresas( $pdo );

$empresas = $empresa->traeEmpresasLogin();




$group_e_email = "";

if ( isset( $_POST['email'] ) )
{

    $vendedor = new Dim_vendedores( $pdo );

    $email = $_POST['email'];

    if ( !$vendedor->existeCorreo( $email ) )
    {
        $e_correo       = "El correo ingresado no existe";
        $group_e_email  = "has-error";
    }


    if( $_POST['password'] and $_POST['empresa'] )
    {
        $password   = $_POST['password'];
        $idEmpresa  = $_POST['empresa'];

        if( !$vendedor->validaUsuario( $idEmpresa, $email, $password ) )
        {
            $e_correo       = "Sus credenciales no son válidas";
            $group_e_email  = "has-error";

        }else{

            $usuario = $vendedor->traeVendedor( $idEmpresa, $email, $password );


            session_start();
            $_SESSION["username"] = $usuario->nombre;

            header('Location: index.php');

        }
    }


}








require ('login.view.php');