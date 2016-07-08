<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property integer $cid
 * @property string $seller_cids
 * @property string $props
 * @property string $pic_url
 * @property integer $num
 * @property string $list_time
 * @property string $delist_time
 * @property string $has_discount
 * @property string $has_invoice
 * @property string $has_warranty
 * @property string $has_showcase
 * @property string $modified
 * @property string $approve_status
 * @property integer $postage_id
 * @property string $is_virtual
 * @property string $is_taobao
 * @property string $is_ex
 * @property string $is_darwin
 * @property string $num_iid
 * @property string $title
 * @property string $nick
 * @property string $type
 * @property integer $valid_thru
 * @property string $outer_id
 * @property string $is_cspu
 * @property integer $sold_quantity
 * @property string $price
 * @property string $iid
 * @property string $desc
 * @property string $sub_title
 * @property string $sell_point
 * @property string $wireless_desc
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cid', 'num', 'postage_id', 'num_iid', 'valid_thru', 'sold_quantity', 'iid'], 'integer'],
            [['props', 'desc'], 'string'],
            [['list_time', 'delist_time', 'modified'], 'safe'],
            [['price'], 'number'],
            [['seller_cids', 'pic_url', 'has_discount', 'has_invoice', 'has_warranty', 'has_showcase', 'approve_status', 'is_virtual', 'is_taobao', 'is_ex', 'is_darwin', 'title', 'nick', 'type', 'outer_id', 'is_cspu', 'sub_title', 'sell_point', 'wireless_desc'], 'string', 'max' => 255],
            [['num_iid'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cid' => 'Cid',
            'seller_cids' => 'Seller Cids',
            'props' => 'Props',
            'pic_url' => 'Pic Url',
            'num' => 'Num',
            'list_time' => 'List Time',
            'delist_time' => 'Delist Time',
            'has_discount' => 'Has Discount',
            'has_invoice' => 'Has Invoice',
            'has_warranty' => 'Has Warranty',
            'has_showcase' => 'Has Showcase',
            'modified' => 'Modified',
            'approve_status' => 'Approve Status',
            'postage_id' => 'Postage ID',
            'is_virtual' => 'Is Virtual',
            'is_taobao' => 'Is Taobao',
            'is_ex' => 'Is Ex',
            'is_darwin' => 'Is Darwin',
            'num_iid' => 'Num Iid',
            'title' => 'Title',
            'nick' => 'Nick',
            'type' => 'Type',
            'valid_thru' => 'Valid Thru',
            'outer_id' => 'Outer ID',
            'is_cspu' => 'Is Cspu',
            'sold_quantity' => 'Sold Quantity',
            'price' => 'Price',
            'iid' => 'Iid',
            'desc' => 'Desc',
            'sub_title' => 'Sub Title',
            'sell_point' => 'Sell Point',
            'wireless_desc' => 'Wireless Desc',
        ];
    }
}
