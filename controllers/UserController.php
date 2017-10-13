<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 13.10.2017
 * Time: 13:08
 */

namespace app\controllers;


use app\models\Role;
use app\models\SubscribeRoleForm;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()->all();

        return $this->render('index', ['users' => $users]);
    }

    public function actionShow($id)
    {
        $user = User::findOne($id);
        if (empty($user)) {
            throw new NotFoundHttpException();
        }

        $model = new SubscribeRoleForm();

        if ($model->load(\Yii::$app->request->post()) && $model->subscribe($user)) {
            return $this->redirect(['user/index']);
        }

        $roles = Role::find()->all();

        return $this->render('show',
            [
                'user' => $user,
                'model' => $model,
                'roles' => ArrayHelper::map($roles, 'id', 'name')
            ]);
    }
}