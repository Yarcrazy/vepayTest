<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
    <?= Html::a('Create Payment', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['attribute' => 'created_at',
				'label' => 'Дата, время',
				'format' => 'datetime',
        'footer' => 'Итого:'],
      ['attribute' => 'user.fio',
        'label' => 'Пользователь',],
      ['class' => 'app\components\NumberColumn',
      	'attribute' => 'sum',
        'label' => 'Сумма',],

      ['class' => 'yii\grid\ActionColumn',
				'header' => 'Действие',
        'template' => '{cancel}',
        'buttons' =>
          [
            'cancel' => function ($url, $model, $key) {
              $icon = \yii\bootstrap\Html::icon('minus');
              return Html::a($icon, ['payment/delete', 'id' => $model->id]);
            }
          ],
			],
    ],
    'showFooter' => true,
  ]); ?>

  <?php Pjax::end(); ?>

</div>
