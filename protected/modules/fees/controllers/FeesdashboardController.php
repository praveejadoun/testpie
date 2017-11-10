<?php

class FeesdashboardController extends RController
{
    
     public function accessRules() 
        {
            return array(
                array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'Remove','Remove1'),
                'users' => array('*'),
                ),
            );
        }
	public function actionIndex()
	{
             $criteria = new CDbCriteria;
        $criteria->compare('is_deleted', 0);
        $total = FinanceFeeCategories::model()->count($criteria);
        $criteria->order = 'id DESC';
        $criteria->limit = '10';
        $posts = FinanceFeeCategories::model()->findAll($criteria);


        $this->render('index', array(
            'total' => $total, 'list' => $posts
        ));
		
	}
        
        public function actionView()
        {
            $this->render('view');
        }
        public function actionRemove()
        {
            $model= FinanceFeeCategories::model()->findByAttributes(array('id'=>$_REQUEST['id']));
            $model->saveAttributes(array("is_deleted"=>'1'));
            $subscription = FinanceFeeSubscription::model()->findByAttributes(array('fee_category_id'=>$_REQUEST['id']));
            $subscription->delete();
            $this->redirect(array('feesdashboard/'));
        }
         public function actionRemove1()
        {
            $model= FinanceFeeCategories::model()->findByAttributes(array('id'=>$_REQUEST['id']));
            $model->saveAttributes(array("is_deleted"=>'1'));
            $this->redirect(array('feesdashboard/'));
        }
}