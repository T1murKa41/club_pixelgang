<link rel="stylesheet" href="css/header.css">

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h1 class="title">Клуб Pixelguys</h1>
            </div>

            <nav class="col-7">
                <ul>
                    <li><a href="<?php echo $BASE_URL ?>" class="btn btn-outline-info"><span class="las la-home"></span>Домой</a></li>
                    <li><a href="<?php echo $BASE_URL . 'info.php' ?>" class="btn btn-outline-info"><span class="las la-newspaper"></span>Информация</a></li>
                    <li>
                        <?php if (isset($_SESSION['id'])) : ?>

                            <a href="#" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown">
                                <span class="las la-user-tie"></span><?php echo $_SESSION['login'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($_SESSION['admin']) : ?>

                                    <li><a class="dropdown-item" href="<?php echo $BASE_URL . 'admin/posts/index.php'?>">Главная страница</a></li>

                                <?php endif; ?>
                                <li><a class="dropdown-item" href="<?php echo $BASE_URL . 'logout.php' ?>">Выход</a></li>
                            </ul>

                        <?php else : ?>

                            <a href="<?php echo $BASE_URL . 'registration.php' ?>" class="btn btn-outline-info">
                                <span class="las la-user-tie"></span>Зарегистрироваться
                            </a>

                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>