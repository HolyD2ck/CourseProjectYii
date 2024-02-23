<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Applicants $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="applicants-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'Фамилия')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Имя')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Отчество')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Образование')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Специальность')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Дата_Рождения')->textInput(['type' => 'datetime-local']) ?>

    <?= $form->field($model, 'Телефон')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true],) ?>

    <?= $form->field($model, 'Фото')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
