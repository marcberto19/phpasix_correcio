<?php
namespace App\Controllers;
use App\Models\Arma;

class ArmesController {

    public function index() {
        $armas = Arma::all(); // Obtener todas las armas
        require '../resources/views/armes/index.blade.php'; // Mostrar la vista de lista de armas
    }

    public function create() {
        require '../resources/views/armes/create.blade.php'; // Mostrar formulario para crear una nueva arma
    }

    public function store() {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $dmg = $_POST['dmg']; // Ahora definido correctamente
        $descripcion = $_POST['descripcion'];

        $nuevaArma = new Arma([
            'nombre' => $nombre,
            'tipo' => $tipo,
            'dmg' => $dmg,
            'descripcion' => $descripcion
        ]);
        $nuevaArma->save();
        header('Location: /armes');
    }

    public function update($id) {
        $arma = (new \App\Models\Arma)->find($id);
        if (!$arma) {
            header('Location: /armes');
            exit();
        }

        $arma->nombre = $_POST['nombre'];
        $arma->tipo = $_POST['tipo'];
        $arma->dmg = $_POST['dmg']; // Cambio aquí para usar "dmg"
        $arma->descripcion = $_POST['descripcion'];
        $arma->save();
        header('Location: /armes');
    }


    public function delete($id) {
        if ($id === null) {
            header('Location: /armes'); // Si no se proporciona un id, redirigir al listado
            exit();
        }
        $arma = (new \App\Models\Arma)->find($id); // Buscar el arma por su id
        return require '../resources/views/armes/delete.blade.php'; // Mostrar vista de confirmación de eliminación
    }

    public function destroy($id) {
        (new \App\Models\Arma)->delete($id); // Eliminar el arma de la base de datos
        header('Location: /armes'); // Redirigir al listado de armas
    }

    public function confirmDelete($id) {
        $arma = (new \App\Models\Arma)->find($id); // Buscar el arma por su id
        return require '../resources/views/armes/delete.blade.php'; // Mostrar vista de confirmación de eliminación
    }
}

