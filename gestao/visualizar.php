<?php
include 'partes/header.php';
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include "partes/404.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partes/404.php";
    exit;
}

?>
<div class="controle">
    <div class="card">
        <div class="card-header">
            <h3>Visualizando: <b><?php echo $user['nome'] ?></b></h3>

        </div>
        <div class="card-body">
            <a class="btn btn-secondary" href="atualizar.php?id=<?php echo $user['id'] ?>">Atualizar informações</a>
            <form style="display: inline-block" method="POST" action="deletar.php">
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                <button class="btn btn-danger">Deletar</button>
            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>   <th>Foto:</th>
            <td>   <?php if (isset($user['extension'])): ?>
                   <img style="width: 160px" src="<?php echo "users/images/${user['id']}.${user['extension']}" ?>" alt="">
                    <?php endif; ?></td>
                    </tr>
                
            <tr>
                <th>Nome:</th>
                <td><?php echo $user['nome'] ?></td>
            </tr>
            <tr>
                <th>Cpf</th>
                <td><?php echo $user['cpf'] ?></td>
            </tr>
            <tr>
                <th>E-mail:</th>
                <td><?php echo $user['email'] ?></td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td><?php echo $user['telefone'] ?></td>
            </tr>
            <tr>
                <th>Data de nascimento:</th>
                <td><?php echo $user['idade'] ?></td>
            </tr>
            <tr>
                <th>Site:</th>
                <td>
                    <a target="_blank" href="http://<?php echo $user['site'] ?>">
                        <?php echo $user['site'] ?>
                    </a>
                </td>
            </tr>
            <tr>
               
            
            </tr>
            
            
            </tbody>
            
            <form>
 
</form>
        </table>
    </div>
</div>


<?php include 'partes/footer.php' ?>