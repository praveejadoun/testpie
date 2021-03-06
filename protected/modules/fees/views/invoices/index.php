<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>
<?php if($list!=NULL)
{?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top" width="75%">
<div class="cont_right formWrapper">
<h1><?php echo Yii::t('invoices','Manage Invoices');?></h1>
<div class="overview" >
    
    <div class="overviewbox ovbox1" style="width: 170px;">
    	<h1><?php echo Yii::t('invoices','<strong>Total Invoices</strong>');?></h1>
        <?php //  $tot =   Students::model()->countByAttributes(array('is_active'=> 1,'is_deleted'=>0)); ?>
        <div class="ovrBtm"><?php echo $total ?></div>
    </div>
    <div class="clear"></div>
    
     <div class="overviewbox ovbox2" style="width: 170px;left: 180px;top: 10px;">
    	<h1><?php echo Yii::t('invoices','<strong>Paid Invoices</strong>');?></h1>
        <?php   $tot = FinanceFeeInvoices::model()->countByAttributes(array('status'=> 1)); ?>
        <div class="ovrBtm"><?php echo $tot ?></div>
    </div>
    <div class="clear"></div>
    
     <div class="overviewbox ovbox3" style="width: 170px;left: 360px;top: 10px;">
    	<h1><?php echo Yii::t('invoices','<strong>Un-Paid Invoices</strong>');?></h1>
        <?php   $tot = FinanceFeeInvoices::model()->countByAttributes(array('status'=> 0)); ?>
        <div class="ovrBtm"><?php echo $tot ?></div>
    </div>
    <div class="clear"></div>

    
    <div class="overviewbox ovbox4" style="width: 170px;position: absolute;left: 540px;top: 10px;">
    	<h1><?php echo Yii::t('invoices','<strong>Cancelled</strong>');?></h1>
        <?php   $tot = FinanceFeeInvoices::model()->countByAttributes(array('status'=> 2)); ?>
        <div class="ovrBtm"><?php echo $tot ?></div>
    </div>
    <div class="clear"></div>
</div>
<?php 
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('invoices-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div>
<div style="margin-top:20px; position:relative;">
                        <div class="clear"></div>
                        <div style="display: inline-block;margin-bottom: 14px;margin-top: 14px; width: 100%;">
                            <div style="float:left;">

                                <div class="ea_pdf" style="top:0px; right:6px;">
                                    <?php echo CHtml::link('<img src="images/pdf-but.png">', array('invoices/indexpdf'), array('target' => '_blank')); ?>
                                </div>
                            </div> 

                        </div>
                    </div>
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoices-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'afterAjaxUpdate' => "function(){jQuery('#created_at_search').datepicker({'dateFormat': 'yy-mm-dd'})}",
	'pager'=>array(
                        'cssFile'=>Yii::app()->baseUrl.'/css/formstyle.css',
                         
//            'class'=>'CLinkPager',
            'maxButtonCount'=>5, 
//            'pageSize' => 05,
//            'firstPageLabel'=>'First',
//            'lastPageLabel'=>'Last',
//            'nextPageLabel'=>'Next',
//            'prevPageLabel'=>'Previous',
//            'header'=>'',

       
                    ),
 	//'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
        // style to fix the overflow of table'table-layout: fixed;'.
        'columns'=>array(
	array('name'=>'invoice_id','header' => 'Invoice Id',
				'type'=>'raw',
                                
                                //'htmlOptions' => array('style' => 'width:50px;'),
				'value' => '$data->invoice_id'),
				
	array('name'=>'finance_fee_category_id',
                                'header' => 'Fee Category',
				'type'=>'raw',
				'value'=>'$data->category->name',
                                'filter' => CHtml::listData(FinanceFeeCategories::model()->findAll("is_deleted=:x",array(':x'=>0)),'id','name'),
                                
             ),
        
        
        array('name'=>'student_id',
                                'header' => 'Student Name',
				'type'=>'raw',
                              //'filter' => CHtml::activeTextField($model, 'student_id'),
                                'value'=>function($data){
                                        echo $data->student->first_name.' '.$data->student->last_name;
                                }
             ),
        
         array('name'=>'status',
				'type'=>'raw',
                               	'value'=>'$data->getStatus($data)',
                                'filter' => CHtml::dropDownList(
                                        'FinanceFeeInvoices[status]', $model->status,  
                array(
                    ''=>'All',
                    '1'=>'Paid',
                    '0'=>'Un-Paid',
                    '2'=>'Cancelled'
                ),
                array('options'=>array('$data->active'=>'selected'))                                   
             ),
            ),         
        array('name'=>'created_at',
                                'header' => 'Invoice Date',
                                'type'=>'raw',
                                'value'=>'$data->created_at',
                                'filter' =>$this->widget('zii.widgets.jui.CJuiDatepicker', array(
                'model'=>$model,
                'attribute'=>'created_at',
                'htmlOptions' => array(
                    'id' => 'created_at_search'
                ), 
                'options' => array(
                    'dateFormat' => 'yy-mm-dd'
                )
            ), true)

            ),
        
		array(
			'header'=>'Action',
			'class'=>'CButtonColumn',
			'htmlOptions' => array('style'=>'width:30px;'),
			 'template' => '{view}',
			 'headerHtmlOptions'=>array('style'=>'font-size:12px; font-weight:bold;')
			 
		),
	),
                    
)); ?>

 

    <div class="pdtab_Con" style="width:100%">
        <!--<div style="font-size:13px; padding:5px 0px"><?php //echo Yii::t('invoices','<strong>Fee Categories</strong>');?></div>-->

