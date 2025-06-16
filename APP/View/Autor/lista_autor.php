<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Lista de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Lista de Autores</h1>

        <a href="/autor/cadastro">Novo Autor</a>

        <?= $model->getErrors() ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->rows as $autor): ?>
                <tr>
                    <td> <?= $autor->Id ?> </td>
                    <td> <a href="/autor/cadastro?id=<?= $autor->Id ?>"><?= $autor->Nome ?></a> </td>
                    <td> <a href="/autor/delete?id=<?= $autor->Id ?>">Remover</a> </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>