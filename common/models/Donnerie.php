<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "donnerie".
 */
class Donnerie extends _Donnerie
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
        ];
    }

	public function getCategories() {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])->viaTable(DonnerieCategory::tableName(), ['donnerie_id' => 'id']);
	}
	
	public function getActiveCategories() {
        return Category::find()->andWhere([
			'id' => DonnerieCategory::find()->select(DonnerieCategory::tableName().'.category_id')
											->andWhere([DonnerieCategory::tableName().'.status' => Category::STATUS_ACTIVE])
		]);
	}

	public function add($category) {
		if(! $oldcat = DonnerieCategory::findOne(['donnerie_id' => $this->id, 'category_id' => $category->id])) {
			$newcat = new DonnerieCategory([
				'donnerie_id' => $this->id,
				'category_id' => $category->id,
				'status' => Category::STATUS_ACTIVE,
			]);
			return $newcat->save();
		} else {
			$oldcat->status = Category::STATUS_ACTIVE;
			return $oldcat->save();
		}
		return false;
	}

	public function remove($category) {
		if($oldcat = DonnerieCategory::findOne(['donnerie_id' => $this->id, 'category_id' => $category->id])) {
			$oldcat->status = Category::STATUS_RETIRED;
			return $oldcat->save();
		}
		return false;
	}
}
