<?php
/**
 * Created by PhpStorm.
 * User: xoka
 * Date: 19.09.17
 * Time: 15:20
 */

namespace app\models;


use yii\base\Model;

class DestroyFormRequest extends Model
{
    public $category;
    public $date;

    public function rules()
    {
        return [
            [['category', 'date'], 'required'],
            ['category', 'exist', 'targetClass' => Category::class, 'targetAttribute' => 'id'],
            //['date', 'date','format'=>'Y-m-d H:i']
        ];
    }

    public function attributeLabels()
    {
        return [
            'category' => 'Категория',
            'date' => 'Дата',
        ];
    }

    public function destroy()
    {
        if ($this->validate()) {
            Article::softDeleteAll(['and', ['category_id' => $this->category], ['<', 'created_at', strtotime($this->date)]]);
            return true;
        }
        return false;
    }
}