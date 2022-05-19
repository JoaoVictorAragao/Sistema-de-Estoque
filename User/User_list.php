<?php
    include_once "../conection/conex.php";

    $list = "SELECT id, nome, login, situacao, permissao FROM user_cad";
    $result_user = $conn->prepare($list);
    $result_user->execute();

    $dados = "";

    while($row_user = $result_user->fetch(PDO::FETCH_ASSOC)){
        extract($row_user);
        $dados .=   "<tr>   
                            <td>".$id."</td>
                            <td>".$nome."</td>
                            <td>".$login."</td>
                            <td>".$permissao."</td>
                            <td>".$situacao."</td>
                            <td>Editar/Apagar</td>
                        </tr>";
                    
      
    }
    echo $dados;
    

?>