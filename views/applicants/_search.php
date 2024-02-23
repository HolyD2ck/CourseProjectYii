<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ApplicantsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="applicants-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Фамилия') ?>

    <?= $form->field($model, 'Имя') ?>

    <?= $form->field($model, 'Отчество') ?>

    <?= $form->field($model, 'Образование') ?>

    <?php  echo $form->field($model, 'Специальность') ?>

    <?php  echo $form->field($model, 'Дата_Рождения') ?>

    <?php  echo $form->field($model, 'Телефон') ?>

    <?php  echo $form->field($model, 'Email') ?>

    <?php  //echo $form->field($model, 'Фото') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Перезаписать', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
