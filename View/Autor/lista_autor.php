<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas Biblioteca - Cadastro de autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Lista de Autores</h1>
        <a href="/aluno/cadastro">Novo Autor</a>
        <?= $model->getErrors() ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CPF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->rows as $autor): ?>
                <tr>
                    <td> <?= $autor->Id ?> </td>
                    <td> <a href="/autor/cadastro?id=<?= $autor->Id ?>"><?= $autor->Nome ?></a> </td>
                    <td> <?= $autor->Curso ?> </td>
                    <td> <a href="/autor/delete?id=<?= $autor->Id ?>">Remover</a> </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>