<?php

/** @var yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $links */

use common\models\ActiveRecords\Link;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php
echo GridView::widget([
    'dataProvider' => $links,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'url',
        [
            'attribute' => 'short_code',
            'format' => 'raw',
            'value' => function(Link $link) {
                $fullLink = Url::base(true) . '/' . $link->short_code;
                return Html::a($fullLink, $fullLink, ['target' => '_blank']);
            }
        ],
        'created_at',
    ],
]);
?>
<div class="site-index">
    <?= \yii\helpers\Html::a('Добавить ссылку', [Url::toRoute('link/create')], ['class' => 'btn btn-success']) ?>
</div>
