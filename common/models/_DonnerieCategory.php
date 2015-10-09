<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donnerie_category".
 *
 * @property integer $id
 * @property integer $donnerie_id
 * @property integer $category_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Donnerie $donnerie
 * @property Category $category
 */
class _DonnerieCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donnerie_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['donnerie_id', 'category_id'], 'required'],
            [['donnerie_id', 'category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'donnerie_id' => Yii::t('app', 'Donnerie ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
