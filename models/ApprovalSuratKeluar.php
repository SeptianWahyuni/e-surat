<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approval_surat_keluar".
 *
 * @property int $id
 * @property int $surat_keluar_id
 * @property int $jabatan_users_id
 * @property string $status
 * @property string $tanggal
 * @property string $keterangan
 * @property int $dari_jabatan_users_id
 *
 * @property JabatanUsers $jabatanUsers
 * @property JabatanUsers $dariJabatanUsers
 * @property SuratKeluar $suratKeluar
 * @property SuratKeluar[] $suratKeluars
 */
class ApprovalSuratKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approval_surat_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surat_keluar_id', 'jabatan_users_id', 'dari_jabatan_users_id'], 'required'],
            [['surat_keluar_id', 'jabatan_users_id', 'dari_jabatan_users_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['status'], 'string', 'max' => 45],
            [['jabatan_users_id'], 'exist', 'skipOnError' => true, 'targetClass' => JabatanUsers::className(), 'targetAttribute' => ['jabatan_users_id' => 'id']],
            [['dari_jabatan_users_id'], 'exist', 'skipOnError' => true, 'targetClass' => JabatanUsers::className(), 'targetAttribute' => ['dari_jabatan_users_id' => 'id']],
            [['surat_keluar_id'], 'exist', 'skipOnError' => true, 'targetClass' => SuratKeluar::className(), 'targetAttribute' => ['surat_keluar_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surat_keluar_id' => 'Surat Keluar ID',
            'jabatan_users_id' => 'Jabatan Users ID',
            'status' => 'Status',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'dari_jabatan_users_id' => 'Dari Jabatan Users ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatanUsers()
    {
        return $this->hasOne(JabatanUsers::className(), ['id' => 'jabatan_users_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDariJabatanUsers()
    {
        return $this->hasOne(JabatanUsers::className(), ['id' => 'dari_jabatan_users_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluar()
    {
        return $this->hasOne(SuratKeluar::className(), ['id' => 'surat_keluar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluars()
    {
        return $this->hasMany(SuratKeluar::className(), ['approval_surat_keluar_id' => 'id']);
    }
}
