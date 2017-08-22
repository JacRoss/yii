<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 22.08.17
 * Time: 12:21
 */

namespace app\filters;

use yii\base\ActionFilter;
use Yii;
use yii\web\UnauthorizedHttpException;

/**
 * Class AdminFilter
 * @package app\filters
 * @property
 */
class AdminFilter extends ActionFilter
{
    private const ADMIN_USERNAME = 'admin';
    private const PASSWORD = '123456';


    public function beforeAction($action)
    {
        if (!$this->validAdmin()) {
            throw new UnauthorizedHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }

        return parent::beforeAction($action);
    }

    private function validAdmin(): bool
    {
        return $this->hasAdmin() && $this->passwordValid();
    }

    private function hasAdmin(): bool
    {
        return Yii::$app->request->headers->get('X-UserName') === self::ADMIN_USERNAME;
    }

    private function passwordValid(): bool
    {
        return Yii::$app->request->headers->get('X-Password') === sha1(self::PASSWORD);
    }
}