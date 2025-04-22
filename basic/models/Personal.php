<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $id_personal
 * @property string|null $full_name
 * @property string|null $name
 * @property string|null $gender
 * @property string|null $birth_location
 * @property string|null $birth_date
 * @property string|null $martial_status
 * @property string|null $religion
 * @property string|null $education
 * @property string|null $address
 * @property string|null $no_ic
 * @property string|null $no_phone
 * @property string|null $email
 *
 * @property Staff[] $staff
 */
class Personal extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //add rules here required like laravel
            [['full_name', 'gender','no_phone', 'email'], 'required'],
            
            [['full_name', 'name', 'gender', 'birth_location', 'birth_date', 'martial_status', 'religion', 'education', 'address', 'no_ic', 'no_phone', 'email'], 'default', 'value' => null],
            [['birth_date'], 'safe'],
            [['full_name', 'name', 'gender', 'birth_location', 'martial_status', 'religion', 'education', 'address', 'no_ic', 'no_phone', 'email'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_personal' => 'Id Personal',
            'full_name' => 'Full Name',
            'name' => 'Name',
            'gender' => 'Gender',
            'birth_location' => 'Birth Location',
            'birth_date' => 'Birth Date',
            'martial_status' => 'Martial Status',
            'religion' => 'Religion',
            'education' => 'Education',
            'address' => 'Address',
            'no_ic' => 'No Ic',
            'no_phone' => 'No Phone',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::class, ['id_personal' => 'id_personal']);
    }

}
