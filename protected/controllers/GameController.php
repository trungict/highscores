<?php

class GameController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	private $cacheId;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionPlayer(){
		if(isset($_GET['name'])){
			$criteria=new CDbCriteria;
			$criteria->compare('player',$_GET['name']);
			$criteria->order = 'score DESC';
			$model = Game::model()->findAll($criteria);
		}
		$this->render('player',array('models' => $model));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Game;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		if(isset($_GET['board_id'])) {
			if(isset($_POST['Game']))
			{
				$model->attributes=$_POST['Game'];
				$model->board_id = $_GET['board_id'];
				if($model->save()) {
					Yii::app()->user->setFlash('success', 'Bạn đã cập nhật BXH thành công!');
					$this->redirect(Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$_GET['board_id']);
				}
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Game']))
		{
			$model->attributes=$_POST['Game'];
			if($model->validate()){
				if($model->save()) {
					Yii::app()->user->setFlash('success', 'Bạn đã cập nhật BXH thành công!');
					$this->redirect(Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$model->board_id);
				}
			}

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$cacheId = $model->board_id;
		$model->delete();
		Yii::app()->user->setFlash('success', "Bạn đã xóa bảng thành công!");
		$this->redirect(Yii::app()->request->baseUrl.'/index.php/game/index?board_id='.$cacheId);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if(isset($_GET['board_id'])) {
			if(isset($_GET['topPlayer'])) $sql ='SELECT *
											FROM tbl_game
											WHERE score = (SELECT MAX(score) FROM tbl_game AS g WHERE g.player = tbl_game.player) AND board_id='.$_GET['board_id'].'
											ORDER BY score DESC,player ASC
											LIMIT 10;';
			else if(isset($_GET['topGame']))$sql = 'SELECT *
											FROM tbl_game
											WHERE board_id = '.$_GET['board_id'].'
											ORDER BY score DESC, player ASC
											LIMIT 10;';
			else $sql = 'SELECT *
					FROM tbl_game
					WHERE board_id = '.$_GET['board_id'].'
					ORDER BY score DESC, player ASC;';
			$board = Board::model()->findByPk($_GET['board_id']);
			$model = Game::model()->findAllBySql($sql);
			$count = Game::model()->countBySql($sql);
			$this->render('index',array('models'=>$model, 'count' => $count,'board' => $board));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Game('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Game']))
			$model->attributes=$_GET['Game'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Game the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Game::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Game $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='game-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
