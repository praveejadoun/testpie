<?php
$this->breadcrumbs=array(
	'Fees'=>array('index'),
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
        <h1><?php echo Yii::t('subscription','Create Subscription');?></h1>
        <?php
//                Yii::app()->clientScript->registerScript(
//                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
//                );
                ?>
                    <?php if(Yii::app()->user->hasFlash('error')):?>
                    <div class="flash-success" style="color:white; padding:8px; font-size:14px;border: 1px #999999 solid;background:rgb(255,0,0);border-radius: 4px;">

                    <!--<div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">-->
                        <?php echo Yii::app()->user->getFlash('error'); ?>
                    </div>
                    <?php endif; ?>
            
             <?php
//                Yii::app()->clientScript->registerScript(
//                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
//                );
                ?>
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                    <div class="flash-success" style="color:white; padding:8px; font-size:14px;border: 1px #999999 solid;background:rgb(35, 161, 16);border-radius: 4px;">

                    <!--<div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">-->
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
        <div class="formCon">
        <div class="formConInner">
            <?php
            $feecategory = FinanceFeeCategories::model()->findAll("id=:x",array(':x' => $_REQUEST['id']));
            foreach( $feecategory as $feecategory_1){
            ?>
           <div><strong>Fee Category :</strong> <?php echo $feecategory_1->name; ?></div>
                                    <br />
           <div><strong>Date Created :</strong> <?php echo $fee = date("M d.Y", strtotime($feecategory_1->created_at)); ?> </div>
                                    <br />
           <div><strong>Description :</strong> <?php echo $feecategory_1->description; ?> </div>
           <br/>
           <?php $ay = AcademicYears::model()->findByAttributes(array('status'=>'0'))?>
           <div><strong>Academic Year :</strong> <?php echo $ay->start_date.' to '.$ay->end_date;?></div>
            <?php } ?>
        </div>
        </div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
    
    </td>
  </tr>
</table>