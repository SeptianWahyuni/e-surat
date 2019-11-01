<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "appoval_rules_node".
 *
 * @property int $id
 * @property int $instansi_id
 * @property int $jabatan_id
 * @property int $bisa_menandatangani
 * @property int $bisa_atas_nama
 *
 * @property Instansi $instansi
 * @property Jabatan $jabatan
 * @property ApprovalRulesEdge[] $approvalRulesEdges
 * @property ApprovalRulesEdge[] $approvalRulesEdges0
 */
class AppovalRulesNode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appoval_rules_node';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instansi_id', 'jabatan_id'], 'required'],
            [['instansi_id', 'jabatan_id', 'bisa_menandatangani', 'bisa_atas_nama'], 'integer'],
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
            'bisa_menandatangani' => 'Bisa Menandatangani',
            'bisa_atas_nama' => 'Bisa Atas Nama',
        ];
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
    public function getApprovalRulesEdges()
    {
        return $this->hasMany(ApprovalRulesEdge::className(), ['parent_rules_node_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalRulesEdges0()
    {
        return $this->hasMany(ApprovalRulesEdge::className(), ['child_rules_node_id' => 'id']);
    }
}
