<?php

namespace backend\controllers;

use Yii;
use backend\models\Matches; ///Incluyo el archivo del modelo
use backend\models\MatchesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Bet;

/**
 * MatchesController implements the CRUD actions for Matches model.
 */
class MatchesController extends Controller
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
     * Lists all Matches models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MatchesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Matches model.
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
     * Creates a new Matches model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Matches();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Matches model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            // SELECT * FROM bet WHERE "match_id" = $id;
            $bets = Bet::find()
            ->where(['match_id' => $id])
            ->all();

            $transaction = \Yii::$app->db->beginTransaction();
            try {
                foreach ($bets as $bet) {
                    $bet->points = 0;
                    if (($model->score_a == $bet->score_a) && ($model->score_b == $bet->score_b)) {
                        $bet->points = 5;
                    } else {
                        if ( (($model->score_a > $model->score_b) && ($bet->score_a > $bet->score_b)) ||
                             (($model->score_b > $model->score_a) && ($bet->score_b > $bet->score_a)) ||
                             (($model->score_a == $model->score_b) && ($bet->score_a == $bet->score_b)) ){
                            $bet->points = 3;
                        }
                    }
                    if (!($flag = $bet->save())) break;
                }

                if ($model->save() && $flag) {
                    $transaction->commit();

                    // correr el update
                    $totalPoints = Yii::$app->db->createCommand('
                        UPDATE soccer_bet AS sb SET sb.total_points = (
                        SELECT SUM(b.points) FROM bet AS b WHERE b.soccer_bet_id = sb.id)
                    ')->execute();

                    return $this->redirect(['index']);
                } else {
                    $transaction->rollBack();
                    print_r($model->getErrors());
                }
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Matches model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matches model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Matches the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Matches::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
