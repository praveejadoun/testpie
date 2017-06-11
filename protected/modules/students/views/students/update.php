<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1>Update Student <?php echo $model->first_name; ?></h1>

<div id="jobDialog"></div>
                    <div class="contrht_bttns">
                        <ul>
                           
                            <li style="padding: 56px 15px 74px 15px;"><?php echo CHtml::link('<span>'.Yii::t('students','View Profile').'</span>', array('view','id'=>$model->id)); ?></li>
                            
                        </ul>
                    </div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
 	</div>
    </td>
  </tr>
</table>