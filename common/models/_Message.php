<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $type
 * @property string $subject
 * @property string $text
 * @property string $language
 * @property integer $position
 * @property integer $sticky
 * @property string $status
 * @property string $expire_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property integer $donnerie_id
 *
 * @property Donnerie $donnerie
 */
class _Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'subject', 'text', 'language', 'sticky', 'status', 'name'], 'required'],
            [['text'], 'string'],
            [['position', 'sticky', 'donnerie_id'], 'integer'],
            [['expire_at', 'created_at', 'updated_at'], 'safe'],
            [['type', 'language', 'status'], 'string', 'max' => 20],
            [['subject'], 'string', 'max' => 80],
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
            'type' => Yii::t('app', 'Type'),
            'subject' => Yii::t('app', 'Subject'),
            'text' => Yii::t('app', 'Text'),
            'language' => Yii::t('app', 'Language'),
            'position' => Yii::t('app', 'Position'),
            'sticky' => Yii::t('app', 'Sticky'),
            'status' => Yii::t('app', 'Status'),
            'expire_at' => Yii::t('app', 'Expire At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'name' => Yii::t('app', 'Name'),
            'donnerie_id' => Yii::t('app', 'Donnerie ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonnerie()
    {
        return $this->hasOne(Donnerie::className(), ['id' => 'donnerie_id']);
    }
}
