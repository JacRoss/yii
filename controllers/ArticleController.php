<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\DestroyFormRequest;
use yii\helpers\ArrayHelper;
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

    public function actionWeekly()
    {
        $weekly = [];
        $startWeek = strtotime('monday this week');
        $endWeek = strtotime('sunday this week');

        $articles = Article::find()
            ->where(['between', 'created_at', $startWeek, $endWeek])
            ->orderBy('created_at')
            ->all();

        foreach ($articles as $article) {
            $weekly[$article->createdDayOfWeek][$article->category->name ?? null][] = $article;
        }

        return $this->render('weekly', ['weekly' => $weekly]);
    }

    public function actionDestroy()
    {
        $categories = Category::find()->all();

        $model = new DestroyFormRequest();

        if ($model->load(\Yii::$app->request->post()) && $model->destroy()) {
            return $this->redirect(['article/weekly']);
        }

        return $this->render('destroy',
            [
                'model' => $model,
                'categories' => ArrayHelper::map($categories, 'id', 'name')
            ]);
    }
}
