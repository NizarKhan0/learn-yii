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
    // tambah kat variable baru kalau nak buat search lain (rekod dari table lain mcm laravel)
    public $full_name;
    public $gender;
    public $address;
    public $no_ic;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_staff', 'id_personal', 'salary'], 'integer'],
            // tambah kat rules baru kalau nak buat search lain
            [['staff_category', 'staff_status', 'department', 'start_date', 'full_name', 'gender', 'address', 'no_ic'], 'safe'],
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
        $query->leftJoin('personal', 'staff.id_personal = personal.id_personal');

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

            // boleh guna salah satu letak kat search query unutk staff_category
            'staff_category' => $this->staff_category,
        ]);

        $query
            // boleh guna salah satu letak kat search query unutk staff_category
            // ->andFilterWhere(['like', 'staff_category', $this->staff_category])
            // ->andFilterWhere(['=', 'staff_category', trim($this->staff_category)])
            ->andFilterWhere(['like', 'staff_status', $this->staff_status])
            ->andFilterWhere(['like', 'department', $this->department])

            //dari relation
            ->andFilterWhere(['like', 'personal.full_name', $this->full_name])
            ->andFilterWhere(['=', 'personal.gender', $this->gender])
            // ->andFilterWhere(['personal.gender' => $this->gender])
            // ->andFilterWhere(['like', 'personal.address', $this->address])
            ->andFilterWhere(['like', 'personal.no_ic', $this->no_ic]);

        return $dataProvider;
    }
}