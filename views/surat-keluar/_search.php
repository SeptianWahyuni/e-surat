<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="surat-keluar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nomor_klasifikasi') ?>

    <?= $form->field($model, 'file_lampiran') ?>

    <?= $form->field($model, 'perihal') ?>

    <?= $form->field($model, 'jabatan_id') ?>

    <?php // echo $form->field($model, 'sifat_id') ?>

    <?php // echo $form->field($model, 'kategori_surat_id') ?>

    <?php // echo $form->field($model, 'isi_surat') ?>

    <?php // echo $form->field($model, 'isi_lampiran_surat') ?>

    <?php // echo $form->field($model, 'no_agenda') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'instansi_id') ?>

    <?php // echo $form->field($model, 'approval_surat_keluar_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
