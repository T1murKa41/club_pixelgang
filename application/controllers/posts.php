<?php
    include_once '../../application/database/db.php';

    $errormsg = [];
    $id = '';
    $title = '';
    $content = '';
    $topic = '';

    $topics = allSelect('categories');
    $posts = allSelect('posts');
    $postAdmin = allSelectPostUsers('posts', 'users');

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['add_post'])) {
        if (!empty($_FILES['path_img']['name'])) {
            $imgname = time() . "-" . $_FILES['path_img']['name'];
            $tmpfile = $_FILES['path_img']['tmp_name'];
            $filetype = $_FILES['path_img']['type'];
            $path = $ROOT_PATH . "\images\posts\\" . $imgname;

            if (strpos($filetype, 'image') === false) {
                array_push($errormsg, 'Можно загружать только изображения');
            }

            $result = move_uploaded_file($tmpfile, $path);

            if ($result) {
                $_POST["path_img"] = $imgname;
            } else {
                array_push($errormsg, "Загрузка на сервер провалилась");
            }
        } else {
            array_push($errormsg, "Ошибка получения картинки");
        }
        
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $topic = trim($_POST['topic']);

        $publish = isset($_POST['publish']) ? 1 : 0;

        if ($title === '' || $content === '' || $topic === '') {
            array_push($errormsg, "Не все поля заполнены");
        } elseif (mb_strlen($title, $encoding = 'UTF8') < 5) {
            array_push($errormsg, "Название поста очень короткое");
        } else {
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'path_img' => $_POST['path_img'],
                'published' => $publish,
                'id_topic' => $topic
            ];
            
            $post = insert('posts', $post);
            $topic = oneSelect('posts', ['id' => $id]);
            header('location: ' . $BASE_URL . 'admin/posts/index.php');
        }
    } else {
        $id = '';
        $title = '';
        $content = '';
        $publish = '';
        $topic = '';
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $post = oneSelect('posts', ['id' => $id]);

        $title = $post['title'];
        $content = $post['content'];
        $topic = $post['id_topic'];
        $publish = $post['published'];
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit_post'])) {
        $id = $_POST['id'];
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $topic = trim($_POST['topic']);

        $publish = isset($_POST['publish']) ? 1 : 0;

        if (!empty($_FILES['path_img']['name'])) {
            $imgname = time() . "-" . $_FILES['path_img']['name'];
            $tmpfile = $_FILES['path_img']['tmp_name'];
            $filetype = $_FILES['path_img']['type'];
            $path = $ROOT_PATH . "\images\posts\\" . $imgname;

            if (strpos($filetype, 'image') === false) {
                array_push($errormsg, 'Можно загружать только изображения');
            }

            $result = move_uploaded_file($tmpfile, $path);

            if ($result) {
                $_POST["path_img"] = $imgname;
            } else {
                array_push($errormsg, "Загрузка на сервер провалилась");
            }
        } else {
            array_push($errormsg, "Ошибка получения картинки");
        }

        if ($title === '' || $content === '' || $topic === '') {
            array_push($errormsg, "Не все поля заполнены");
        } elseif (mb_strlen($title, $encoding = 'UTF8') < 5) {
            array_push($errormsg, "Название очень короткое");
        } else {
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'path_img' => $_POST['path_img'],
                'published' => $publish,
                'id_topic' => $topic
            ];
            
            $post_update = update('posts', $id, $post);
            header('location: ' . $BASE_URL . 'admin/posts/index.php');
        }
    } else {
        $title = '';
        $content = '';
        $publish = isset($_POST['publish']) ? 1 : 0;
        $topic = '';
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        delete('posts', $id);

        header('location: ' . $BASE_URL . 'admin/posts/index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['pub_id'])) {
        $id = $_GET['pub_id'];
        $publish = $_GET['publish'];

        $post_update = update('posts', $id, ['published' => $publish]);

        header('location: ' . $BASE_URL . 'admin/posts/index.php');
        exit();
    }
?>