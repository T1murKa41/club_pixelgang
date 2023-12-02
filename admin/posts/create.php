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

            <?php include_once '../../application/include/sidebar-admin-posts.php' ?>

            <div class="posts col-10">
                <div class="row">
                    <h2>Добавление нового поста</h2>
                </div>
                <div class="row add-post">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <?php include_once '../../application/include/errorinfo.php'; ?>
                        <div class="form-floating ">
                            <input name="title" type="text" class="form-control" id="floatingInput" placeholder="Заголовок" value="<?= $title ?>">
                            <label for="floatingInput">Заголовок</label>
                        </div>

                        <div class="form-floating">
                            <textarea name="content" class="form-control" placeholder="Текст" id="editor"><?= $content ?></textarea>
                        </div>
                        <br>

                        <div class="input-group">
                            <input name="path_img" type="file" class="form-control" id="inputGroupFile">
                            <label class="input-group-text" for="inputGroupFile">Загрузка</label>
                        </div>

                        <select name="topic" class="form-select" aria-label="Пример выбора по умолчанию">
                            <option selected>Выберите категорию...</option>
                            <?php foreach ($topics as $key => $topic) : ?>
                                <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="form-check">
                            <input name="publish" class="form-check-input" type="checkbox" value="1" id="defaultCheck">
                            <label class="form-check-label" for="defaultCheck">
                                Подтверждение публикации
                            </label>
                        </div>

                        <div class="col-auto">
                            <button name="add_post" type="submit" class="btn btn-outline-info">Опубликовать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../../application/include/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="../../script/script.js"></script>
</body>

</html>