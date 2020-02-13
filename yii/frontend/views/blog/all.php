<?php

/* @var $this yii\web\View */

$this->title = 'My Blog';
?>
<div class="body-content">

<?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_one',
    ]);
?>

</div>