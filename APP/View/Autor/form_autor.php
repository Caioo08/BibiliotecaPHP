<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Autores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Cadastro de Autor</h1>

        <?= $model->getErrors() ?>

        <form method="post" action="/autor/cadastro" class="p-5">
            
            <input name="id" type="hidden" value="<?= $model->Id ?>" /> 
           
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="<?= $model->Nome ?>" class="form-control" name="nome" id="nome">
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data Nascimento:</label>
                <input type="text" value="<?= $model->Data_Nascimento ?>"  class="form-control" name="data_nascimento" id="data_nascimento">
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" value="<?= $model->CPF ?>"  class="form-control" name="cpf" id="cpf">
            </div>            
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>