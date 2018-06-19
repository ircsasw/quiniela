<?php

namespace frontend\controllers;

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
use kartik\mpdf\Pdf;
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
     * Lists User SoccerBet models.
     * @return mixed
     */
    public function actionMybets()
    {
        $searchModel = new SoccerBetSearch();
        $searchModel->user_id = Yii::$app->user->identity->id;  // sólo las quinielas de usuario logeado
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('mybets', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
            } else {
                $transaction->rollBack();

                \Yii::$app->session->setFlash('error', 'Error al crear la quiniela.');
                //var_dump("error");die();
                return $this->redirect(['site/index']);
            }
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

  public function actionBetPdf($id)
    {
        $model = $this->findModel($id); // Quotes

        $content = $this->renderPartial('_report', [
            'model' => $model,
        ]);

        $pdf = Yii::$app->pdf;
        // TODO: usar file_get_contents para cargar el css para cssInLine
        $pdf->cssInline = "
    .invoice-box {
        margin: auto;
        border: 1px solid #eee;
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2), .invoice-box table tr td:nth-child(3), .invoice-box table tr td:nth-child(4) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(3), .invoice-box table tr.total td:nth-child(4) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
        ";
        $pdf->methods = [
            'setHeader' => null,
            'setFooter' => ['| &copy; IRCSA Software | {PAGENO}']
        ];
        $pdf->content = $content;

        return $pdf->render();
    }
}
