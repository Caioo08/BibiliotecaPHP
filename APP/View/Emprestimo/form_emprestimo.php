<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistemas Biblioteca - Cadastro de Emprestimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>

        <h1>Cadastro de Emprestimo</h1>

        <?= $model->getErrors() ?>

        <form method="post" action="/emprestimo/cadastro" class="p-5">
            
            <input name="id" type="hidden" value="<?= $model->Id ?>" /> 

            <div class="mb-3">
                <label for="id_aluno" class="form-label">Aluno:</label>
                <select class="form-control" name="id_aluno" id="id_aluno">
                    <option>Selecione um aluno</option>

                    <?php foreach($model->rows_alunos as $item): ?>
                        <option value="<?= $item->Id ?>" <?= ($item->Id == $model->Dados_Aluno?->Id) ? 'selected' : '' ?>> 
                            <?= $item->Nome ?> 
                        </option>
                    <?php endforeach ?>

                </select>
            </div>

            <div class="mb-3">
                <label for="id_livro" class="form-label">Livro:</label>
                <select class="form-control" name="id_livro" id="id_livro">
                    <option>Selecione um livro</option>

                    <?php foreach($model->rows_livros as $item): ?>
                        <option value="<?= $item->Id ?>" <?= ($item->Id == $model->Dados_Livro?->Id) ? 'selected' : '' ?>> 
                            <?= $item->Titulo ?> 
                        </option>
                    <?php endforeach ?>

                </select>
            </div>    
            
            <div class="mb-3">
                <label for="data_emprestimo" class="form-label">Data Emprestimo:</label>
                <input type="date" value="<?= $model->Data_Emprestimo ?>"  class="form-control" name="data_emprestimo" id="data_emprestimo">
            </div>

            <div class="mb-3">
                <label for="data_devolucao" class="form-label">Data Devolução:</label>
                <input type="date" value="<?= $model->Data_Devolucao ?>"  class="form-control" name="data_devolucao" id="data_devolucao">
            </div>
            
            
            <button type="submit" class="btn btn-success">Salvar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>