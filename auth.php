<?php 
    include_once 'path.php'; 
    include_once 'application/controllers/users.php';
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/auth.css">
</head>

<body>
    <div class="container form">
        <form method="post" action="auth.php" class="reg">
            <h3 class="text-center">Авторизация</h3>    
            <?php include_once 'application/include/errorinfo.php';?>

            <div class="mb-3">
                <label for="formEmail" class="form-label">Адрес электронной почты</label>
                <input name="email" type="email" class="form-control" id="formEmail" placeholder="Введите почту" aria-describedby="emailHelp" value="<?=$email?>">
            </div>
    
            <div class="mb-3">
              <label for="formPassword" class="form-label">Пароль</label>
              <input name="password" type="password" class="form-control" id="formPassword" placeholder="Введите пароль">
            </div>

            <div class="controls">
                <button name="button-log" type="submit" class="btn btn-info">Войти</button>
                <a href="registration.php" class="btn btn-outline-info">Зарегистрироваться</a>
                <span class="form-text-auth">Если еще не зарегистрированы</span>
            </div> 
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
</body>

</html>