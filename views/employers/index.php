<?php

use app\models\Employers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EmployersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Работодатели';

?>
<div class="employers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Внести Работодателя', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить Всех', ['deleteall'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'Фамилия',
            'Имя',
            'Отчество',
            'Организация',
            'Дата_Основания',
            'Вакансия',
            'Телефон',
            'Email:email',
            [
                'attribute' => 'Фото',
                'format' => 'html',
                'value' => function ($model) {
                    return \yii\helpers\Html::img($model->Фото, ['alt' => 'Фото', 'width' => '100', 'height' => '100']);
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Employers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
