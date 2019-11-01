<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan_users".
 *
 * @property int $id
 * @property int $jabatan_id
 * @property int $users_id
 * @property int $golongan_id
 * @property int $instansi_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ApprovalSuratKeluar[] $approvalSuratKeluars
 * @property ApprovalSuratKeluar[] $approvalSuratKeluars0
 * @property DisposisiSuratMasuk[] $disposisiSuratMasuks
 * @property DisposisiSuratMasuk[] $disposisiSuratMasuks0
 * @property Golongan $golongan
 * @property Instansi $instansi
 * @property Jabatan $jabatan
 * @property Users $users
 * @property SuratMasuk[] $suratMasuks
 */
class JabatanUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jabatan_id', 'users_id', 'golongan_id', 'instansi_id'], 'required'],
            [['jabatan_id', 'users_id', 'golongan_id', 'instansi_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['golongan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Golongan::className(), 'targetAttribute' => ['golongan_id' => 'id']],
            [['instansi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instansi::className(), 'targetAttribute' => ['instansi_id' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
            [['users_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['users_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jabatan_id' => 'Jabatan ID',
            'users_id' => 'Users ID',
            'golongan_id' => 'Golongan ID',
            'instansi_id' => 'Instansi ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalSuratKeluars()
    {
        return $this->hasMany(ApprovalSuratKeluar::className(), ['jabatan_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalSuratKeluars0()
    {
        return $this->hasMany(ApprovalSuratKeluar::className(), ['dari_jabatan_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisiSuratMasuks()
    {
        return $this->hasMany(DisposisiSuratMasuk::className(), ['jabatan_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisiSuratMasuks0()
    {
        return $this->hasMany(DisposisiSuratMasuk::className(), ['dari_jabatan_users_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGolongan()
    {
        return $this->hasOne(Golongan::className(), ['id' => 'golongan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstansi()
    {
        return $this->hasOne(Instansi::className(), ['id' => 'instansi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'users_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasuks()
    {
        return $this->hasMany(SuratMasuk::className(), ['jabatan_users_id' => 'id']);
    }
}
