<?php

namespace app\controllers;

use HttpException;
use Milo\Github\Api;
use Milo\Github\Http\Response;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    const YII_ID = '3451238';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @param string $id
     * @return string
     */

    public function actionIndex($id = self::YII_ID)
    {
        $api = new Api();
        $contributors = null;
        $projectInfo = null;

        $projectInfo = $api->get('/repositories/:id', ['id' => $id]);
        if ($projectInfo->getCode() == Response::S200_OK){
            $projectInfo = json_decode($projectInfo->getContent());

            $contributorsUrl = $projectInfo->contributors_url;
            $contributors = $api->get($contributorsUrl);
            if ($contributors->getCode() == Response::S200_OK){
                $contributors = $api->decode(($contributors));
            }
        }

        if ($projectInfo) {
            return $this->render('index', [
                'projectInfo' => $projectInfo,
                'contributors' => $contributors,
            ]);
        } else {
            return $this->render('problem');
        }
    }

    /**
     * Search project
     *
     * @param string $s
     * @return string
     */
    public function actionSearch($s = ''){
        $api = new Api();
        $listProject = [];
        $this->view->params['search'] = $s;

        $listProjectRequest = $api->get('/search/repositories?q=' . str_replace(' ', '+', $s));
        if ($listProjectRequest->getCode() == Response::S200_OK){
            $listProject = $api->decode($listProjectRequest)->items;
        }

        return $this->render('search', [
            's' => $s,
            'projects' => $listProject
        ]);
    }

    public function actionUser($username = null){
        if (!$username){
            throw new HttpException(404);
        }

        $api = new Api();

        $user = $api->get('/users/:username', ['username' => $username]);
        if ($user->getCode() == Response::S200_OK){
            $user = $api->decode($user);
        } else {
            return $this->render('problem');
        }

        return $this->render('user', [
            'user' => $user
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
