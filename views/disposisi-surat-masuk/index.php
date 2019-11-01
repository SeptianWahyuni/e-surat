<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisposisiSuratMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disposisi Surat Masuks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disposisi-surat-masuk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Disposisi Surat Masuk', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'surat_masuk_id',
            'jabatan_users_id',
            'status',
            'tanggal',
            //'keterangan',
            //'dari_jabatan_users_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
