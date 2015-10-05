<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donnerie".
 *
 * @property integer $id
 * @property string $name
 * @property string $layout
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DonnerieCategory[] $donnerieCategories
 * @property Newsletter[] $newsletters
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
            [['name', 'layout'], 'string', 'max' => 40],
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
            'name' => Yii::t('app', 'Name'),
            'layout' => Yii::t('app', 'Layout'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
    public function getNewsletters()
    {
        return $this->hasMany(Newsletter::className(), ['donnerie_id' => 'id']);
    }
}
