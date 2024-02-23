<?php

namespace app\controllers;
use Yii;
use app\models\Employers;
use app\models\EmployersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Faker\Factory as Faker;
/**
 * EmployersController implements the CRUD actions for Employers model.
 */
class EmployersController extends Controller
{
    /**
     * @inheritDoc
     */
    public function actionGenerate()
    {
       $faker = Faker::create('ru_RU');

       if(Employers::find()->one()==null){
       for($i = 0; $i < 100; $i++)
       {
        $employer = new Employers();
        $employer->Фамилия = $faker->lastName;
        $employer->Имя = $faker->firstName;
        $employer->Отчество = $faker->middleName;
        $employer->Организация = $faker->company;
        $employer->Дата_Основания = $faker->date('Y-m-d');
        $employer->Вакансия = $faker->jobTitle;
        $employer->Телефон = $faker->phoneNumber;
        $employer->Email = $faker->email;
        $employer->Фото = $faker->imageUrl(640, 480, 'Работадатель', true);
        $employer->save(false);
       }
   
   }
   return $this->redirect(['index']);    

    }
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Employers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmployersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employers model.
     * @param string $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Employers();
    
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $image = UploadedFile::getInstance($model, 'Фото');
            $path = "img/employers/{$image->baseName}.{$image->extension}";
            $image->saveAs($path);
            $model->Фото = $path; 
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Employers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->Фото;
    
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $image = UploadedFile::getInstance($model, 'Фото');
    
            if ($image !== null) {
                $path = "img/employers/{$image->baseName}.{$image->extension}";
                if ($image->saveAs($path)) {
                    $model->Фото = $path;
                }
            } else {
                $model->Фото = $oldImage;
            }
    
            if ($model->validate()) {
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Employers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeleteall()
    {
        $models = Employers::find()->all();
        foreach ($models as $model) {
            $model->delete();
        }
    
        return $this->redirect(['index']);
    }

    /**
     * Finds the Employers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Employers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employers::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
