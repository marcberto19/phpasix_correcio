<?php
namespace App\Controllers;
use App\Models\Arma;
class ArmesController {

    public function index() {
        $books = Arma::all();
        require '../resources/views/armes/index.blade.php';
    }

    public function create() {
        require '../resources/views/armes/create.blade.php';
    }

    public function store() {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $releaseYear = $_POST['releaseYear'];

        $newBook = new Arma([
            'name' => $name,
            'author' => $author,
            'releaseYear' => $releaseYear
        ]);
        $newBook->save();
        header('Location: /armes');
    }

    public function edit($id) {
        $book = (new \App\Models\Arma)->find($id);
        if(!$book) {
            header('Location: /armes');
            exit();
        }
        require '../resources/views/books/edit.blade.php';
    }

    public function update($id) {
        $book = (new \App\Models\Arma)->find($id);
        if(!$book) {
            header('Location: /armes');
            exit();
        }
        $book->name = $_POST['name'];
        $book->author = $_POST['author'];
        $book->releaseYear = $_POST['releaseYear'];
        $book->save();
        header('Location: /armes');
    }

    public function delete($id) {
        if ($id === null) {
            header('Location: /armes');
            exit();
        }
        $book = (new \App\Models\Arma)->find($id);
        return require '../resources/views/armes/delete.blade.php';
    }

    public function destroy($id) {
        (new \App\Models\Arma)->delete($id);
        header('Location: /armes');
    }

    public function confirmDelete($id) {
        $book = (new \App\Models\Arma)->find($id);
        return require '../resources/views/armes/delete.blade.php';
    }
}