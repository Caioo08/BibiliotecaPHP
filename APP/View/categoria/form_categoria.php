<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Cadastro de Categoria</h1>

        <?= $model->getErrors() ?>

        <form method="post" action="/categoria/cadastro" class="p-5">
            
            <input name="id" type="hidden" value="<?= $model->Id ?>" /> 
           
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" value="<?= $model->Descricao ?>" class="form-control" name="descricao" id="descricao">
            </div>
          
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>