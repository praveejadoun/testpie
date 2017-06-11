<?php
/*$this->breadcrumbs=array(
	'Employees Subjects'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmployeesSubjects', 'url'=>array('index')),
	array('label'=>'Create EmployeesSubjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employees-subjects-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Employees Subjects</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'employees-subjects-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'employee_id',
		'subject_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>

<?php
$this->breadcrumbs=array(
	'Taxes'=>array('create'),
	'admin',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/employees/left_side');?>
    
    </td>
    

<?php echo $this->renderPartial('_form1', array('model'=>$model)); ?>
</div>
    </td>
  </tr>
</table>
