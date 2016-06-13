<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Shop;
use app\models\OauthTaobao;
use app\models\Items;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\topsdk\taobao;

/**
 * ItemController implements the CRUD actions for Items model.
 */
class ItemController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['sync'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * 同步淘宝商品
     * 支持子账号授权
     */
    public function actionSync()
    {
        //先找到当前用户对应的店铺
        $shop = Shop::find()->where(['taobao_user_nick'=>Yii::$app->user->identity->username])->one();
        echo "<pre>";
        if($shop)
        {
            //找到当前店铺的最新授权信息
            $oauth = OauthTaobao::find()->where(['taobao_user_id' => $shop->taobao_user_id])->orderBy('id desc')->one();
            if($oauth)
            {
                $client = new Taobao;
                $client->format = 'xml';
                $client->appkey = "23362009";
                $client->setSecret("d059876cd9320cfc054c885eefac3e2b");
                $client->setSession($oauth->access_token);

                $client->setRequest('ItemsOnsaleGetRequest');
                $client->setFields(' approve_status,num_iid,title,nick,type,cid,pic_url,num,props,valid_thru,list_time,price,has_discount,has_invoice,has_warranty,has_showcase,modified,delist_time,postage_id,seller_cids,outer_id,sold_quantity');
                $page_no = 1;
                $page_size = 40;
                $total_results = 1;
                $client->setPageSize($page_size);
                //根据修改时间增量更新
                $modified = Items::find()->where(['nick'=>$shop->taobao_user_nick])->max('modified');
                // if($modified)
                // {
                //     $client->setStartModified($modified);
                //     $client->setEndModified(date('Y-m-d H:i:s'));
                // }
                while ($total_results > 0) 
                {
                    $client->setPageNo($page_no);
                    $response = $client->getData();
                    //记录数据
                    $insert_data = isset($response['items']['item'][0])?$response['items']['item']:$response['items'];
                    if($insert_data)
                    {
                        foreach ($insert_data as $key => $insert) 
                        {
                            $items = Items::find()->where(['num_iid'=>$insert['num_iid']])->one();
                            if($items === null)
                                $items = new Items;
                            //去掉空数组
                            $insert = array_filter($insert, function($v){
                                if(is_array($v) && empty($v))
                                    return false;
                                else
                                    return true;
                            });
                            //获取商品详情等信息，改成批量接口ItemsSellerListGetRequest
                            $taobao = new Taobao;
                            $taobao->setRequest('ItemSellerGetRequest', array('appkey'=>'23362009', 'secret'=>'d059876cd9320cfc054c885eefac3e2b', 'fields' => 'desc,sub_title,sell_point,wireless_desc', 'num_iid' => $insert['num_iid']));
                            $detail = $taobao->getData($oauth->access_token);
                            if($items->load(['Items' => array_merge($insert, $detail['item'])]) && $items->save())
                                echo $insert['title']."成功<br>";
                            else
                                echo $insert['title']."失败<br>";

                        }
                    }
                    $total_results = $response['total_results'] - $page_no * $page_size;
                    $page_no++;
                }
            }
            else
            {
                echo "尚未授权，请重新登陆";
                exit;
            }
        }
        else
        {
            echo "非法用户无法操作";
            exit;
        }
        exit;
    }
    /**
     * Lists all Items models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Items::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Items model.
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
     * Creates a new Items model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Items();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Items model.
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
     * Deletes an existing Items model.
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
     * Finds the Items model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Items the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Items::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
