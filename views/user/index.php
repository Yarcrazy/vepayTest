<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
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

      <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'action' => ['user/register']
      ]); ?>

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
      'balance',
      'active:boolean',

      ['class' => 'yii\grid\ActionColumn'],
    ],
  ]); ?>

  <?php Pjax::end(); ?>

</div>
