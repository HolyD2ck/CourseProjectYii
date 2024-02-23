<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employers".
 *
 * @property int $id
 * @property string $Фамилия
 * @property string $Имя
 * @property string $Отчество
 * @property string $Организация
 * @property string $Дата_Основания
 * @property string $Вакансия
 * @property string $Телефон
 * @property string $Email
 * @property string $Фото
 */
class Employers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Фамилия', 'Имя', 'Отчество', 'Организация', 'Вакансия', 'Телефон', 'Email'], 'required'],
            [['Дата_Основания'], 'safe'],
            [['Фото'], 'file', 'skipOnEmpty' => true],
            [['Фамилия', 'Имя', 'Отчество', 'Организация', 'Вакансия', 'Телефон', 'Email', 'Фото'], 'string', 'max' => 255],
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
            'Организация' => 'Организация',
            'Дата_Основания' => 'Дата Основания',
            'Вакансия' => 'Вакансия',
            'Телефон' => 'Телефон',
            'Email' => 'Email',
            'Фото' => 'Фото',
        ];
    }
}
