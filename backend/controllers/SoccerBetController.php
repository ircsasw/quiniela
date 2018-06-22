<?php

namespace backend\controllers;

use Yii;
use frontend\models\SoccerBet;
use frontend\models\search\SoccerBetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Bet;
use frontend\models\search\BetSearch;
use backend\models\Matches;
use yii\helpers\Json;

/**
 * SoccerBetController implements the CRUD actions for SoccerBet model.
 */
class SoccerBetController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SoccerBet models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SoccerBetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SoccerBet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new BetSearch();
        $searchModel->soccer_bet_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //Editable column
        if (Yii::$app->request->post('hasEditable')) {
            $betId = Yii::$app->request->post('editableKey');
            $model = Bet::findOne($betId);

            $out = Json::encode(['output'=>'', 'message'=>'']);

            $posted = current($_POST['Bet']);
            $post = ['Bet' => $posted];

            if ($model->load($post)) {
                $model->save();

                $output = '';

                $out = Json::encode(['output'=>$output, 'message'=>'']);
            }

            echo $out;
            return;
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new SoccerBet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $transaction = \Yii::$app->db->BeginTransaction();
        try {
            $model = new SoccerBet();
            $model->date = date('Y-m-d');
            $model->user_id = Yii::$app->user->identity->id;

            if ($flag = $model->save()) {
                $matches = Matches::find()->where('id < 49')->all();

                foreach ($matches as $match) {
                    $bet = new Bet();
                    $bet->soccer_bet_id = $model->id;
                    $bet->match_id = $match->id;
                    $bet->score_a = 0;
                    $bet->score_b = 0;
                    $bet->points = 0;
                    if (!($flag = $bet->save())) {
                        break;
                    }
                }
            }

            if ($flag) {
                $transaction->commit();

                return $this->redirect(['view', 'id'=>$model->id]);
            } else {
                $transaction->rollBack();

                \Yii::$app->session->setFlash('error', 'Error al crear la quiniela.');
                //var_dump("error");die();
                return $this->redirect(['site/index']);
            }
        } catch (Exception $e) {
            $transaction->rollBack();
        }

    }*/

    /**
     * Updates an existing SoccerBet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /**
     * Deletes an existing SoccerBet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Bet::deleteAll('soccer_bet_id='.$id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the SoccerBet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SoccerBet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SoccerBet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
