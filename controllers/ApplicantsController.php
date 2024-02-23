<?php

namespace app\controllers;
use Yii;
use app\models\Applicants;
use app\models\ApplicantsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Faker\Factory as Faker;
/**
 * ApplicantsController implements the CRUD actions for Applicants model.
 */
class ApplicantsController extends Controller
{
    /**
     * @inheritDoc
     */

     public function actionGenerate()
     {
        $faker = Faker::create('ru_RU');

        if(Applicants::find()->one()==null){
        for($i = 0; $i < 100; $i++)
        {
          $applicant = new Applicants();
          $applicant->Фамилия = $faker->lastName;
          $applicant->Имя = $faker->firstName;
          $applicant->Отчество = $faker->middleName;
          $applicant->Образование = $faker->jobTitle;
          $applicant->Специальность = $faker->jobTitle;
          $applicant->Дата_Рождения = $faker->date('Y-m-d');
          $applicant->Телефон = $faker->phoneNumber;
          $applicant->Email = $faker->email;
          $applicant->Фото = $faker->imageUrl(640, 480, 'Соискатель', true);
          $applicant->save(false);
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
     * Lists all Applicants models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ApplicantsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Applicants model.
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
     * Creates a new Applicants model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Applicants();
    
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $image = UploadedFile::getInstance($model, 'Фото');
            $path = "img/applicants/{$image->baseName}.{$image->extension}";
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
     * Updates an existing Applicants model.
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
                $path = "img/applicants/{$image->baseName}.{$image->extension}";
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
     * Deletes an existing Applicants model.
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
        $models = Applicants::find()->all();
        foreach ($models as $model) {
            $model->delete();
        }
    
        return $this->redirect(['index']);
    }

    /**
     * Finds the Applicants model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id ID
     * @return Applicants the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Applicants::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
