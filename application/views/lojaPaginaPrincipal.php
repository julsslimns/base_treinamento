<style>
.title-page {
    display: flex;
    justify-content: space-between;
    align-items: center;

}

body {
    font-family: "Raleway";
}
</style>

<main>
    <h1> Página Principal </h1>

    <section class="title-page">
        <h1>Produtos</h1>

        <a href="<?= base_url('loja/cadastro') ?>" class="btn btn-primary">Cadastrar Produto</a>
    </section>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Custo</th>
                <th scope="col">Preço</th>
                <th scope="col">Descricao</th>
                <th scope="col">Estoque</th>
                <th scope="col">Editar</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['custo'] ?></td>
                <td><?= $produto['preco'] ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td><?= $produto['estoque'] ?></td>
                <td width="5%"><a href= "<?= base_url('loja/editar/' . $produto['id_produto']) ?>"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></a></td>
                <td width="5%"><button class="btn btn-danger" onclick="remover()"'<?= $produto['id_produto'] ?>')">
                        <i class="fa fa-remove"></i> </button> </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <script>
    function remover(id_produto) {
        alert(id_produto)

        $.ajax({
                url: '<?= base_url('loja/remover') ?>',
                type: 'POST',
                data: {
                    id_produto: id_produto
                },
                success: function(data) {
                     // Recarrega a página após a remoção bem-sucedida
					location.reload();
                    
					
                }
            }

        )
    }
    </script>
</main>
