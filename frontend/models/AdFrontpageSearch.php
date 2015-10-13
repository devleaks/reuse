<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ad;

/**
 * AdSearch represents the model behind the search form about `common\models\Ad`.
 */
class AdFrontpageSearch extends Ad
{
	public $search;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_type', 'status', 'search', 'category_id'], 'safe'],
        ];
    }

	protected function cleanQuery($str) {
		$text = $str;
		$lang = substr(Yii::$app->language, 0, 2);
		$stoplist_file = Yii::getAlias('@frontend').'/messages/'.$lang.'/stopwords.php';
		$stoplist = []; // 
		if(file_exists($stoplist_file)) {
			$stoplist = require($stoplist_file);
		}
		//Yii::trace($stoplist_file.', c='.count($stoplist), 'Ad::cleanQuery');
		foreach ($stoplist as $word) {
		  $pattern = "/(^|\\s|!|,|\\.|;|:|\\-|_|\\?)" . preg_quote($word) . "($|\\s|!|,|\\.|;|:|\\-|_|\\?)/i";
		  $text = preg_replace($pattern, '', $text);
		}
		Yii::trace($str.'>'.$text.'.', 'Ad::cleanQuery');
		return $text;
	}

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Ad::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

		$qstr = $this->cleanQuery($this->search);
        if ($qstr == '') {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
			'ad_type' => $this->ad_type,
			'status' => Ad::STATUS_ACTIVE
        ]);

		foreach(preg_split("/\s+/", $qstr) as $word) {
			Yii::trace('Adding like '.$word, 'Ad::search');
	        $query
	            ->andFilterWhere(['like', 'subject', $word])
	            ->andFilterWhere(['like', 'description', $word])
			;
		}

        return $dataProvider;
    }
}
