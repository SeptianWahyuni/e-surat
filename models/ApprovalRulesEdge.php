<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approval_rules_edge".
 *
 * @property int $id
 * @property int $parent_rules_node_id
 * @property int $child_rules_node_id
 *
 * @property AppovalRulesNode $parentRulesNode
 * @property AppovalRulesNode $childRulesNode
 */
class ApprovalRulesEdge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approval_rules_edge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_rules_node_id', 'child_rules_node_id'], 'required'],
            [['parent_rules_node_id', 'child_rules_node_id'], 'integer'],
            [['parent_rules_node_id'], 'exist', 'skipOnError' => true, 'targetClass' => AppovalRulesNode::className(), 'targetAttribute' => ['parent_rules_node_id' => 'id']],
            [['child_rules_node_id'], 'exist', 'skipOnError' => true, 'targetClass' => AppovalRulesNode::className(), 'targetAttribute' => ['child_rules_node_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_rules_node_id' => 'Parent Rules Node ID',
            'child_rules_node_id' => 'Child Rules Node ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentRulesNode()
    {
        return $this->hasOne(AppovalRulesNode::className(), ['id' => 'parent_rules_node_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildRulesNode()
    {
        return $this->hasOne(AppovalRulesNode::className(), ['id' => 'child_rules_node_id']);
    }
}
