<?php
namespace App\Models;

use Core\App;
use PDO;

class Arma {
    protected static $table = "armas";

    public $id;
    public $nombre;
    public $tipo;
    public $dmg;
    public $descripcion;

    public function __construct($data = []) {
        if(isset($data['id'])) {
            $this->id = $data['id'];
        }
        $this->nombre = $data['nombre'] ?? '';
        $this->tipo = $data['tipo'] ?? '';
        $this->dmg = $data['dmg'] ?? 0;
        $this->descripcion = $data['descripcion'] ?? '';
    }

    public function save() {
        $db = App::get('database')->getConnection();
        if ($this->id) {
            // Editar (update)
            $statement = $db->prepare('UPDATE ' . static::$table . ' SET nombre = :nombre, tipo = :tipo, dmg = :dmg, descripcion = :descripcion WHERE id = :id');
            $statement->bindValue(':id', $this->id);
            $statement->bindValue(':nombre', $this->nombre);
            $statement->bindValue(':tipo', $this->tipo);
            $statement->bindValue(':dmg', $this->dmg);
            $statement->bindValue(':descripcion', $this->descripcion);
            $statement->execute();
        } else {
            // Crear (insert)
            $statement = $db->prepare('INSERT INTO '. static::$table . ' (nombre, tipo, dmg, descripcion) VALUES (:nombre, :tipo, :dmg, :descripcion)');
            $statement->bindValue(':nombre', $this->nombre);
            $statement->bindValue(':tipo', $this->tipo);
            $statement->bindValue(':dmg', $this->dmg);
            $statement->bindValue(':descripcion', $this->descripcion);
            $statement->execute();

            if (!$this->id) {
                $this->id = $db->lastInsertId(); // Obtener el ID del nuevo registro insertado
            }
        }
    }

    public static function all() {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . static::$table);
        $statement->execute();
        $armas = [];
        $results = $statement->fetchAll();
        foreach ($results as $result) {
            $armas[] = new self($result);
        }
        return $armas;
    }

    public function find($id) {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
        $data = $statement->fetch();
        return $data ? new self($data) : null;
    }

    public function delete($id) {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}

