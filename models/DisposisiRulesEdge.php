<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disposisi_rules_edge".
 *
 * @property int $id
 * @property int $parent_node_id
 * @property int $child_node_id
 *
 * @property DisposisiRulesNode $parentNode
 * @property DisposisiRulesNode $childNode
 */
class DisposisiRulesEdge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disposisi_rules_edge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_node_id', 'child_node_id'], 'required'],
            [['parent_node_id', 'child_node_id'], 'integer'],
            [['parent_node_id'], 'exist', 'skipOnError' => true, 'targetClass' => DisposisiRulesNode::className(), 'targetAttribute' => ['parent_node_id' => 'id']],
            [['child_node_id'], 'exist', 'skipOnError' => true, 'targetClass' => DisposisiRulesNode::className(), 'targetAttribute' => ['child_node_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_node_id' => 'Parent Node ID',
            'child_node_id' => 'Child Node ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentNode()
    {
        return $this->hasOne(DisposisiRulesNode::className(), ['id' => 'parent_node_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildNode()
    {
        return $this->hasOne(DisposisiRulesNode::className(), ['id' => 'child_node_id']);
    }
}
