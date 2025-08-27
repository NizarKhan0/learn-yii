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

    const MARTIAL_STATUS = [
        'Single' => 'Single',
        'Married' => 'Married',
        'Divorced' => 'Divorced',
        'Widowed' => 'Widowed'
    ];

    const RELIGION = [
        'Islam' => 'Islam',
        'Christianity' => 'Christianity',
        'Catholicism' => 'Catholicism',
        'Hinduism' => 'Hinduism',
        'Buddhism' => 'Buddhism',
        'Confucianism' => 'Confucianism',
        'Other' => 'Other'
    ];

    const EDUCATION = [
        'High School' => 'High School',
        'Diploma' => 'Diploma',
        'Bachelor' => 'Bachelor',
        'Master' => 'Master',
        'Doctorate' => 'Doctorate'
    ];

    CONST GENDER = ['male' => 'Male', 'female' => 'Female'];
    
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
            [['birth_date'], 'date', 'format' => 'php:Y-m-d'],
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
    // public function getStaffs()
    // {
    //     return $this->hasMany(Staff::class, ['id_personal' => 'id_personal']);
    // }

    // 1 staff to 1 personal
    public function getStaff()
    {
        return $this->hasOne(Staff::class, ['id_personal' => 'id_personal']);
    }
}