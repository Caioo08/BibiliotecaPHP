<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Cadastro de Livro</h1>

        <?= $model->getErrors() ?>

        <form method="post" action="/livro/cadastro" class="p-5">
            
            <input name="id" type="hidden" value="<?= $model->Id ?>" /> 
           
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" value="<?= $model->Titulo ?>" class="form-control" name="titulo" id="titulo">
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" value="<?= $model->Isbn ?>" class="form-control" name="isbn" id="isbn">
            </div>

            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" value="<?= $model->Editora ?>" class="form-control" name="editora" id="editora">
            </div>

            <div class="mb-3">
                <label for="ano" class="form-label">Ano:</label>
                <input type="text" value="<?= $model->Ano ?>" class="form-control" name="ano" id="ano">
            </div>

            <div class="mb-3">
                <label for="id_categoria" class="form-label">Categoria:</label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    <option>Selecione uma categoria</option>

                    <?php foreach($model->rows_categorias as $item): ?>
                        <option value="<?= $item->Id ?>" <?= ($item->Id == $model->Id_Categoria) ? 'selected' : '' ?>> 
                            <?= $item->Descricao ?> 
                        </option>
                    <?php endforeach ?>

                </select>
            </div>

            <p>Autores:</p>

            <div class="mb-3">
                <?php foreach($model->rows_autores as $item): ?>
                <label>
                    <input type="checkbox" value="<?= $item->Id ?>" name="autor[]" <?= (in_array($item->Id, $model->Id_Autores)) ? 'checked' : '' ?> />
                     <?= $item->Nome ?> 
                </label>
                <br />
                <?php endforeach ?>
            </div>


          
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>