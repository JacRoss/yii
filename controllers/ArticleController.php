<?php

namespace app\controllers;

use app\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        $articles = Article::find()
            ->limit(5)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', ['articles' => $articles]);
    }

    public function actionShowById($id)
    {
        $article = Article::findOne($id);

        if (empty($article)) {
            throw new NotFoundHttpException('article not found');
        }

        return $this->render('show', ['article' => $article]);
    }

    public function actionSearch($query)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $articles = Article::find()
            ->where(['like', 'title', $query])
            ->asArray()
            ->select(['id', 'title'])
            ->all();

        return [
            'data' => $articles ?? []
        ];
    }
}
