

<h4>  Produtos cadastrados  </h4>

<table class="table  table-hover m-0 ">
    
 <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Categoria</th>
    <th>Preço</th>
    <th>Quantia em Estoque</th>
     <th>Data de validade</th>
    <th></th>
    <th></th>

 </tr>

 <?php
    
    $sqlProdutos = "SELECT * FROM produtos";

    
    $resultadoProdutos = $conn -> query($sqlProdutos);


    while ($linha = $resultadoProdutos->fetch_assoc()){
        echo"<tr>

            <td>" . $linha["id"] . "</td>
            <td>" . $linha["nome"] . "</td>
            <td>" . $linha["categoria"] . "</td>
            <td>" . $linha["preco"] . "</td>
            <td>" . $linha["quantiaEstoque"] . "</td>
            <td>" . $linha["dataValidade"] . "</td>
            <td>
                <a href='public/editar.php?id=" . $linha["id"] . "' 
                   class='btn btn-outline-dark'>
                    Editar
                </a>
            </td>

            <td>
                <a href='public/excluir.php?id=" . $linha["id"] . "' 
                   class='btn btn-outline-danger'>
                    Excluir
                </a>
            </td>

        </tr>";

    }
?>




</table>