<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "message".
 */
class Message extends _Message
{
	/** */
	const TYPE_BLOG = 'POST';
	const TYPE_PAGE = 'PAGE';
	
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

	// just the excerpt
	function first_n_words($number_of_words = 50) {
	   // Where excerpts are concerned, HTML tends to behave
	   // like the proverbial ogre in the china shop, so best to strip that
	   $text = strip_tags($this->text);

	   // \w[\w'-]* allows for any word character (a-zA-Z0-9_) and also contractions
	   // and hyphenated words like 'range-finder' or "it's"
	   // the /s flags means that . matches \n, so this can match multiple lines
	   $text = preg_replace("/^\W*((\w[\w'-]*\b\W*){1,$number_of_words}).*/ms", '\\1', $text);

	   // strip out newline characters from our excerpt
	   return str_replace("\n", "", $text);
	}

	// excerpt plus link if shortened
	function truncate_to_n_words($url, $number_of_words = 50) {
	   $text = strip_tags($this->text);
	   $excerpt = $this->first_n_words($number_of_words);
	   // we can't just look at the length or try == because we strip carriage returns
	   if( str_word_count($text) !== str_word_count($excerpt) ) {
	      $excerpt .= '... <a href="'.$url.'">'.Yii::t('app', 'Read more...').'</a>';
	   }
	   return $excerpt;
	}

}
