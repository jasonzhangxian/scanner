<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use common\components\topsdk\taobao;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','test'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionTest()
    {
        echo "<pre>";

        $client = new Taobao();

        // $client->format = 'json';
        // $client->appkey = "21406887";
        // $client->setSecret("baf2e6762c10bfac37ebfc26eb8c08c1");
        // $client->setSession('6202127eeb358f090ddc61aa0bda876e498ZZ57194b4861113462038');

        $client->setRequest('WlbOrderitemPageGetRequest', array('appkey'=>'21406887', 'secret'=>'baf2e6762c10bfac37ebfc26eb8c08c1', 'orderCode' => 'LBX032038345982457'));

        print_r($client->getData('6202127eeb358f090ddc61aa0bda876e498ZZ57194b4861113462038'));
    }
}
