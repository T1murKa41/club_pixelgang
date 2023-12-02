<?php 
    include_once 'path.php'; 
    include_once 'application/controllers/users.php';
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
        <form method="post" action="registration.php" class="reg">
            <h3 class="text-center">Регистрация</h3>
            <?php include_once 'application/include/errorinfo.php';?>
            
            <div class="mb-3">
                <label for="formLogin" class="form-label">Логин</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">#</span>
                    <input name="login" type="text" class="form-control" id="formLogin" placeholder="Введите логин" value=<?=$login?>>
                </div>
            </div>
    
            <div class="mb-3">
                <label for="formEmail" class="form-label">Адрес электронной почты</label>
                <input name="email" type="email" class="form-control" id="formEmail" placeholder="Введите почту" aria-describedby="emailHelp" value=<?=$email?>>
                <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
            </div>
    
            <div class="mb-3">
                <label for="formAge" class="form-label">Возраст</label>
                <input name="age" type="text" class="form-control" id="formAge" placeholder="Введите ваш возраст" value=<?=$age?>>
            </div>
    
            <div class="mb-3">
              <label for="formPassword" class="form-label">Пароль</label>
              <input name="pass-first" type="password" class="form-control" id="formPassword">
            </div>
    
            <div class="mb-3">
                <label for="formPassword2" class="form-label">Повторите пароль</label>
                <input name="pass-second" type="password" class="form-control" id="formPassword2">
            </div>
    
            <div class="controls">
                <button name="button-reg" type="submit" class="btn btn-info">Регистрация</button>
                <a href="auth.php" class="btn btn-outline-info">Авторизоваться</a>
                <span class="form-text-auth">Если уже регистрировались</span>
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