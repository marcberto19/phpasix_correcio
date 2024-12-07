<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demo ASIX</title>
</head>
<body>
<h1>Editar llibre: <?= $book->name?></h1>
<div>
    <form action="/books/update/<?= $book->id ?>" method="POST">
        <div>
            <label for="name">Títol</label>
            <input type="text" name="name" id="name" value="<?=$book->name?>">
        </div>
        <div>
            <label for="author">Autor</label>
            <input type="text" name="author" id="author" value="<?=$book->author?>">
        </div>
        <div>
            <label for="releaseYear">Any</label>
            <input type="number" name="releaseYear" id="releaseYear" value="<?=$book->releaseYear?>">
        </div>
        <button type="submit">Editar</button>
    </form>
</div>
</body>
</html>