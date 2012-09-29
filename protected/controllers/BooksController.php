<?php

ini_set('display_errors', true);
class BooksController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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
		$model = new BooksModel(new BooksActiveRecord());
		if (false === $model->getBookActiveRecordById($id)) {
			throw new CHttpException(404, 'Record Not Found.');
		}
		$this->render(
			'view', 
			array(
				'model' => $model->getBooksActiveRecord(),
			)
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		
		$model = new BooksModel(new BooksActiveRecord());	
		
		$params = Yii::app()->request->getPost('BooksActiveRecord'); 
			
		if (null !== $params && $model->save($params)) {	
			$this->redirect(
				array(
					'view', 
					'id' => $model->getBooksActiveRecord()->book_id,
				)
			);
		}
		
		$this->render(
			'create',
			array(
				'model' => $model->getBooksActiveRecord(),
			)
		);
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{		
		
		$model = new BooksModel(new BooksActiveRecord());	
		
		if (false === $model->getBookActiveRecordById($id)) {
			throw new CHttpException(
				404, 
				'Not Found.'
			);
		}
		
		$params = Yii::app()->request->getPost('BooksActiveRecord'); 
		
		if (null !== $params && $model->save($params)) {	
			$this->redirect(
				array(
					'view', 
					'id' => $model->getBooksActiveRecord()->book_id
				)
			);
		}

		$this->render(
			'update', 
			array(
				'model' => $model->getBooksActiveRecord(),
			)
		);
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (false === Yii::app()->request->isPostRequest) {
			throw new CHttpException(
				400, 
				'Invalid request. Please do not repeat this request again.'
			);			
		}
			
		$model = new BooksModel(new BooksActiveRecord());
		
		$model->deleteById($id);	
			
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) {
			$this->redirect(
				isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin')
			);
		}	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('BooksActiveRecord');
		$this->render(
			'index',
			array(
				'dataProvider' => $dataProvider,
			)
		);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new BooksActiveRecord('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['BooksActiveRecord'])) {
			$model->attributes = $_GET['BooksActiveRecord'];
		}
		$this->render('admin', array(
			'model'=>$model,
		));
	}

}
