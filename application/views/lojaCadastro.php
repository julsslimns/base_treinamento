<style>
.botao-cadastro {

    margin-bottom: 65px;
    color: #171515;

}

.titulo {
    text-align: center;
    margin: 50 auto;
    color: #171515;
}


body {
    font-family: "Raleway";
    background-color: #f5f5f5;

}

.row {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
}

.botao-cadastro {
    background-color: #337ab7;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    justify-content: center:
}

.botao-cadastro:hover {
    background-color: #23527c;
}
</style>

<main>


    <section class="title-page">
        <h1 class="titulo"> Produtos para cadastro </h1>


    </section>

    <section class="row">
        <div class="form-group col-md-6">
            <label for="produto_nome">Nome:</label>
            <input type="text" id="produto_nome" class="form-control">
        </div>

        <div class="form-group col-md-3">
            <label for="produto_custo">Custo:</label>
            <input type="text" id="produto_custo" class="form-control">
        </div>

        <div class="form-group col-md-3">
            <label for="produto_preco">Preço:</label>
            <input type="text" id="produto_preco" class="form-control">
        </div>

        <div class="form-group col-md-9">
            <label for="produto_descricao">Descrição do Produto:</label>
            <input type="text" id="produto_descricao" class="form-control">
        </div>

        <div class="form-group col-md-3">
            <label for="produto_estoque">Estoque:</label>
            <input type="text" id="produto_estoque" class="form-control">
        </div>
        <div>
            <div class="col-md-12"
                style="display: flex; justify-content: center; align-items: center; transition: 0.3s ease-in-out;">
                <button class="btn btn-primary" onclick="cadastrar()"> Cadastar Produto</button>
            </div>

        </div>
        

    </section>



</main>

<script>
function cadastrar() {
    let nome = $("#produto_nome").val().trim();
    if (nome == "") {
        return
    }

    let custo = $("#produto_custo").val().trim();
    if (custo == "") {
        return
    }

    let preco = $("#produto_preco").val().trim();
    if (preco == "") {
        return
    }

    let descricao = $("#produto_descricao").val().trim();
    if (descricao == "") {
        return
    }

    let estoque = $("#produto_estoque").val().trim();
    if (estoque == "") {
        return
    }

    $.ajax({
        url: '<?= base_url('loja/ajax_novoProduto') ?>', // nome do controller e a action (que é o método) que será chamado e vai fazer a consulta (aqui é ajax_novoProduto)  
        type: 'POST',
        dataType: 'json',
        data: {
            nome: nome,
            custo: custo,
            preco: preco,
            descricao: descricao,
            estoque: estoque
        },
        success: function(data) {
            alert(data);

            if (data.success) {
                alert(data.message); // Mostra a mensagem de sucesso
                $("#produto_nome").val('');
                $("#produto_custo").val('');
                $("#produto_preco").val('');
                $("#produto_descricao").val('');
                $("#produto_estoque").val('');
            } else {
                alert(data.message); // Mostra a mensagem de erro, se houver
            }
        },
        error: function(xhr, status, error) {
            console.log('Erro na requisição AJAX');
            console.log(xhr.responseText);

        }
    });

}
</script>
