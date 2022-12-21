<?php
include_once "Usuario.php";
include_once "config.php";

/*
 * Acceso a datos con BD Usuarios : 
 * Usando la librería mysqli
 * Uso el Patrón Singleton :Un único objeto para la clase
 * Constructor privado, y métodos estáticos 
 */

class AccesoDatos
{

    private static $modelo = null;
    private $dbh = null;

    public static function getModelo()
    {
        if (self::$modelo == null) {
            self::$modelo = new AccesoDatos();
        }
        return self::$modelo;
    }


    // Constructor privado  Patron singleton

    private function __construct()
    {

        try {
            $this->dbh = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DATABASE, DB_USER, DB_PASSWD);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


    }

    // Cierro la conexión anulando todos los objectos relacioanado con la conexión PDO (stmt)
    public static function closeModelo()
    {
        if (self::$modelo != null) {
            $obj = self::$modelo;
            // Cierro la base de datos
            $obj->dbh->close();
            self::$modelo = null; // Borro el objeto.
        }
    }

    function getNumClientes(): int
    {
        //Query the database for count of clientes
        $result = $this->dbh->query("SELECT COUNT(*) FROM Clientes");
        $row = $result->fetch(PDO::FETCH_NUM);
        return $row[0];
    }


    public function getUsuarios($primero, $cuantos): array
    {
        $tuser = [];
        // Crea la sentencia preparada
        $stmt_usuarios = $this->dbh->prepare("select * from clientes limit $primero, $cuantos");
        // Si falla termian el programa
        if ($stmt_usuarios == false) die (__FILE__ . ':' . __LINE__ . $this->dbh->error);
        // Ejecuto la sentencia
        $stmt_usuarios->execute();
        // Obtengo los resultados
        $result = $stmt_usuarios->fetchAll(PDO::FETCH_CLASS, 'Cliente');
        // Si hay resultado correctos
        if ($result) {
            // Obtengo cada fila de la respuesta como un objeto de tipo Usuario
            foreach ($result as $user) {
                $tuser[] = $user;
            }
        }
        // Devuelvo el array de objetos
        return $tuser;
    }

    // SELECT Devuelvo un usuario o false
    public function getUsuario(string $id)
    {
        $user = false;

        $stmt_usuario = $this->dbh->prepare("select * from Clientes where id = :id");

        $stmt_usuario->bindParam(':id', $id);

        $stmt_usuario->execute();
        $result = $stmt_usuario->fetch(PDO::FETCH_OBJ);
        if ($result) {
            $user = $result;
        }
        return $user;
    }


    // UPDATE
    public function modUsuario($user): bool
    {
        $stmt_moduser = $this->dbh->prepare("update Clientes set first_name=:first_name, last_name=:last_name, email=:email, gender=:gender, ip_address=:ip_address, telefono=:telefono where id=:id");


        $stmt_moduser->bindParam(':first_name', $user->first_name);
        $stmt_moduser->bindParam(':last_name', $user->last_name);
        $stmt_moduser->bindParam(':email', $user->email);
        $stmt_moduser->bindParam(':gender', $user->gender);
        $stmt_moduser->bindParam(':ip_address', $user->ip_address);
        $stmt_moduser->bindParam(':telefono', $user->telefono);
        $stmt_moduser->bindParam(':id', $user->id);
        $stmt_moduser->execute();
        return ($stmt_moduser->rowCount() == 1);
    }

    //INSERT
    public function addUsuario($user): bool
    {
        $stmt_creauser = $this->dbh->prepare("insert into Clientes (id, first_name, last_name, email, gender, ip_address, telefono) Values(:id,:first_name,:last_name,:email,:gender,:ip_address,:telefono)");

        $stmt_creauser->bindParam(':id', $user->id);
        $stmt_creauser->bindParam(':first_name', $user->first_name);
        $stmt_creauser->bindParam(':last_name', $user->last_name);
        $stmt_creauser->bindParam(':email', $user->email);
        $stmt_creauser->bindParam(':gender', $user->gender);
        $stmt_creauser->bindParam(':ip_address', $user->ip_address);
        $stmt_creauser->bindParam(':telefono', $user->telefono);

        $stmt_creauser->execute();
        return ($stmt_creauser->rowCount() == 1);
    }


    //DELETE
    public function borrarUsuario(string $id): bool
    {
        $stmt_boruser = $this->dbh->prepare("delete from Clientes where id = :id");

        $stmt_boruser->bindParam(':id', $id);
        $stmt_boruser->execute();
        $resu = ($stmt_boruser->rowCount() == 1);
        return $resu;
    }


    // Evito que se pueda clonar el objeto. (SINGLETON)
    public function __clone()
    {
        trigger_error('La clonación no permitida', E_USER_ERROR);
    }
}

