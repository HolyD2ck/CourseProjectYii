<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EmployersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="employers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Фамилия') ?>

    <?= $form->field($model, 'Имя') ?>

    <?= $form->field($model, 'Отчество') ?>

    <?= $form->field($model, 'Организация') ?>

    <?php  echo $form->field($model, 'Дата_Основания') ?>

    <?php  echo $form->field($model, 'Вакансия') ?>

    <?php  echo $form->field($model, 'Телефон') ?>

    <?php echo $form->field($model, 'Email') ?>

    <?php  //echo $form->field($model, 'Фото') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
