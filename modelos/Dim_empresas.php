<?php

class Dim_empresas
{

    protected $pdo;

    private $table = 'desaerp.dbo.dim_empresas';


    public function __construct( PDO $pdo )

    {

        $this->pdo = $pdo;

    }


    /**
     * Consulta que carga los datos del combo para el login
     *
     * @return array Empresas que aparecerán en el login
     */
    public function traeEmpresasLogin()

    {

        $sql = 	"".
            "select *                         ".
            "from   desaerp.dbo.dim_empresas  ".
            "where  idempresa in ( 1, 2, 4 ); ";

        $consulta = $this->pdo->prepare( $sql );
        $consulta->execute();
        $empresas = $consulta->fetchAll( PDO::FETCH_OBJ );


        return $empresas;

    }

}