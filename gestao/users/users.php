<?php

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function createUser($data)
{
    $users = getUsers();

    $data['id'] = rand(1000000, 2000000);

    $users[] = $data;

    putJson($users);

    return $data;
}

function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function deleteUser($id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function uploadImage($file, $user)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Obtém a extensão do arquivo do nome do arquivo
        $fileName = $file['name'];
        // Busca o ponto do nome do arquivo
        $dotPosition = strpos($fileName, '.');
        // Busca do ponto inicial até o final da string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;
    // Início da validação do registro de novos Lead

    if (!$user['nome']) { // CAMPO NOME
        $isValid = false;
        $errors['nome'] = 'O nome é obrigatório';
    }
    if (!$user['cpf'] || strlen($user['cpf']) < 12 || strlen($user['cpf']) > 14) { //CAMPO CPF
        $isValid = false;
        $errors['cpf'] = 'O Cpf informado é invalido';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) { // CAMPO EMAIL
        $isValid = false;
        $errors['email'] = 'O endereço de e-mail informado é invalido';
    }

    if (!filter_var($user['telefone'], FILTER_VALIDATE_INT)) { // CAMPO TELEFONE
        $isValid = false;
        $errors['telefone'] = 'O numero de telefone informado é invalido';
    }

    if (!filter_var($user['idade'], FILTER_VALIDATE_INT)) { // CAMPO IDADE
        $isValid = false;
        $errors['idade'] = 'A data de nascimento informada é invalida.';
    }
    // Fim da validação do registro

    return $isValid;
}
