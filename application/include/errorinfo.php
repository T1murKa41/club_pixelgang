<?php if (count($errormsg) > 0): ?>
    <?php foreach ($errormsg as $error): ?>
        <li><?=$error?></li>
    <?php endforeach; ?>
<?php endif; ?>