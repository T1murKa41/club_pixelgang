<?php
    // session_start();
    include_once '../../path.php';
    include_once '../../application/controllers/posts.php';
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <?php include_once '../../application/include/header_admin.php'; ?>

    <div class="container">
        <div class="row">
            <?php include_once '../../application/include/sidebar-admin-posts.php'?>
    
            <div class="posts col-10">
                <div class="row">
                    <h2>Панель управления постами</h2>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="id">#</th>
                                <th scope="col" class="article">Название статьи</th>
                                <th scope="col" class="author">Автор статьи</th>
                                <th scope="col" class="edit">Редактировать</th>
                                <th scope="col" class="delete">Удалить</th>
                                <th scope="col" class="delete">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($postAdmin as $key => $post): ?>
                                <tr>
                                    <th scope="row"><?=$key+1;?></th>
                                    <td><?=$post['title'];?></td>
                                    <td><?=$post['name'];?></td>
                                    <td><a href="edit.php?id=<?=$post['id'];?>">Редактировать</a></td>
                                    <td><a href="edit.php?delete_id=<?=$post['id'];?>">Удалить</a></td>
                                    <?php if ($post['published']): ?>
                                        <td class="delete"><a href="edit.php?publish=0&pub_id=<?=$post['id'];?>">Убрать публикацию</a></td>
                                    <?php else: ?>
                                        <td class="delete"><a href="edit.php?publish=1&pub_id=<?=$post['id'];?>">Опубликовать</a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../../application/include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>