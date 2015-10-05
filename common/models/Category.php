<?php
namespace common\models;

use common\behaviors\MediaBehavior;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 */
class Category extends _Category
{
	const STATUS_ACTIVE = 'ACTIVE';
	const STATUS_RETIRED = 'RETIRED';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
                'timestamp' => [
                        'class' => 'yii\behaviors\TimestampBehavior',
                        'attributes' => [
                                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                                ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                        ],
                        'value' => function() { return date('Y-m-d H:i:s'); },
                ],
				'uploadFile' => [
	                'class' => MediaBehavior::className(),
	                'mediasAttributes' => ['picture'],
	            ]
        ];
    }

}
