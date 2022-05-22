<?php 
include SITE_ROOT . "/db.php";

$errMsg = [];
$name = '';

$tmp_path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/tmp/';
$path = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

$cards = selectAll('cards');


// Створення публікації
if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['add-card'])) {
    $status = 0;
	$name = trim($_POST['card-name']);
    $post = [
        'status' => $status,
        'cardname' => $name
    ];
    $id_card = insert('cards', $post);
    $portfolio = selectOne('cards', ['id' => $id_card] );

	// Збереження зображень у базі даних та перенесення в постійну папку.
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
				
				// Передача оригінального файлу
				rename($tmp_path . $filename, $path . $filename);
				
				// Передача попереднього перегляду
				$file_name = pathinfo($filename, PATHINFO_FILENAME);				
				$file_ext = pathinfo($filename, PATHINFO_EXTENSION);
				$thumb = $file_name . '-thumb.' . $file_ext;
				rename($tmp_path . $thumb, $path . $thumb);
                
                header('location: ' . BASE_URL . "assets/php/admin/portfolio/portfolio-index.php?page=1");
			}
		}
	}
} 

// Опублікувати або видалити статус із публікації
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('cards', $id, ['status' => $publish]);

    header('location: ' . BASE_URL . 'assets/php/admin/portfolio/portfolio-index.php?page=1');
    exit();
}

// Видалення публікації
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_card'])){
    $id = $_GET['delete_card'];
    delete('cards', $id);
    delete('cards_images', $id);
    header('location: ' . BASE_URL . 'assets/php/admin/portfolio/portfolio-index.php?page=1');
}

?>

