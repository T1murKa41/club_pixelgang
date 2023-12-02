<?php 
    include_once 'path.php'; 
    include_once 'application/controllers/users.php';
    error_reporting(0);
    include_once 'application/controllers/topics.php';

    $posts = allSelect('posts', ['id_topic' => $_GET['id'], 'published' => '1']);
    $categories = oneSelect('categories', ['id' => $_GET['id']]);
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include_once 'application/include/header.php'; ?>

    <!-- Средний блок главной страницы -->
    <div class="container">
        <div class="row content">
            <div class="col-md-8 col-12 main-content">
                <h3>Раздел <?=$categories['name'];?></h3>

                <?php foreach($posts as $post): ?>

                    <div class="card news">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?=$BASE_URL . 'images/posts/' . $post['path_img']?>" class="img-fluid rounded-start" alt="<?=$post['title']?>">
                            </div>
                            <div class="col-md-8">
                                <div class="text card-body">
                                    <h5 class="card-title"><a href="<?=$BASE_URL . 'one.php?post=' . $post['id'];?>">
                                        <?=substr($post['title'], 0, 20) . '...';?>
                                    </a></h5>
                                    <small class="card-text text-muted"><span
                                            class="las la-user-circle"></span><?=$post['name'];?></small>
                                    <small class="card-text text-muted"><span
                                            class="las la-calendar-week"></span><?=$post['created'];?></small>

                                    <p class="introduction card-text"><?=substr($post['content'], 0, 170) . '...';?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <!-- Боковая информация -->
            <div class="sidebar col-md-4 col-12">
                <div class="search">
                    <h3>Исследование материалов</h3>
                    <form action="" method="post">
                        <input type="text" name="search-term" class="text-input"
                            placeholder="Введите пост, который вас интересует">
                    </form>
                </div>
                <div class="top">
                    <h3>Разделы</h3>
                    <ul>
                        <?php foreach ($topics as $key => $topic): ?>
                            <li><a href="<?=$BASE_URL . 'category.php?id=' . $topic['id'];?>" class="btn btn-outline-info"><?=$topic['name']?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Конец среднего блока -->

    <?php include_once 'application/include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>
</body>

</html>