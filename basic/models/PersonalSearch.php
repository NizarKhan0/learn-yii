<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personal;

/**
 * PersonalSearch represents the model behind the search form of `app\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_personal'], 'integer'],
            [['full_name', 'name', 'gender', 'birth_location', 'birth_date', 'martial_status', 'religion', 'education', 'address', 'no_ic', 'no_phone', 'email'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Personal::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_personal' => $this->id_personal,
            'birth_date' => $this->birth_date,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'birth_location', $this->birth_location])
            ->andFilterWhere(['like', 'martial_status', $this->martial_status])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'no_ic', $this->no_ic])
            ->andFilterWhere(['like', 'no_phone', $this->no_phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
