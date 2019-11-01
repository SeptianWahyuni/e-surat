<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_surat".
 *
 * @property int $id
 * @property string $nama
 *
 * @property SuratKeluar[] $suratKeluars
 * @property SuratMasuk[] $suratMasuks
 */
class KategoriSurat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_surat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['nama'], 'string', 'max' => 45],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluars()
    {
        return $this->hasMany(SuratKeluar::className(), ['kategori_surat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasuks()
    {
        return $this->hasMany(SuratMasuk::className(), ['kategori_surat_id' => 'id']);
    }
}
