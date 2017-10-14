<?php
$this->breadcrumbs=array(
	'Fees'=>array('/fees'),
        'Taxes'=>array('admin'),
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
    <h1><?php echo Yii::t('taxes','Create Tax');?></h1>
     <div class="box-one">
                            <div class="bttns_addstudent-n">
                                <ul style="margin: 0px 0px -37px 625px;">
                                    <li><?php echo CHtml::link(Yii::t('taxes','Manage'),array('admin'),array('class'=>'formbut-n')) ?></li>
                                     
                                       
                                </ul>
                            </div>
                        </div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
    </td>
  </tr>
</table>