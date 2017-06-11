 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui-style.css" />
<?php
$this->breadcrumbs=array(
	'Subjects'=>array('/courses'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'jobDialog',
                'options'=>array(
                    'title'=>Yii::t('job','Update'),
                    'autoOpen'=>true,
                    'modal'=>'true',
                    'width'=>'auto',
                    'height'=>'auto',
					'resizable'=>false,
                ),
                ));
				?>



<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog');?>
