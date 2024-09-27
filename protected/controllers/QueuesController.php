<?php

class QueuesController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('allow',  // allow all users to perform 'loadServices'
            'actions' => array('loadServices'),
            'users' => array('*'), // Allow for all users
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
		$model = new Queues;
	
		if (isset($_POST['Queues'])) {
			$model->attributes = $_POST['Queues'];
			$model->user_id = Yii::app()->user->id; // Ambil user ID dari login
	
			// Generate queue number if not set
			if (empty($model->queue_number)) {
				// Generate the queue number (e.g., based on total count for the day)
				$latestQueue = Queues::model()->find(array(
					'condition' => 'date(created_at) = CURDATE()',
					'order' => 'queue_number DESC',
				));
	
				// Generate next queue number
				$model->queue_number = $latestQueue ? $latestQueue->queue_number + 1 : 1;
			}
	
			if ($model->save()) {
				// Mencari nomor antrian terbaru untuk user yang sama dan status 'waiting'
				$theQueue = Queues::model()->find(array(
					'condition' => 'queue_status = :status AND user_id = :user_id AND DATE(created_at) = CURDATE()',
					'params' => array(
						':status' => 'waiting',
						':user_id' => Yii::app()->user->id,
					),
					'order' => 'created_at DESC', // Mengurutkan berdasarkan yang terbaru
					'limit' => 1, // Batasi hasil menjadi 1
				));
	
				// Jika antrian ditemukan, ambil nomor antriannya
				if ($theQueue !== null) {
					$queueNumber = $theQueue->queue_number;
				} else {
					$queueNumber = 'No waiting queue found';
				}
	
				// Kirim variabel ke view
				$this->render('create', array('model' => $model, 'queueNumber' => $queueNumber));
				return;
			}
		}
	
		// Render the form if not submitted or validation fails
		$this->render('create', array('model' => $model));
	}
	

	public function actionLoadServices()
	{
		if (isset($_POST['merchant_id'])) {
			$merchantId = (int)$_POST['merchant_id'];
			$services = Services::model()->findAllByAttributes(array('merchant_id' => $merchantId));
			$data = CHtml::listData($services, 'id', 'name');

			foreach ($data as $value => $name) {
				echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
			}
		}
	}

	
	private function generateQueueNumber($serviceId)
	{
		// Custom logic to generate queue number based on serviceId
		$latestQueue = Queues::model()->findByAttributes(array('service_id' => $serviceId), array('order' => 'id DESC'));
		if ($latestQueue) {
			return $latestQueue->queue_number + 1;
		}
		return 1; // First queue for the service
	}
	

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		
		if (isset($_POST['Queues'])) {
			$model->attributes = $_POST['Queues'];
			// var_dump($model->attributes);die;
			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
	
		$this->render('update', array(
			'model' => $model,
		));
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		// Mendapatkan ID pengguna yang sedang login
		$userId = Yii::app()->user->id;
	
		// Membuat instance CDbCriteria dengan kondisi pencarian berdasarkan user_id
		$criteria = new CDbCriteria;
		$criteria->compare('user_id', $userId);
	
		// Membuat CActiveDataProvider dengan kriteria yang telah disesuaikan
		$dataProvider = new CActiveDataProvider('Queues', array(
			'criteria' => $criteria,
			'sort' => array(
				'defaultOrder' => 'created_at DESC', // Mengurutkan data berdasarkan tanggal terbaru
			),
		));
	
		// Render view dengan data provider yang telah disesuaikan
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Queues('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Queues']))
			$model->attributes=$_GET['Queues'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Queues the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Queues::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Queues $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='queues-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
