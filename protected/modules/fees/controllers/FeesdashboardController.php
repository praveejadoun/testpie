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
                $pages = new CPagination($total);
                $pages->setPageSize(Yii::app()->params['listPerPage']);
                $pages->applyLimit($criteria);  // the trick is here!
                $posts = FinanceFeeCategories::model()->findAll($criteria);


                $this->render('index', array(
                    'total' => $total, 'list' => $posts,

                    'pages' => $pages,
                    'item_count' => $total,
                    'page_size' => Yii::app()->params['listPerPage'],
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
            Yii::app()->user->setFlash('success','Successfully Removed the Fees Category');
            $this->redirect(array('feesdashboard/'));
        }
         public function actionRemove1()
        {
            $model= FinanceFeeCategories::model()->findByAttributes(array('id'=>$_REQUEST['id']));
            $model->saveAttributes(array("is_deleted"=>'1'));
             Yii::app()->user->setFlash('success','Successfully Removed the Fees Category');
            $this->redirect(array('feesdashboard/'));
        }
}