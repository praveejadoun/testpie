<?php
$this->breadcrumbs=array(
	'Courses'=>array('/courses'),
	$model->id,
);
?>
<?php
/*

$this->menu=array(
	array('label'=>'List Courses', 'url'=>array('index')),
	array('label'=>'Create Courses', 'url'=>array('create')),
	array('label'=>'Update Courses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Courses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);*/
?>

<?php 
echo $this->renderPartial('managecourse', array('val1'=>$val1)); ?>


<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_name',
		'code',
		'section_name',
		'is_deleted',
		'created_at',
		'updated_at',
	),
)); */?>
 