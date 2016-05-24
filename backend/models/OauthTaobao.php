<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oauth_taobao".
 *
 * @property integer $id
 * @property string $appkey
 * @property string $access_token
 * @property string $token_type
 * @property string $expires_in
 * @property string $refresh_token
 * @property string $re_expires_in
 * @property string $r1_expires_in
 * @property string $r2_expires_in
 * @property string $w1_expires_in
 * @property string $w2_expires_in
 * @property string $taobao_user_nick
 * @property string $taobao_user_id
 * @property string $sub_taobao_user_id
 * @property string $sub_taobao_user_nick
 * @property string $r1_valid
 * @property string $r2_valid
 * @property string $w1_valid
 */
class OauthTaobao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oauth_taobao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expires_in', 're_expires_in', 'r1_expires_in', 'r2_expires_in', 'w1_expires_in', 'w2_expires_in', 'r1_valid', 'r2_valid', 'w1_valid'], 'integer'],
            [['appkey', 'access_token', 'token_type', 'refresh_token', 'taobao_user_nick', 'taobao_user_id', 'sub_taobao_user_id', 'sub_taobao_user_nick'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appkey' => 'Appkey',
            'access_token' => 'Access Token',
            'token_type' => 'Token Type',
            'expires_in' => 'Expires In',
            'refresh_token' => 'Refresh Token',
            're_expires_in' => 'Re Expires In',
            'r1_expires_in' => 'R1 Expires In',
            'r2_expires_in' => 'R2 Expires In',
            'w1_expires_in' => 'W1 Expires In',
            'w2_expires_in' => 'W2 Expires In',
            'taobao_user_nick' => 'Taobao User Nick',
            'taobao_user_id' => 'Taobao User ID',
            'sub_taobao_user_id' => 'Sub Taobao User ID',
            'sub_taobao_user_nick' => 'Sub Taobao User Nick',
            'r1_valid' => 'R1 Valid',
            'r2_valid' => 'R2 Valid',
            'w1_valid' => 'W1 Valid',
        ];
    }
}
