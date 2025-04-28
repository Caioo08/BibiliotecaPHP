<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas Bibliotecas - Cadastro de Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>
        <h1>Cadastro de Categorias</h1>
        <?= $model->getErrors() ?>

        <form action="/aluno/cadastro" method="post" class="p-5">
            <input type="hidden" name="id" value="<?= $model->Id ?>">

            <div class="mb-3">
                <label for="descricao" class="form-label">Categoria:</label>
                <input type="text" class="form-control" value="<?= $model->descricao ?>" name="descricao" id="descricao">
            </div>
            
        </form>

    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>