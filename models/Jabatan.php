<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property int $id
 * @property string $nama
 * @property int $instansi_id
 *
 * @property AppovalRulesNode[] $appovalRulesNodes
 * @property DisposisiRulesNode[] $disposisiRulesNodes
 * @property Instansi $instansi
 * @property JabatanUsers[] $jabatanUsers
 * @property SuratKeluar[] $suratKeluars
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instansi_id'], 'required'],
            [['instansi_id'], 'integer'],
            [['nama'], 'string', 'max' => 45],
            [['instansi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instansi::className(), 'targetAttribute' => ['instansi_id' => 'id']],
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
            'instansi_id' => 'Instansi ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppovalRulesNodes()
    {
        return $this->hasMany(AppovalRulesNode::className(), ['jabatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisiRulesNodes()
    {
        return $this->hasMany(DisposisiRulesNode::className(), ['jabatan_id' => 'id']);
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
    public function getJabatanUsers()
    {
        return $this->hasMany(JabatanUsers::className(), ['jabatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuratKeluars()
    {
        return $this->hasMany(SuratKeluar::className(), ['jabatan_id' => 'id']);
    }
}
