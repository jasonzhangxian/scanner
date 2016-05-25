<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\OauthTaobao;
use app\models\Shop;
use yii\data\ActiveDataProvider;
use frontend\models\SignupForm;
use common\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OauthController implements the CRUD actions for OauthTaobao model.
 */
class OauthController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['authorize'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * 淘宝SessionKey获取与保存
     * 支持子账号授权
     */
    public function actionAuthorize()
    {
        $request = Yii::$app->request;
        $session = Yii::$app->session;
        $this->layout = FALSE;

        $code = $request->get('code'); 
        $state = $request->get('state'); 

        $client_id = '23362009';
        $client_secret = 'd059876cd9320cfc054c885eefac3e2b';
        $grant_type = 'authorization_code';
        $redirect_uri = 'http://scanner.local.com/backend/web/oauth/authorize';
        $url = 'https://oauth.taobao.com/token';
        if(!empty($code)){
            //一些判断
            if($state != $session->get('authorize_state'))
            {
                exit('参数错误');
            }
            //下面用curl模拟post提交 获取授权token
            $post_data = array('client_id='.$client_id,'client_secret='.$client_secret,'code='.$code,'grant_type='.$grant_type,'redirect_uri='.$redirect_uri);
            $post_data = implode('&',$post_data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            ob_start();
            curl_exec($ch);
            $response = ob_get_contents() ;
            ob_end_clean();
            curl_close($ch);
            $response = json_decode($response, TRUE);
            if(isset($response['error']))
            {
                //创建随机state
                $state = mt_rand(100000,999999);
                $session->set('authorize_state', $state);
                $link = "https://oauth.taobao.com/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&state=$state&view=web";
                return $this->render('authorize', [
                    'text' => '重新授权',
                    'link' => $link,
                    'error_description' => $response['error_description'],
                    'title' => '授权失败'
                ]);
            }
            else
            {
                //存储token
                $oauth = new OauthTaobao;
                $response['appkey'] = $client_id;
                $response = array_map('urldecode', $response);
                if( $oauth->load(array('OauthTaobao'=>$response)) && $oauth->save())
                {
                    //更新店铺
                    $shop = Shop::find()->where(['taobao_user_id' => $response['taobao_user_id']])->one();
                    if($shop === null)
                    {
                        $new_shop = new Shop;
                        $new_shop->loadDefaultValues();
                        $new_shop->taobao_user_id = $response['taobao_user_id'];
                        $new_shop->taobao_user_nick = $response['taobao_user_nick'];
                        $new_shop->save();
                        echo "done";
                    }
                    else
                    {
                        echo "";
                    }
                    //执行登录
                    //判读是否设置了用户，否->创建用户，是->执行登录
                    $model = new LoginForm();
                    $login_data = ['LoginForm'=>
                                    [
                                        'username' => $response['taobao_user_nick'],
                                        'password' => $response['taobao_user_id']
                                    ]
                                    ];
                    if ($model->load($login_data) && $model->login()) {
                        return $this->goHome();
                    } else {
                        $model = new SignupForm();
                        $signup_data = ['SignupForm'=>
                                        [
                                            'username' => $response['taobao_user_nick'],
                                            'email' => $response['taobao_user_id'].'@taobao.com',
                                            'password' => $response['taobao_user_id']
                                        ]
                                        ];
                        if ($model->load($signup_data)) {
                            if ($user = $model->signup()) {
                                if (Yii::$app->getUser()->login($user)) {
                                    return $this->goHome();
                                }
                            }
                        }
                    }
                        
                }
                else
                {

                }
            }
        }
        else
        {
            //创建随机state
            $state = mt_rand(100000,999999);
            $session->set('authorize_state', $state);
            $link = "https://oauth.taobao.com/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&state=$state&view=web";
            //echo "<a href='$link'>点击进行授权操作</a>";
            return $this->render('authorize', [
                'text' => '点击进行授权操作',
                'link' => $link,
            ]);
        }
    }
    /**
     * Lists all OauthTaobao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OauthTaobao::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OauthTaobao model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OauthTaobao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OauthTaobao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OauthTaobao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing OauthTaobao model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OauthTaobao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OauthTaobao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OauthTaobao::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
