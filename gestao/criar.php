<?php
include 'partes/header.php';
require __DIR__ . '/users/users.php';


$user = [
    'id' => '',
    'nome' => '',
    'cpf' => '',
    'email' => '',
    'telefone' => '',
    'idade' => "",
    'site' => '',
];

$errors = [
    'nome' => "",
    'cpf' => "",
    'email' => "",
    'telefone' => "",
    'idade' => "",
    'site' => "",
];
$isValid = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user, $_POST);

    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = createUser($_POST);

        uploadImage($_FILES['picture'], $user);

        header("Location: teste.php");
    }
}

?>

<?php include '_form.php' ?>

<?php include 'partes/footer.php' ?>