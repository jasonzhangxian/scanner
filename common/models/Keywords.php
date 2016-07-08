<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "keywords".
 *
 * @property string $wid
 * @property string $type
 * @property string $word
 */
class Keywords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keywords';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'word'], 'required'],
            [['type'], 'integer'],
            [['word'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'wid' => 'Wid',
            'type' => 'Type',
            'word' => 'Word',
        ];
    }
}
