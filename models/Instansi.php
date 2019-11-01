<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telepon
 * @property string $kode_pos
 * @property string $fax
 *
 * @property AppovalRulesNode[] $appovalRulesNodes
 * @property DisposisiRulesNode[] $disposisiRulesNodes
 * @property Jabatan[] $jabatans
 * @property JabatanUsers[] $jabatanUsers
 * @property SuratKeluar[] $suratKeluars
 * @property SuratMasuk[] $suratMasuks
 */
class Instansi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 45],
            [['no_telepon', 'fax'], 'string', 'max' => 20],
            [['kode_pos'], 'string', 'max' => 10],
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
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
            'kode_pos' => 'Kode Pos',
            'fax' => 'Fax',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppovalRulesNodes()
    {
        return $this->hasMany(AppovalRulesNode::className(), ['instansi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisiRulesNodes()
    {
        return $this->hasMany(DisposisiRulesNode::className(), ['instansi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatans()
    {
        return $this->hasMany(Jabatan::className(), ['instansi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanUsers()
    {
        return $this->hasMany(JabatanUsers::className(), ['instansi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluars()
    {
        return $this->hasMany(SuratKeluar::className(), ['instansi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasuks()
    {
        return $this->hasMany(SuratMasuk::className(), ['instansi_id' => 'id']);
    }
}
