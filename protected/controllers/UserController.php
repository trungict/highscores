<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';
	public $_identity;

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
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'roles'=>array('member'),
			),
			array('allow',
				//'actions' => array('view','delete'), // allow admin user to perform 'admin' and 'delete' actions
				'roles' => array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model = new UserForm('register');
		$newUser = new User;
		$this->layout='//layouts/column1';

		// if it is ajax validation request

		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form')
		{
				echo CActiveForm::validate($model);
				Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['UserForm']))
		{
			$model->attributes=$_POST['UserForm'];

			if ($model->validate()) {
					$newUser->username = $model->username;
					$newUser->email = $model->email;
					$newUser->password = $newUser->hashPassword($model->password);
					$newUser->joined = new CDbExpression('NOW()');
					$newUser->role = 'member';
					if($newUser->save()) {

							// Everything saved, redirect
							if($this->_identity===null)
							{
								$this->_identity=new UserIdentity($model->username,$model->password);
								$this->_identity->authenticate();
							}
							if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
							{
								Yii::app()->user->login($this->_identity,0);
							}
							$this->redirect(Yii::app()->user->returnUrl);
					}
				}
			}
		 // display the register form
		 $this->render('create',array('model'=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatePassword($id)
	{
		$model= new UserForm('updatePassword');
		$user = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserForm']))
		{
			$model->attributes=$_POST['UserForm'];
			if($model->validate()) {
				$user->password = $user->hashPassword($model->newPassword);
				if($user->save()){
					Yii::app()->user->setFlash('success', "Bạn đã thay đổi mật khẩu thành công!");
					$this->redirect(array('user/panel','id' => $id));
				}
			}
		}

		$this->render('updatePassword',array(
			'model'=>$model,
		));
	}
	public function actionUpdateEmail($id)
	{
		$model= new UserForm('updateEmail');
		$user = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserForm']))
		{
			$model->attributes=$_POST['UserForm'];
			if($model->validate()) {
				$user->email = $model->newEmail;
				if($user->save()){
					Yii::app()->user->setFlash('success', "Bạn đã thay đổi email thành công!");
					$this->redirect(array('user/panel','id' => $id));
				}
			}
		}

		$this->render('updateEmail',array(
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
		$this->cacheId = $id;
		$this->loadModel($id)->delete();
		$children = Board::model()->findAll(
                'author_id=:parentId',
                array(
                        ':parentId'=>$this->cacheId
                )
        );

        foreach($children as $child)
        {
                $child->delete();
        }

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionPanel($id){
		$model=User::model()->findByPk($id);
		$criteria = new CDbCriteria();
		$criteria->compare('author_id',$id);
		$count = Board::model()->count($criteria);
		$this->render('userPanel',array('model' => $model, 'count' => $count));
	}
}
