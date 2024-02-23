<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employers;

/**
 * EmployersSearch represents the model behind the search form of `app\models\Employers`.
 */
class EmployersSearch extends Employers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Фамилия', 'Имя', 'Отчество', 'Организация', 'Дата_Основания', 'Вакансия', 'Телефон', 'Email', 'Фото'], 'safe'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Employers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'Дата_Основания' => $this->Дата_Основания,
        ]);

        $query->andFilterWhere(['like', 'Фамилия', $this->Фамилия])
            ->andFilterWhere(['like', 'Имя', $this->Имя])
            ->andFilterWhere(['like', 'Отчество', $this->Отчество])
            ->andFilterWhere(['like', 'Организация', $this->Организация])
            ->andFilterWhere(['like', 'Вакансия', $this->Вакансия])
            ->andFilterWhere(['like', 'Телефон', $this->Телефон])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Фото', $this->Фото]);

        return $dataProvider;
    }
}
