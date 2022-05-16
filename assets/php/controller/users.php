<?php 

include SITE_ROOT . "/db.php";

$errMsg = [];

$users = selectAll('users');

// Створення користувача
if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['button-rg'])) {

    $admin = 0;
    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);

    
    if ($login === '' || $pass === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логін має бути більше 2-х символів");
    } else { 
        $existence = selectOne('users', ['login' => $login]);
        if($existence && $existence['login'] === $_POST['login']) {
            array_push($errMsg, "Користувач із таким логіном вже існує");
        } else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin = 1;
            $post = [
                'admin' => $admin,
                'login' => $login,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id] );
            array_push($errMsg, "Користувача створено");
        }
    }
}

// Авторизація користувача
if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['button-lg'])) {
    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);

    if ($login === '' || $pass === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } else {
        $existence = selectOne('users', ['login' => $login]);
        if ($existence && password_verify($pass, $existence['password'])) {
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['login'];
            $_SESSION['admin'] = $existence['admin'];

            if ($_SESSION['admin']) {
                header('location: ' . BASE_URL . "assets/php/admin/admin.php");
            } else {
                array_push($errMsg, "Ви не адміністратор!");
                //header('location: ' . BASE_URL);
            }
            
        } else {
            array_push($errMsg, "Логін або пароль введено неправильно!");
        }
    }
}

// Видалення користувача
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'assets/php/admin/users/users-index.php');
}

// Редагування користувача
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id =  $user['id'];
    $admin =  $user['admin'];
    $login = $user['login'];
}

// Оновлення данних про користувача
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

    $id = $_POST['id'];
    $login = trim($_POST['login']);
    $pass = trim($_POST['password']);
    $admin = isset($_POST['admin']) ? 1 : 0;
 
    if ($login === ''){
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логін має бути більше 2-х символів");
    } else {
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if (isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            //'login' => $login,
            'password' => $pass
        ];

        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'assets/php/admin/users/users-index.php');
    }

}


?>