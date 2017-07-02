<?php
$this->breadcrumbs=array(
	'Student Previous Datases'=>array('index'),
	'Create',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('students','New Admission');?></h1>
 <div id="jobDialog"></div>
                    <div class="contrht_bttns">
                        <ul>
                           
                            <li style="padding: 56px 15px 74px 15px;color:#666;"><?php echo CHtml::link('<span>'.Yii::t('students','View Profile').'</span>', array('/students/students/view','id' => $_REQUEST['id'])); ?></li>
                            
                        </ul>
                    </div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
 	</div>
    </td>
  </tr>
</table>