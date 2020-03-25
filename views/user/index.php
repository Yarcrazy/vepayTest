<?php

use app\assets\UserAsset;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model \app\models\User */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
UserAsset::register($this);
?>
<div class="user-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
    <?php
    Modal::begin([
      'size' => 'modal-lg',
      'header' => '<h2>Регистрация</h2>',
      'toggleButton' => [
        'label' => 'Зарегистрировать',
        'class' => 'btn btn-success',
      ],
    ])
    ?>
	<div id="modal-body">
		<div class="user-form">

      <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

			<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
			</div>

      <?php ActiveForm::end(); ?>

		</div>
	</div>
  <?php Modal::end(); ?>
	</p>


  <?php Pjax::begin(); ?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],

      'phone',
      'fio',
      [
      	'attribute' => 'balance',
//        'format' => 'html',
//        'value' => function ($model, $key, $index, $column) {
//          return Html::tag('span', $model->balance, [
//            'class' => 'td-balance-'.$model->id,
//          ]);
//        }
      ],

      ['label' => 'Status',
        'attribute' => 'active',
        'format' => 'raw',
        'value' => function ($model, $key, $index, $column) {
          return Html::button($model->active ? 'активен' : 'заблокирован', [
            'data-active' => $model->active,
            'data-id' => $model->id,
            'class' => 'btn btn-primary status-button',
          ]);
        }
      ],

    ],
  ]); ?>

  <?php Pjax::end(); ?>

	<p>
    <?php
    Modal::begin([
      'size' => 'modal-lg',
      'header' => '<h2>Пополнить баланс</h2>',
      'toggleButton' => [
        'label' => 'Пополнить баланс',
        'class' => 'btn btn-success',
      ],
    ])
    ?>
	<div class="payment-form">

		<form method="post" id="ajax_form" action="">
			<input type="text" class="form-control" name="Payment[sum]" placeholder="Введите сумму"/><br>
			<input type="text" class="form-control" name="Payment[user_id]"
						 placeholder="Введите идентификатор пользователя или телефон"
			/><br>
			<button type="submit" class="btn btn-success" id="submit_btn">Пополнить</button>
			<div id="form_result"></div>
		</form>

	</div>
  <?php Modal::end(); ?>
	</p>

</div>
