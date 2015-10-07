<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "donnerie_donnerie".
 *
 * @property integer $id
 * @property integer $donnerie_id
 * @property integer $related_id
 * @property string $related_type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Donnerie $donnerie
 * @property Donnerie $related
 */
class _DonnerieDonnerie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donnerie_donnerie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['donnerie_id', 'related_id'], 'required'],
            [['donnerie_id', 'related_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['related_type', 'status'], 'string', 'max' => 20]
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
            'related_id' => Yii::t('app', 'Related ID'),
            'related_type' => Yii::t('app', 'Related Type'),
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
    public function getRelated()
    {
        return $this->hasOne(Donnerie::className(), ['id' => 'related_id']);
    }
}
