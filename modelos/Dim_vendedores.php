<?php


class Dim_vendedores

{

    protected $pdo;

    protected $table = 'desaerp.dbo.dim_vendedores2';

    public function __construct( PDO $pdo )

    {
        $this->pdo = $pdo;

    }


    /**
     * Verifica si un correo existe
     *
     * @param $email
     * @return bool
     */
    public function existeCorreo( $email )

    {
        $sql = 	"select Count(*) as cuenta  ".
            "from   {$this->table}          ".
            "where  email = '{$email}';     ";


        $consulta = $this->pdo->prepare( $sql );

        $consulta->execute();

        $resultado = $consulta->fetchColumn(  );

        if( $resultado > 0 )
        {
            return true;
        }else{
            return false;
        }

    }


    /**
     * Verifica si existe el usuario
     *
     *
     * @param $empresa
     * @param $email
     * @param $psw_pedidos
     * @return bool true si el usuario existe
     */
    public function validaUsuario( $idempresa, $email, $psw_pedidos)
    {

        $sql = 	"".
            "select count(*)                            ".
            "from   {$this->table}                      ".
            "where  email = '{$email}'                  ".
            "       and psw_pedidos = '{$psw_pedidos}'  ".
            "       and idempresa = '{$idempresa}';     ";

        $consulta = $this->pdo->prepare( $sql );
        $consulta->execute();
        $resultado = $consulta->fetchColumn( );

        if( $resultado > 0 )
        {
            return true;
        }else{
            return false;
        }

    }


    /**
     * trae los datos del vendedor
     *
     *
     * @param $idempresa
     * @param $email
     * @param $psw_pedidos
     * @return array
     */
    public function traeVendedor( $idempresa, $email, $psw_pedidos)

    {

        $sql = 	"".
            "select *                                   ".
            "from   {$this->table}                      ".
            "where  email = '{$email}'                  ".
            "       and psw_pedidos = '{$psw_pedidos}'  ".
            "       and idempresa = '{$idempresa}';     ";

        $consulta = $this->pdo->prepare( $sql );
        $consulta->execute();

        $vendedor = $consulta->fetch( PDO::FETCH_OBJ );


        return $vendedor;

    }





}