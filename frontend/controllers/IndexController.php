<?php

namespace frontend\controllers;

use Yii;
use common\models\Items;
use common\models\Keywords;
use common\extensions\WordSeparator;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class IndexController extends \yii\web\Controller
{
	public $layout = false;

    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'doscan' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

	//layout
    public function actionIndex()
    {
    	//获取用户信息

    	//获取功能菜单

        return $this->render('index');
    }

    //欢迎页
    public function actionWelcome()
    {
        return $this->render('welcome');
    }

    //检测全店商品
    public function actionScanitems()
    {
        return $this->render('scanitems');
    }

    //检测全店商品
    public function actionDoscan()
    {

        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $keywords = Keywords::find()->all();
        $kw = [];
        foreach ($keywords as $value) {
            $kw[] = $value->word;
        }
        $ws = new WordSeparator;
        $ws->initKeyWordsAsArr($kw);

        $post = Yii::$app->request->post();
        $response = [];
        if(isset($post['fields'])) {
            $fields_label = [];
            $fields_label['title'] = '宝贝标题';
            $fields_label['sell_point'] = '宝贝卖点';
            $fields_label['desc'] = '宝贝描述';
            
            $items = Items::find()->all();
            $i = 0;
            foreach ($items as $value) {
                $i++;
                $scan_result = array();
                foreach($post['fields'] as $field)
                {
                    $s = $ws->seperate($value->{$field},7);
                    if(!empty($s))
                        $scan_result[$field] = $fields_label[$field]."包含（".preg_replace("/[\x{4e00}-\x{9fa5}]/iu",'<font color=red>$0</font>',$ws->seperate($value->{$field},7))."）";
                }
                if(!empty($scan_result)) {
                    $response[$i]['title'] = $value->title;
                    $response[$i]['approve_status'] = ['onsale'=>'出售中','instock'=>'仓库中'][$value->approve_status];
                    $response[$i]['pic_url'] = $value->pic_url;
                    $response[$i]['scan_result'] = implode("<br>", $scan_result);
                    $response[$i]['num_iid'] = $value->num_iid;
                }

            }
            echo json_encode(['rows'=>array_values($response)]);
        }
        if(isset($post['content'])) {
            $s = $ws->seperate($post['content'],7);
            $content = $post['content'];
            if(!empty($s)) {
                $words = explode("#", $s);
                foreach ($words as $key => $word) {
                    $content = str_replace($word,'<font color=red>'.$word.'</font>',$content);
                }
            }
            echo json_encode(['content'=>$content,'words'=>empty($s)?"":$words]);
        }
    }

    //检测文案
    public function actionScanwords()
    {
        return $this->render('scanwords');
    }
}
