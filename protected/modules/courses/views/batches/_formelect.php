
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employees-subjects-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="formCon">

<div class="formConInner">
    <table>
        <tr>
  <td><?php echo $form->labelEx($model, 'id'); ?></td>
<td>
<?php
$regions = CHtml::listData(ElectiveGroups::model()->findAll(array('order' => 'id')), 'id', 'name');
echo $form->dropDownList($model, 'id', $regions, array(
'prompt' => '–select region–',
'ajax' => array(
'type' => 'POST',
'url' => CController::createUrl('batches/districts'),
'update' => '#Customer_district_id',
)
));
?>
</td>
<td><?php echo $form->error($model, 'elective_group_id'); ?></td>
<td><?php echo $form->labelEx($model, 'elective_group_id'); ?></td>
<td><?php echo $form->dropDownList($model, 'elective_group_id', array(), array('style' => 'width:300px;')); ?></td>
<td><?php echo $form->error($model, 'elective_group_id'); ?></td>
</tr>
</table>
</div>
</div>



   
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

<?php $this->endWidget(); ?>
<script>
function show()
{
	$("#success").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow")
}

</script>