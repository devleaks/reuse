<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ad".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $topcat
 * @property string $subject
 * @property string $description
 * @property double $price
 * @property string $period
 * @property string $status
 * @property integer $user_id
 * @property string $expire_at
 * @property string $created_at
 * @property string $updated_at
 * @property integer $donnerie_id
 *
 * @property User $user
 * @property Category $category
 * @property User $user0
 * @property Donnerie $donnerie
 * @property Category $category0
 * @property Interest[] $interests
 * @property UserAd[] $userAds
 */
class _Ad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'topcat', 'subject', 'description', 'status', 'user_id', 'donnerie_id'], 'required'],
            [['category_id', 'user_id', 'donnerie_id'], 'integer'],
            [['price'], 'number'],
            [['expire_at', 'created_at', 'updated_at'], 'safe'],
            [['topcat', 'period', 'status'], 'string', 'max' => 20],
            [['subject'], 'string', 'max' => 80],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'topcat' => Yii::t('app', 'Topcat'),
            'subject' => Yii::t('app', 'Subject'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'period' => Yii::t('app', 'Period'),
            'status' => Yii::t('app', 'Status'),
            'user_id' => Yii::t('app', 'User ID'),
            'expire_at' => Yii::t('app', 'Expire At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'donnerie_id' => Yii::t('app', 'Donnerie ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonnerie()
    {
        return $this->hasOne(Donnerie::className(), ['id' => 'donnerie_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interest::className(), ['ad_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAds()
    {
        return $this->hasMany(UserAd::className(), ['ad_id' => 'id']);
    }
}
