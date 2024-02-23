<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "applicants".
 *
 * @property int $id
 * @property string $Фамилия
 * @property string $Имя
 * @property string $Отчество
 * @property string $Образование
 * @property string $Специальность
 * @property string $Дата_Рождения
 * @property string $Телефон
 * @property string $Email
 * @property string $Фото
 * 
 */
class Applicants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applicants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Фамилия', 'Имя', 'Отчество', 'Образование', 'Специальность', 'Телефон', 'Email'], 'required'],
            [['Дата_Рождения'], 'safe'],
            [['Фото'], 'file', 'skipOnEmpty' => true],
            [['Фамилия', 'Имя', 'Отчество', 'Образование', 'Специальность', 'Телефон', 'Email', 'Фото'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Фамилия' => 'Фамилия',
            'Имя' => 'Имя',
            'Отчество' => 'Отчество',
            'Образование' => 'Образование',
            'Специальность' => 'Специальность',
            'Дата_Рождения' => 'Дата Рождения',
            'Телефон' => 'Телефон',
            'Email' => 'Email',
            'Фото' => 'Фото',
        ];
    }
    public function beforeSave($insert)
{
    if (!parent::beforeSave($insert)) {
        return false;
    }

    $this->Дата_Рождения = date('Y-m-d H:i:s', strtotime($this->Дата_Рождения));

    return true;
}
}
