
<div class="col-lg-12">
<h2><?= $model->title ?> <span class="badge"><?= $model->author->username ?></span></h2>

<p><?= $model->text ?></p>
    <?= \yii\helpers\Html::a('Подробнее', ['blog/one', 'url' => $model->url], ['class' => 'btn btn-success']);  ?>
</div>