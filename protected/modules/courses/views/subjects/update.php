 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" />
<?php
//$this->breadcrumbs=array(
//	'Subjects'=>array('/courses'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);
?>

<?php
//$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
//                'id'=>'jobDialog',
//                'options'=>array(
//                    'title'=>Yii::t('job','Update'),
//                    'autoOpen'=>true,
//                    'modal'=>'true',
//                    'width'=>'auto',
//                    'height'=>'auto',
//					'resizable'=>false,
//                ),
//                ));
				?>



<?php // echo $this->renderPartial('_form1', array('model'=>$model)); ?>

<?php // $this->endWidget('zii.widgets.jui.CJuiDialog');?>

 
<!--  <link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" />-->
<?php
$this->breadcrumbs=array(
	'Subjects'=>array('/courses'),
	'Create',
);?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
        

<h1><?php echo Yii::t('courses','Update Subject');?></h1>

<?php echo $this->renderPartial('_form2', array('model'=>$model,'id'=>$id,'batch_id'=>$_REQUEST['id'])); ?>

 	</div>
    </td>
  </tr>
</table>



