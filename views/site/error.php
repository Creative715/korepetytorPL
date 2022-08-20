<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;


$this->title = 'Nie znaleziono (#404)';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-error container" style="height: 800px">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    <p>
        Takiej stronicy nie istnieje, albo nie macie dosyć praw dla jej przeglądu.
    </p>
    <p>
        <a href="<?=  yii\helpers\Url::to(['site/profile'])?>">Przejdźcie autoryzację</a>, albo wróćcie na <a href="<?=  yii\helpers\Url::to(['/'])?>">główną</a> stronicę.
    </p>

</div>
