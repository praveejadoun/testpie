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
            <?php } ?>
        </div>
        </div>
    <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
    
    </td>
  </tr>
</table>