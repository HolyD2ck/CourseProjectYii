<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Applicants $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Соискатели', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="applicants-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Фамилия',
            'Имя',
            'Отчество',
            'Образование',
            'Специальность',
            'Дата_Рождения',
            'Телефон',
            'Email:email',
            [
                'attribute' => 'Фото',
                'format' => 'html',
                'value' => function ($model) {
                    return \yii\helpers\Html::img($model->Фото, ['alt' => 'Фото', 'width' => '100', 'height' => '100']);
                },
            ],
        ],
    ]) ?>

</div>
