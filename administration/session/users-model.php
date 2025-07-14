<?php

include_once("db.php");

class User
{

    public $pdo;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Create($file, $post)
    {
        $columns = explode("-", $post["list"]);
        $query = "INSERT INTO user (";

        /** ARMANDO PRIMER PARTE DE INSERT (FIELDS) */
        $count = 0;
        for ($i = 0; $i < count($columns); $i++) {
            $count++;
            if ($count == count($columns)) {
                $query .= $columns[$i] . ")";
            } else {
                $query .= $columns[$i] . ",";
            }
        }

        /** ARMANDO SEGUNDA PARTE DE INSERT (VALUES) */
        $query .= "VALUES (";
        $count = 0;
        for ($i = 0; $i < count($columns); $i++) {
            $count++;
            if ($count == count($columns)) {
                $query .= "'" . $post[$columns[$i]] . "')";
            } else {
                $query .= "'" . $post[$columns[$i]] . "',";
            }
        }

        $result = $this->pdo->prepare($query);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function Update($post)
    {
        $columns = explode("-", $post["list"]);
        $query = "UPDATE user SET ";

        /** CONSTRUIR UPDATE */
        $count = 0;
        for ($i = 0; $i < count($columns); $i++) {
            $count++;
            if ($count == count($columns)) {
                $query .= $columns[$i] . "= '" . $post[$columns[$i]] . "' WHERE id_user =" . $post['id_user'];
            } else {
                $query .= $columns[$i] . "= '" . $post[$columns[$i]] . "',";
            }
        }
        $result = $this->pdo->prepare($query);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /** Metodo para obtener crud */
    public function Delete($post)
    {
        $query = $this->pdo->prepare("DELETE FROM user WHERE id_user =" . $post['id_user']);
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /** Metodo para obtener crud */
    public function GetCrud()
    {
        $query = $this->pdo->prepare("SELECT * FROM crud WHERE name_table = 'user'");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /** Metodo para obtener la lista de los campos */
    public function GetListField($post)
    {
        $query = $this->pdo->prepare("SELECT * FROM field WHERE id_crud = " . $post['id_crud'] . "");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);

        for ($i = 0; $i < count($data); $i++) {
            $query = $this->pdo->prepare("SELECT * FROM sub_field WHERE id_field = " . $data[$i]->id_field . "");
            $query->execute();
            $sub_fields = $query->fetchAll(PDO::FETCH_OBJ);
            $data[$i]->sub_fields = $sub_fields;
        }

        return $data;
    }

    public function GetUsers()
    {
        $query = $this->pdo->prepare("SELECT * FROM user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function Login($post)
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE username = '".$post['username']."' AND pass ='".$post['pass']."'");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

}
