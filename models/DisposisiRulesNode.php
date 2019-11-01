<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disposisi_rules_node".
 *
 * @property int $id
 * @property int $instansi_id
 * @property int $jabatan_id
 * @property int $penerima_surat
 *
 * @property DisposisiRulesEdge[] $disposisiRulesEdges
 * @property DisposisiRulesEdge[] $disposisiRulesEdges0
 * @property Instansi $instansi
 * @property Jabatan $jabatan
 */
class DisposisiRulesNode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disposisi_rules_node';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instansi_id', 'jabatan_id'], 'required'],
            [['instansi_id', 'jabatan_id', 'penerima_surat'], 'integer'],
            [['instansi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instansi::className(), 'targetAttribute' => ['instansi_id' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instansi_id' => 'Instansi ID',
            'jabatan_id' => 'Jabatan ID',
            'penerima_surat' => 'Penerima Surat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisiRulesEdges()
    {
        return $this->hasMany(DisposisiRulesEdge::className(), ['parent_node_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisiRulesEdges0()
    {
        return $this->hasMany(DisposisiRulesEdge::className(), ['child_node_id' => 'id']);
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
}
