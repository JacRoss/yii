<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 19.09.17
 * Time: 13:33
 */

namespace app\components\SoftDeletes;

use \yii\db\ActiveQuery as YiiActiveQuery;

class ActiveQuery extends YiiActiveQuery
{

    public function where($condition, $params = [])
    {
        return parent::andWhere($condition, $params);
    }

}