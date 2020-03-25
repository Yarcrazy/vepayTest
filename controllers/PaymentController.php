<?php

namespace app\controllers;

use app\models\User;
use phpDocumentor\Reflection\Types\Object_;
use Yii;
use app\models\Payment;
use app\models\PaymentSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'delete' => ['POST'],
        ],
      ],
    ];
  }

  /**
   * Lists all Payment models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new PaymentSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Payment model.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new Payment model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $model = new Payment();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('create', [
      'model' => $model,
    ]);
  }

  public function actionPay()
  {
    $model = new Payment();
    Yii::$app->response->format = Response::FORMAT_JSON;
    if (Yii::$app->request->isAjax) {
      $user_id = $_POST['Payment']['user_id'];

      if ($user_id !== '') {
        if (is_null(User::findOne($user_id))) {
          $user_id = !is_null(User::findOne(['phone' => $user_id]))
            ? User::findOne(['phone' => $user_id])->id
            : $user_id;
        }
      }

      $model->load(Yii::$app->request->post());
      $model->user_id = $user_id;

      if ($model->validate()) {
        if (!$model->user->active) {
          return 'Пользователь заблокирован!';
        }
        $model->save();
        $user = User::findOne($user_id);
        $user->balance = $user->balance + $model->sum;
        $user->save();
        return 'Платеж совершен!';
      } else {
        return $model->getErrors();
      }
    }
    return 'Платеж не совершен!';
  }


  /**
   * Updates an existing Payment model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public
  function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    }

    return $this->render('update', [
      'model' => $model,
    ]);
  }

  /**
   * Deletes an existing Payment model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param integer $id
   * @return mixed
   * @throws NotFoundHttpException if the model cannot be found
   */
  public
  function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the Payment model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id
   * @return Payment the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected
  function findModel($id)
  {
    if (($model = Payment::findOne($id)) !== null) {
      return $model;
    }

    throw new NotFoundHttpException('The requested page does not exist.');
  }
}
