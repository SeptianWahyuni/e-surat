<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "golongan".
 *
 * @property int $id
 * @property string $nama
 *
 * @property JabatanUsers[] $jabatanUsers
 */
class Golongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'golongan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 45],
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
    public function getJabatanUsers()
    {
        return $this->hasMany(JabatanUsers::className(), ['golongan_id' => 'id']);
    }
}
