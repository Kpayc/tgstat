<?php

namespace frontend\Modules\Cabinet\Controllers;

use common\models\ActiveRecords\Link;
use common\models\Services\LinkService;
use frontend\Modules\Cabinet\Forms\CreateForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Default controller for the `cabinet` module
 */
class LinkController extends Controller
{
    private LinkService $linkService;

    public function __construct($id, $module, LinkService $linkService, $config = [])
    {
        $this->linkService = $linkService;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $links = new ActiveDataProvider([
            'query' => Link::find()
        ]);

        return $this->render('index', [
            'links' => $links
        ]);
    }

    public function actionCreate()
    {
        $model = new CreateForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($link = $this->linkService->storeLink(Yii::$app->user->identity, $model->getUrl())) {
                    return $this->redirect(Url::toRoute('link/index'));
                }
                $model->addErrors($link->getFirstErrors());
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
