<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 13.10.2017
 * Time: 13:24
 */

namespace app\models;


use yii\base\Model;

class SubscribeRoleForm extends Model
{
    public $role;
    public $expireIn;

    public function rules()
    {
        return [
            [['role', 'expireIn'], 'required'],
            ['role', 'exist', 'targetClass' => Role::class, 'targetAttribute' => 'id'],
        ];
    }

    public function subscribe(User $user)
    {
        if ($this->validate()) {
            $model = UserRole::find()
                ->where(['user_id' => $user->id])
                ->andWhere(['role_id' => $this->role])
                ->one();

            if (empty($model)) {
                $model = new UserRole();
                $model->user_id = $user->id;
                $model->role_id = $this->role;
            }

            $model->expire_in = strtotime($this->expireIn);
            $model->save();

            return true;
        }
        return false;
    }

}