<?php
    include_once 'application/controllers/comment.php';
?>


<div class="col comment">
    <h4>Написать комментарий</h4>

    <form action="<?=$BASE_URL . 'one.php?post=' . $page;?>" method="post">
        <input type="hidden" name="page" value="<?=$page;?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Почта</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="col">
            <button type="submit" name="clickComment" class="btn btn-outline-info">Отправить комментарий</button>
        </div>
    </form>

    <?php if (count($comments) > 0): ?>
        <h5>Комментарии к публикации</h5>
        <?php foreach ($comments as $comment): ?>
            <div class="col-12 one-comment">
                <strong><?=$comment['email']?></strong>
                <span><?=$comment['created']?></span>

                <div class="col-12 text">
                    <?=$comment['comment']?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>