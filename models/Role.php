<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property integer $id
 * @property string $name
 *
 * @property UserRole[] $userRoles
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::className(), ['role_id' => 'id']);
    }
}
