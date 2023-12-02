<?php
    include_once '../../application/database/db.php';

    $commentsForAdm = allSelect('comments');

    $page = $_GET['post'];

    $email = '';
    $comment = '';
    $errormsg = [];
    $status = 0;
    $comments = [];

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['clickComment'])) {     
        $email = trim($_POST['email']);
        $comment = trim($_POST['comment']);

        if ($email === '' || $comment === '') {
            array_push($errormsg, "Не все поля заполнены");
        } elseif (mb_strlen($comment, $encoding = 'UTF8') < 1) {
            array_push($errormsg, "Комментарий очень короткое");
        } else {

            $user = oneSelect('users', ['email' => $email]);
            if ($user['email'] == $email) {
                $status = 1;
            }

            $comment = [
                'status' => $status,
                'page' => $page,
                'email' => $email,
                'comment' => $comment
            ];
            
            $comment = insert('comments', $comment);
            $comments = allSelect('comments', ['page' => $page, 'status' => 1]);
        }
    } else {
        $email = '';
        $comment = '';
        $comments = allSelect('comments', ['page' => $page, 'status' => 1]);
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        delete('comments', $id);

        header('location: ' . $BASE_URL . 'admin/comments/index.php');
    }

    if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['pub_id'])) {
        $id = $_GET['pub_id'];
        $publish = $_GET['publish'];

        $post_update = update('comments', $id, ['status' => $publish]);

        header('location: ' . $BASE_URL . 'admin/comments/index.php');
        exit();
    }
?>