<!--            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tbody>
                    <tr class="pdtab-h">
                    <td align="center" height="18"><?php //echo Yii::t('invoices','Invoice ID');?></td>
                    <td align="center"><?php //echo Yii::t('invoices','Recipient');?></td>
                    <td align="center"><?php //echo Yii::t('invoices','Fee Category');?></td>
                    <td align="center"><?php //echo Yii::t('invoices','Amount');?></td>
                    <td align="center"><?php //echo Yii::t('invoices','Balance');?></td>
                    <td align="center"><?php //echo Yii::t('invoices','Status');?></td>
                    <td align="center"><?php //echo Yii::t('invoices','Actions');?></td>
                    </tr>
                </tbody>
                <?php //foreach($list as $list_1) { ?>
                <tbody>
                    <tr>
                        <td align="center"><?php //echo $list_1->invoice_id;?></td>
                        <?php //$student = Students::model()->findByAttributes(array('id'=>$list_1->student_id));?>
                        <td align="center"><?php // echo CHtml::link($student->first_name . '  ' . $student->middle_name . '  ' . $student->last_name, array('/students/students/view', 'id' => $student->id),array('style'=>'color:#FF6600;'));?></td>
                        <?php // $feecategory = FinanceFeeCategories::model()->findByAttributes(array('id'=>$list_1->finance_fee_category_id));?>
                        <td align="center"><?php // echo $feecategory->name;?></td>
                        <td align="center"><?php // echo $list_1->amount;?></td>
                        <td align="center"><?php // echo $list_1->amount_payable;?></td>
                        <td align="center">
                        <?php // $status = $list_1->status;
//                                if($status==0){
//                                    echo "Unpaid";
//                                }
//                                elseif ($status==1) {
//                                    echo "paid";
//                            }
//                            else {
//                                echo "Cancelled";
//                            }
                            ?>
                        </td>    
                        <td align="center"><?php // echo CHtml::link('View',array('invoices/view','id'=>$list_1->id),array('style'=>'color:#FF6600'));?></td>
                        
                    </tr>
                  <?php //  echo CHtml::link(Yii::t(
//  'Logcategory','Delete'), array('delete', 'id' =>$logcategory_1->id,'class'=>'grdel'),array('confirm'=>"Are you sure You Want To Delete this LogCategory?")); ?>
                </tbody>
                
                <?php // } ?>

            </table>-->
<!--             <div class="list_contner" style="margin: 0px 0px 0px 0px;"> 
              <div class="pagecon">
                                    <?php
//                                    $this->widget('CLinkPager', array(
//                                        'currentPage' => $pages->getCurrentPage(),
//                                        'itemCount' => $item_count,
//                                        'pageSize' => $page_size,
//                                        'maxButtonCount' => 5,
//                                        'nextPageLabel'=>'My text >',
//                                        'header' => '',
//                                        'htmlOptions' => array('class' => 'pages'),
//                                    ));
                                    ?>
                                </div>
                 <div class="clear"></div>
             </div>-->
            
    </div>

</div>
    </td>
   </tr>
</table>
<?php } else { ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
    <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div style="padding:20px 20px">
<div class="yellow_bx" style="background-image:none;width:680px;padding-bottom:45px;">
                
                	<div class="y_bx_head" style="width:650px;">
                    	It appears that this is the first time that you are using this Open-School Setup. For any new installation we recommend that you configure the following:
                    </div>
                    <div class="y_bx_list" style="width:650px;">
                    	<h1><?php echo CHtml::link(Yii::t('students','Create New Students'),array('create')) ?></h1>
                        <p>Before Creating Students, make sure you created <?php echo CHtml::link(Yii::t('students','Student Categories'),array('/students/studentCategory')) ?> and the <?php echo CHtml::link('Courses &amp; Batches',array('/courses/courses/create')) ?> for enrolling Students.</p>
                    </div>
                    
                </div>

                </div>
    
    
    </td>
  </tr>
</table>

<?php } ?>

<script type ="text/javascript">
    $('body').click(function(){
        $('#name').hide();
        $('#gender').hide();
    });
    
    $('.filterbxcntnt_inner').click(function (event) {
        event.stopPropagation();
    });

    $('.load_filter').click(function (event) {
        event.stopPropagation();
    });
    </script>
    
    <script language="javascript">
    function hide(id)
    {
        $(".drop").hide();
        $('#' + id).toggle();
    }
</script>
    