<?php 

include SITE_ROOT . "/db.php";

$errMsg = [];


// Створення послуги ремонту
if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['add_rm'])) {
    $name = trim($_POST['pg-td-inp-name']);
    $price = trim($_POST['pg-td-inp-price']);

    
    if ($name === '' || $price === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($name, 'UTF8') < 5) {
        array_push($errMsg, "Назва послуги має бути більше 5-ти символів");
    } else { 
        $existence = selectOne('poslygi_rm1', ['poslyga_name' => $name]);
        if($existence && $existence['poslyga_name'] === $_POST['pg-td-inp-name']) {
            array_push($errMsg, "Послуга з такою назвою вже існує");
        } else {    
            $post = [
                'poslyga_name' => $name,
                'price' => $price
            ];
            $id = insert('poslygi_rm1', $post);
            $user = selectOne('poslygi_rm1', ['id' => $id] );
            header('location: ' . BASE_URL . "assets/php/admin/poslygi/poslygi-remont.php");
        }
    } 
}

// Створення послуги пошиття
if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['add_ps'])) {
    $name = trim($_POST['pg-td-inp-name']);
    $price = trim($_POST['pg-td-inp-price']);

    
    if ($name === '' || $price === '') {
        array_push($errMsg, "Не всі поля заповнені!");
    } elseif (mb_strlen($name, 'UTF8') < 5) {
        array_push($errMsg, "Назва послуги має бути більше 5-ти символів");
    } else { 
        $existence = selectOne('poslygi_ps1', ['poslyga_name' => $name]);
        if($existence && $existence['poslyga_name'] === $_POST['pg-td-inp-name']) {
            array_push($errMsg, "Послуга з такою назвою вже існує");
        } else {    
            $post = [
                'poslyga_name' => $name,
                'price' => $price
            ];
            $id = insert('poslygi_ps1', $post);
            $user = selectOne('poslygi_ps1', ['id' => $id] );
            header('location: ' . BASE_URL . "assets/php/admin/poslygi/poslygi-poshitta.php");
        }
    } 
}

// Видалення послуг ремонту
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_rm'])){
    $id = $_GET['delete_rm'];
    delete('poslygi_rm1', $id);
    header('location: ' . BASE_URL . 'assets/php/admin/poslygi/poslygi-remont.php');
}

// Видалення послуг пошиття
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_ps'])){
    $id = $_GET['delete_ps'];
    delete('poslygi_ps1', $id);
    header('location: ' . BASE_URL . 'assets/php/admin/poslygi/poslygi-poshitta.php');
}

?>

