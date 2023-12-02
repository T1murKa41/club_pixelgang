<?php
    include_once '../../application/database/db.php';

    $errormsg = [];
    $id = '';
    $name = '';
    $notice = '';

    $topics = allSelect('categories');

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['topics-create'])) {
        $name = trim($_POST['name']);
        $notice = trim($_POST['notice']);

        if ($name === '' || $notice === '') {
            array_push($errormsg, "Не все поля заполнены");
        } elseif (mb_strlen($name, $encoding = 'UTF8') < 2) {
            array_push($errormsg, "Название категории очень короткое");
        } else {
            $check = oneSelect('categories', ['name' => $name]);
            if (!empty($check['name']) && $check['name'] === $name) {
                array_push($errormsg, "Категория с таким названием уже существует");
            } else {
                $topic = [
                    'name' => $name,
                    'notice' => $notice,
                ];
                
                $id = insert('categories', $topic);
                $topic = oneSelect('categories', ['id' => $id]);

                header('location: ' . $BASE_URL . 'admin/topics/index.php');
            }
        }
    } else {
        $name = '';
        $notice = '';
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $topic = oneSelect('categories', ['id' => $id]);
        $name = $topic['name'];
        $notice = $topic['notice'];
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['topics-edit'])) {
        $name = trim($_POST['name']);
        $notice = trim($_POST['notice']);

        if ($name === '' || $notice === '') {
            array_push($errormsg, "Не все поля заполнены");
        } elseif (mb_strlen($name, $encoding = 'UTF8') < 2) {
            array_push($errormsg, "Название категории очень короткое");
        } else {
            $topic = [
                'name' => $name,
                'notice' => $notice,
            ];
            
            $id = $_POST['id'];
            $topic_update = update('categories', $id, $topic);
            header('location: ' . $BASE_URL . 'admin/topics/index.php');
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        delete('categories', $id);

        header('location: ' . $BASE_URL . 'admin/topics/index.php');
    }
?>