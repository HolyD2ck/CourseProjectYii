<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Applicants;

/**
 * ApplicantsSearch represents the model behind the search form of `app\models\Applicants`.
 */
class ApplicantsSearch extends Applicants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Фамилия', 'Имя', 'Отчество', 'Образование', 'Специальность', 'Дата_Рождения', 'Телефон', 'Email', 'Фото'], 'safe'],
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
        $query = Applicants::find();

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
            'Дата_Рождения' => $this->Дата_Рождения,
        ]);

        $query->andFilterWhere(['like', 'Фамилия', $this->Фамилия])
            ->andFilterWhere(['like', 'Имя', $this->Имя])
            ->andFilterWhere(['like', 'Отчество', $this->Отчество])
            ->andFilterWhere(['like', 'Образование', $this->Образование])
            ->andFilterWhere(['like', 'Специальность', $this->Специальность])
            ->andFilterWhere(['like', 'Телефон', $this->Телефон])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Фото', $this->Фото]);

        return $dataProvider;
    }
}
