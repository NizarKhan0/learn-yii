<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property int $status
 * @property string $role
 * @property int $id_staff
 * @property string $time_create
 * @property string $time_update
 *
 * @property Staff $staff
 */
class Users extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'status', 'role', 'id_staff', 'time_create', 'time_update'], 'required'],
            [['status', 'id_staff'], 'integer'],
            [['time_create', 'time_update'], 'safe'],
            [['username', 'password', 'role'], 'string', 'max' => 60],
            [['authKey', 'accessToken'], 'string', 'max' => 100],
            [['id_staff'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::class, 'targetAttribute' => ['id_staff' => 'id_staff']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'status' => 'Status',
            'role' => 'Role',
            'id_staff' => 'Id Staff',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::class, ['id_staff' => 'id_staff']);
    }

}