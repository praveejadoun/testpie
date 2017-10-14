<?php
$this->breadcrumbs=array(
	'Fees'=>array('/fees'),
//	$model->id=>array('view','id'=>$model->id),
	'Taxes',
);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
      <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
<div class="cont_right formWrapper">
     <h1><?php echo Yii::t('taxes','Taxes');?></h1>
      <div class="box-one">
                            <div class="bttns_addstudent-n">
                                <ul style="margin: 0px 0px -37px 625px;">
                                    <li><?php echo CHtml::link(Yii::t('taxes','Create'),array('create'),array('class'=>'formbut-n')) ?></li>
                                     
                                       
                                </ul>
                            </div>
                        </div>
 <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'taxes-grid',
	'dataProvider'=>$model->search(),
	'pager'=>array('cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css'),
 	'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
	'columns'=>array(
		
		
		/*array(
		    'header'=>'Student Name',
			'value'=>array($model,'studentname'),
			'name'=> 'firstname',
            'sortable'=>true,

		
		),*/
		'label',
		'value',
		/*array(
			'header'=>'Grades',
			'value'=>array($model,'getgradinglevel'),
			'name'=> 'grading_level_id',
		)*/
		'status',
                'created_at',
		//'is_failed',
		/*
		'grading_level_id',
		array(
		    'name'=>'subject_id',
			'value'=>array($model,'subjectname')
		
		),
		'minimum_marks',
		'grading_level_id',
		'weightage',
		'event_id',
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'CButtonColumn',
			/*'buttons' => array(
                                                     
														'update' => array(
                                                        'label' => 'update', // text label of the button
														
                                                        'url'=>'Yii::app()->createUrl("/examination/examScores/update", array("sid"=>$data->id,"id"=>$_REQUEST["id"]))', // a PHP expression for generating the URL of the button
                                                      
                                                        ),
														
                                                    ),*/
													'template'=>'{update} {delete}',
													'afterDelete'=>'function(){window.location.reload();}'
													
		),
		
	),
)); ?>
</div>
    </td>
  </tr>
</table>