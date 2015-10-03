<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "interest".
 *
 * @property integer $id
 * @property integer $ad_id
 * @property integer $user_id
 * @property string $status
 * @property string $expire_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Ad $ad
 * @property User $user
 */
class _Interest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_id', 'user_id', 'status'], 'required'],
            [['ad_id', 'user_id'], 'integer'],
            [['expire_at', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ad_id' => Yii::t('app', 'Ad ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
            'expire_at' => Yii::t('app', 'Expire At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAd()
    {
        return $this->hasOne(Ad::className(), ['id' => 'ad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
