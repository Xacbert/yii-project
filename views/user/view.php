
<?php

    use yii\helpers\Html;


    $this->title = 'View';
?>

<h1>Usuarios</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li>
            <?= $user->user ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= Html::a('Logut', ['/user/logout']) ?>