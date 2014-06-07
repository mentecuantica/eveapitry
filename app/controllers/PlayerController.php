<?php

class PlayerController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return [

            'postOnly + delete', // we only allow deletion via POST request
        ];
    }


    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render(
            'view',
            [
                'model' => $this->loadModel($id),
            ]
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Player;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Player'])) {
            $model->attributes = $_POST['Player'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $this->render(
            'create',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Player'])) {
            $model->attributes = $_POST['Player'];
            if ($model->save()) {
                $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $this->render(
            'update',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['admin']);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Player');
        $this->render(
            'index',
            [
                'dataProvider' => $dataProvider,
            ]
        );
    }

    public function actionCharacters($id)
    {
        $player = $this->loadModel($id);
        $player_id = $player->player_id;
        $criteria = new CDbCriteria();
        $criteria->condition = "player_id = " . $player_id;
        $dataProvider = new CActiveDataProvider('CharacterList', ['criteria' => $criteria]);
        $this->render(
            'characters',
            [
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Player('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Player'])) {
            $model->attributes = $_GET['Player'];
        }

        $this->render(
            'admin',
            [
                'model' => $model,
            ]
        );
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Player the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Player::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Player $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'player-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
