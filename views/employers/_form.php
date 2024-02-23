<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Employers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employers-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'Фамилия')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Имя')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Отчество')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Организация')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Дата_Основания')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'Вакансия')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Телефон')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Фото')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
