<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id_staff
 * @property int $id_personal
 * @property string|null $staff_category
 * @property string|null $staff_status
 * @property string|null $department
 * @property string|null $start_date
 * @property int|null $salary
 *
 * @property Personal $personal
 */
class Staff extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_category', 'staff_status', 'department', 'start_date', 'salary'], 'default', 'value' => null],
            [['id_personal'], 'required'],
            [['id_personal', 'salary'], 'integer'],
            [['start_date'], 'safe'],
            [['staff_category', 'staff_status', 'department'], 'string', 'max' => 120],
            [['id_personal'], 'exist', 'skipOnError' => true, 'targetClass' => Personal::class, 'targetAttribute' => ['id_personal' => 'id_personal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_staff' => 'Id Staff',
            'id_personal' => 'Id Personal',
            'staff_category' => 'Staff Category',
            'staff_status' => 'Staff Status',
            'department' => 'Department',
            'start_date' => 'Start Date',
            'salary' => 'Salary',
        ];
    }

    /**
     * Gets query for [[Personal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonal()
    {
        return $this->hasOne(Personal::class, ['id_personal' => 'id_personal']);
    }

}
