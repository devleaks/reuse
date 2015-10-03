<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "newsletter".
 *
 * @property integer $id
 * @property integer $donnerie_id
 * @property string $type
 * @property string $subject
 * @property string $text
 * @property string $name
 * @property string $language
 * @property integer $position
 * @property integer $sticky
 * @property string $status
 * @property string $expire_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Donnerie $donnerie
 */
class _Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['donnerie_id', 'position', 'sticky'], 'integer'],
            [['type', 'subject', 'text', 'name', 'language', 'sticky', 'status'], 'required'],
            [['text'], 'string'],
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
            'donnerie_id' => Yii::t('app', 'Donnerie ID'),
            'type' => Yii::t('app', 'Type'),
            'subject' => Yii::t('app', 'Subject'),
            'text' => Yii::t('app', 'Text'),
            'name' => Yii::t('app', 'Name'),
            'language' => Yii::t('app', 'Language'),
            'position' => Yii::t('app', 'Position'),
            'sticky' => Yii::t('app', 'Sticky'),
            'status' => Yii::t('app', 'Status'),
            'expire_at' => Yii::t('app', 'Expire At'),
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
}
