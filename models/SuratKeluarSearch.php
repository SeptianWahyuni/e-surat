<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratKeluar;

/**
 * SuratKeluarSearch represents the model behind the search form of `app\models\SuratKeluar`.
 */
class SuratKeluarSearch extends SuratKeluar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jabatan_id', 'sifat_id', 'kategori_surat_id', 'instansi_id', 'approval_surat_keluar_id'], 'integer'],
            [['nomor_klasifikasi', 'file_lampiran', 'perihal', 'isi_surat', 'isi_lampiran_surat', 'no_agenda', 'tanggal'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SuratKeluar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jabatan_id' => $this->jabatan_id,
            'sifat_id' => $this->sifat_id,
            'kategori_surat_id' => $this->kategori_surat_id,
            'tanggal' => $this->tanggal,
            'instansi_id' => $this->instansi_id,
            'approval_surat_keluar_id' => $this->approval_surat_keluar_id,
        ]);

        $query->andFilterWhere(['like', 'nomor_klasifikasi', $this->nomor_klasifikasi])
            ->andFilterWhere(['like', 'file_lampiran', $this->file_lampiran])
            ->andFilterWhere(['like', 'perihal', $this->perihal])
            ->andFilterWhere(['like', 'isi_surat', $this->isi_surat])
            ->andFilterWhere(['like', 'isi_lampiran_surat', $this->isi_lampiran_surat])
            ->andFilterWhere(['like', 'no_agenda', $this->no_agenda]);

        return $dataProvider;
    }
}
