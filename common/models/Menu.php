<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "message".
 */
class Menu extends _Menu
{
	/** Name of top menu (convention) */
	const TOP = 'TOP';
	const DEFAULT_ROLE = 'visitor';
	
    public $parent_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(
			parent::rules(),
			[
	            [['parent_name'], 'filterParent'],
	            [['parent_name'], 'in',
	                'range' => static::find()->select(['name'])->column(),
	                'message' => 'Menu "{value}" not found.'],
        	]
		);
    }

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

	/**
	 * Returns "league" role of user, from roles attributiion. Default is golfer. Null if not loggued in.
	 */
    static public function getRole() {
		if(!Yii::$app->user->isGuest) {
			if($user = User::findOne(Yii::$app->user->identity->id))
				if($key = array_search($user->role, Yii::$app->params['valid_roles']))
					return $key;
			return self::DEFAULT_ROLE;
		}
		return null;
	}

    /**
     * Use to loop detected.
     */
    public function filterParent()
    {
        $value = $this->parent_name;
        $parent = self::findOne(['name' => $value]);
        if ($parent) {
            $id = $this->id;
            $parent_id = $parent->id;
            while ($parent) {
                if ($parent->id == $id) {
                    $this->addError('parent_name', 'Loop detected.');

                    return;
                }
                $parent = $parent->parent;
            }
            $this->parent_id = $parent_id;
        }
    }

	/**
	 * Retrieves menu elements for suppied parent
	 *
	 *  @param $name string Parent menu element name.
	 *  @return array (Label,Url) pairs of menu elements, suitable for Nav menu.
	 */
	public static function getMenu($name) {
		if($parent = Menu::findOne(['name' => $name])) {
			$menus = [];
			foreach($parent->getMenus()->each() as $menu)
				$menus[] = [
					'label' => $menu->name,
					'url' => [$menu->url],
				];
			return $menus;
		}
		return [];
	}
}
