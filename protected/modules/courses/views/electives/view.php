<?php
$this->breadcrumbs=array(
	'Electives'=>array('/courses'),
	$model->id,
);

/*$this->menu=array(
	array('label'=>'List Electives', 'url'=>array('index')),
	array('label'=>'Create Electives', 'url'=>array('create')),
	array('label'=>'Update Electives', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Electives', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Electives', 'url'=>array('admin')),
);*/
?>

<h1><?php echo Yii::t('Elective','View Electives');?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'elective_group_id',
		
	),
));*/ ?>

<div class="tableinnerlist" style="padding-right:25px;">
<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td><?php echo Yii::t('Electives','Name');?></td>
    <td><?php echo $model->name; ?></td>
  </tr>
   
    <tr>
    <td><?php echo Yii::t('Electives','Elective Group');?></td>
    <td><?php
    $posts=ElectiveGroups::model()->findByAttributes(array('id'=>$model->id));
	echo $posts->name;
	?></td>
  </tr>
    
</table>
</div>
