<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SoccerBet;
use frontend\models\search\SoccerBetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Bet;
use frontend\models\search\BetSearch;
use backend\models\Matches;

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
        $searchModel->user_id = Yii::$app->user->identity->id;  // sólo las quinielas de usuario logeado
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
    public function actionCreate()
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
            } else
                var_dump("error");die();
        } catch (Exception $e) {
            $transaction->rollBack();
        }

    }

    /**
     * Updates an existing SoccerBet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
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
