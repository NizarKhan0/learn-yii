<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * StaffSearch represents the model behind the search form of `app\models\Staff`.
 */
class StaffSearch extends Staff
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_staff', 'id_personal', 'salary'], 'integer'],
            [['staff_category', 'staff_status', 'department', 'start_date'], 'safe'],
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
        $query = Staff::find();

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
            'id_staff' => $this->id_staff,
            'id_personal' => $this->id_personal,
            'start_date' => $this->start_date,
            'salary' => $this->salary,
        ]);

        $query->andFilterWhere(['like', 'staff_category', $this->staff_category])
            ->andFilterWhere(['like', 'staff_status', $this->staff_status])
            ->andFilterWhere(['like', 'department', $this->department]);

        return $dataProvider;
    }
}
