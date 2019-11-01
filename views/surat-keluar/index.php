<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SuratKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Keluars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keluar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Surat Keluar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nomor_klasifikasi',
            'file_lampiran',
            'perihal:ntext',
            'jabatan_id',
            //'sifat_id',
            //'kategori_surat_id',
            //'isi_surat:ntext',
            //'isi_lampiran_surat:ntext',
            //'no_agenda',
            //'tanggal',
            //'instansi_id',
            //'approval_surat_keluar_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
