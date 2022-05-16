<?php 
include SITE_ROOT . "/db.php";

$errMsg = [];
$name = '';

$tmp_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/tmp/';
$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

$cards = selectAll('cards');


// Створення картки
if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['add-card'])) {
    $status = 0;
	$name = trim($_POST['card-name']);
    $post = [
        'status' => $status,
        'cardname' => $name
    ];
    $id_card = insert('cards', $post);
    $portfolio = selectOne('cards', ['id' => $id_card] );

	// Сохранение изображений в БД и перенос в постоянную папку.
	if (!empty($_POST['images'])) {
		foreach ($_POST['images'] as $row) {
			$filename = preg_replace("/[^a-z0-9\.-]/i", '', $row);
			if (!empty($filename) && is_file($tmp_path . $filename)) {
				$post = [
					'card_id' => $id_card,
					'filename' => $filename
				];
				$id_image = insert('cards_images', $post);
				$portfolio_images = selectOne('cards_images', ['id' => $id_image] );
				
				// Перенос оригинального файла
				rename($tmp_path . $filename, $path . $filename);
				
				// Перенос превью
				$file_name = pathinfo($filename, PATHINFO_FILENAME);				
				$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
				$thumb = $file_name . '-thumb.' . $file_ext;
				rename($tmp_path . $thumb, $path . $thumb);
                
                header('location: ' . BASE_URL . "assets/php/admin/portfolio/portfolio-index.php");
			}
		}
	}
} 

// Опублікувати або видалити статус із публікації
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('cards', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'assets/php/admin/portfolio/portfolio-index.php');
    exit();
}

// Опублікувати все
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_all_ids'])){
    $id = $_GET['pub_all_ids'];
    $publish = $_GET['publish'];

    $postId = update('cards', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'assets/php/admin/portfolio/portfolio-index.php');
    exit();
}

// Видалення картки
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_card'])){
    $id = $_GET['delete_card'];
    delete('cards', $id);
    delete('cards_images', $id);
    header('location: ' . BASE_URL . 'assets/php/admin/portfolio/portfolio-index.php');
}

?>

