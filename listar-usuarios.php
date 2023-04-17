<h1>Listar Usuários</h1>
<?php 
    $sql = "SELECT * FROM usuarios";

    $res = $conn->query($sql);

    $qtd = $res->num_rows;
    print "<table class='table table-hover table-striped table-bordered'>";
    if($qtd > 0){
        print "<tr>";
            print "<td>#</td>";
            print "<th>Nome</th>";
            print "<th>Email</th>";
            print "<th>Senha</th>";
            print "<th>Ações</th>";
            print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->nome."</td>";
            print "<td>".$row->email."</td>";
            print "<td>".$row->data_nasc."</td>";
            print "<td>
                    <button class='btn btn-success' 
                        onClick=\"location.href='?page=editar&id=".$row->id."';\">
                        Editar</button>
                    <button class='btn btn-danger' 
                        onClick=\"if(confirm('Tem certeza que deseja excluir o usuário?'))
                        {location.href='?page=salvar&acao=excluir&id=".$row->id."';}else{false;};\">
                        Excluir</button>
                   </td>";
            print "</tr>";
        }
        print "</table>";
    }else{
        print "<script>alert('Não há ususarios cadastrados!');</script>";
    }
?>