<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $id
 * @property string $taobao_user_nick
 * @property string $taobao_user_id
 * @property integer $is_deleted
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_deleted'], 'integer'],
            [['is_deleted'], 'default', 'value' => 0],
            [['taobao_user_nick', 'taobao_user_id'], 'string', 'max' => 255],
            [['taobao_user_nick', 'taobao_user_id'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taobao_user_nick' => '店铺名称',
            'taobao_user_id' => '店铺ID',
            'is_deleted' => '是否停用',
        ];
    }

    /**
     * @inheritdoc
     * @return ShopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ShopQuery(get_called_class());
    }
}
