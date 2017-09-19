<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 19.09.17
 * Time: 13:33
 */

namespace app\components\SoftDeletes;

use app\models\Article;
use Yii;
use yii\behaviors\TimestampBehavior;

trait TSoftDeletes
{
    private static $deletedAtAttributeName = 'deleted_at';

    /**
     * @inheritdoc
     * @return ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function find()
    {
        return Yii::createObject(ActiveQuery::className(), [get_called_class()])
            ->where([self::$deletedAtAttributeName => null]);
    }

    public static function softDeleteAll($condition = null, $params = [])
    {
        return self::updateAll([self::$deletedAtAttributeName => time()], $condition, $params);
    }

    public function softDelete()
    {
        $this->skipUpdateAt();
        $this->deleted_at = time();
        return $this->save();
    }

    private function skipUpdateAt()
    {
        foreach ($this->getBehaviors() as $value) {
            if ($value instanceof TimestampBehavior) {
                $value->value = $this->getAttribute($value->updatedAtAttribute);
            }
        }
    }

}