<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Demo ASIX</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        header a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
            width: 80%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        .actions a {
            text-decoration: none;
            color: #4CAF50;
            margin: 0 10px;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .create-link {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .create-link:hover {
            background-color: #45a049;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50; /* Verd */
            color: white;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px; /* Espai a la dreta */
        }

        .button:hover {
            background-color: #45a049; /* Verd més fosc al passar el cursor */
        }

        .create-link {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .create-link:hover {
            background-color: #45a049;
        }



    </style>
</head>
<body>
<header>
    <h1>Gestió de Llibres</h1>
</header>

<div class="container">
    <p>
        <a class="create-link" href="/books/create">Crear Llibre</a>
        <!-- Botó per a la pàgina principal i armes -->
        <a href="/" class="button">Tornar a la pàgina principal</a>
        <a href="/armes" class="button">Anar a Armes</a>
    </p>

    <table>
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Títol</th>
            <th scope="col">Autor</th>
            <th scope="col">Any</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?=$book->id;?></td>
            <td><?=$book->name;?></td>
            <td><?=$book->author;?></td>
            <td><?=$book->releaseYear;?></td>
            <td class="actions">
                <a href="/books/edit/<?= $book->id?>">Editar</a>
                <a href="/books/confirm-delete/<?= $book->id?>">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>


