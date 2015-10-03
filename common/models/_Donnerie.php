<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donnerie".
 *
 * @property integer $id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 *
 * @property Ad[] $ads
 * @property DonnerieCategory[] $donnerieCategories
 * @property Menu[] $menus
 * @property Message[] $messages
 * @property Newsletter[] $newsletters
 * @property User[] $users
 */
class _Donnerie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donnerie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 20],
            [['name'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAds()
    {
        return $this->hasMany(Ad::className(), ['donnerie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonnerieCategories()
    {
        return $this->hasMany(DonnerieCategory::className(), ['donnerie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['donnerie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['donnerie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsletters()
    {
        return $this->hasMany(Newsletter::className(), ['donnerie_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['donnerie_id' => 'id']);
    }
}
