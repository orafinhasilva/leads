<?php
include 'partes/header.php';
require __DIR__ . '/users/users.php';

if (!isset($_GET['id'])) {
    include "partes/not_found.php";
    exit;
}
$userId = $_GET['id'];

$user = getUserById($userId);
if (!$user) {
    include "partes/not_found.php";
    exit;
}

$errors = [
    'nome' => "",
    'cpf' => "",
    'email' => "",
    'telefone' => "",
    'idade' => "",
    'site' => "",
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = updateUser($_POST, $userId);
        uploadImage($_FILES['picture'], $user);
        header("Location: index.php");
    }
}

?>
<div class="controle">
<?php include '_form.php' ?>

</div>

<?php include 'partes/footer.php' ?>