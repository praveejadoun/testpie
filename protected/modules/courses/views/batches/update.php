 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" />
<?php
$this->breadcrumbs=array(
	'Batches'=>array('/courses'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);


?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    
    <?php $this->renderPartial('/courses/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right">
<h1>Update Batch</h1>
     
<?php
/*$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog123',
                'options'=>array(
                    'title'=>Yii::t('job','Update'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'400',
                    'height'=>'auto',
					'resizable'=>false,
					
                ),
                ));*/
				?>
                

<?php echo $this->renderPartial('_form1', array('model'=>$model,'batch_id'=>$val1)); ?>
</div>
    </td>
  </tr>
</table>
<?php // $this->endWidget('zii.widgets.jui.CJuiDialog');?>