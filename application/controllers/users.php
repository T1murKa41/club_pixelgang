<?php
    include_once 'application/database/db.php';

    $errormsg = [];

    function userAuth($user)
    {
        global $BASE_URL;

        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['name'];
        $_SESSION['admin'] = $user['admin'];

        if ($_SESSION['admin']) {
            header('location: ' . $BASE_URL . 'admin/posts/index.php');
        } else {
            header('location: ' . $BASE_URL);
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['button-reg'])) {
        $login = trim($_POST['login']);
        $email = trim($_POST['email']);
        $age = trim($_POST['age']);
        $passF = trim($_POST['pass-first']);
        $passS = trim($_POST['pass-second']);
        $admin = 0;

        if ($login === '' || $email === '' || $passF === '') {
            array_push($errormsg, "Не все поля заполнены");
        } elseif (mb_strlen($login, $encoding = 'UTF8') < 2) {
            array_push($errormsg, "Логин очень короткий");
        } elseif ($passF !== $passS) {
            array_push($errormsg, "Пароли не совпадают");
        } else {
            $check = oneSelect('users', ['email' => $email]);
            if (!empty($check['email']) && $check['email'] === $email) {
                array_push($errormsg, "Пользователь с такой почтой уже существует");
            } else {
                $pass = password_hash($passF, PASSWORD_DEFAULT);
                if (!empty($age)) {
                    $post = [
                        'admin' => $admin,
                        'name' => $login,
                        'email' => $email,
                        'age' => $age,
                        'password' => $pass
                    ];
                } else {
                    $post = [
                        'admin' => $admin,
                        'name' => $login,
                        'email' => $email,
                        'password' => $pass
                    ];
                }

                $id = insert('users', $post);
                $user = oneSelect('users', ['id' => $id]);

                userAuth($user);
            }
        }
    } else {
        $login = '';
        $email = '';
        $age = '';
    }

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['button-log'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if ($email === '' || $password === '') {
            array_push($errormsg, "Не все поля заполнены");
        } else {
            $check = oneSelect('users', ['email' => $email]);
            if ($check && password_verify($password, $check['password'])) {
                userAuth($check);
            } else {
                array_push($errormsg, "Почта или пароль введены неверно");
            }
        }
    } else {
        $email = '';
    }
?>