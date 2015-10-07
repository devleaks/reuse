<?php

namespace common\models;

use common\behaviors\MediaBehavior;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ad".
 */
class Ad extends _Ad
{
	/** */
	const TYPE_OFFER = 'OFFER';
	const TYPE_DEMAND = 'DEMAND';
	const TYPE_LEND = 'LEND';
	const TYPE_BORROW = 'BORROW';
	
	const STATUS_ACTIVE = 'ACTIVE';
	const STATUS_PENDING = 'PENDING';
	const STATUS_DISABLED = 'DISABLED';


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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Ad'),
	        'donnerie_id' => Yii::t('app', 'Donnerie'),
	        'ad_type' => Yii::t('app', 'Ad Type'),
            'category_id' => Yii::t('app', 'Category'),
            'user_id' => Yii::t('app', 'User'),
            'subject' => Yii::t('app', 'Subject'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'period' => Yii::t('app', 'Period'),
            'status' => Yii::t('app', 'Status'),
            'expire_at' => Yii::t('app', 'Expire At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

	// just the excerpt
	function first_n_words($number_of_words = 50) {
	   // Where excerpts are concerned, HTML tends to behave
	   // like the proverbial ogre in the china shop, so best to strip that
	   $text = strip_tags($this->description);

	   // \w[\w'-]* allows for any word character (a-zA-Z0-9_) and also contractions
	   // and hyphenated words like 'range-finder' or "it's"
	   // the /s flags means that . matches \n, so this can match multiple lines
	   $text = preg_replace("/^\W*((\w[\w'-]*\b\W*){1,$number_of_words}).*/ms", '\\1', $text);

	   // strip out newline characters from our excerpt
	   return str_replace("\n", "", $text);
	}

	// excerpt plus link if shortened
	function truncate_to_n_words($url, $number_of_words = 50) {
	   $text = strip_tags($this->description);
	   $excerpt = $this->first_n_words($number_of_words);
	   // we can't just look at the length or try == because we strip carriage returns
	   if( str_word_count($text) !== str_word_count($excerpt) ) {
	      $excerpt .= '... <a href="'.$url.'">'.Yii::t('app', 'Read more...').'</a>';
	   }
	   return $excerpt;
	}

}
