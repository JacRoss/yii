<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 13.10.2017
 * Time: 13:05
 */

namespace app\commands;


use app\models\UserRole;
use yii\console\Controller;

class WatcherController extends Controller
{
    public function actionSubscriber()
    {
        UserRole::deleteAll('expire_in < :time', [':time' => time()]);
    }

}