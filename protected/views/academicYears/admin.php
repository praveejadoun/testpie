<?php
$this->breadcrumbs = array(
    'Employee Categories' => array('admin'),
    'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('employee-categories-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">

            <?php $this->renderPartial('left_side'); ?>

        </td>
        <td valign="top">
            <div class="cont_right formWrapper" >
                <h1><?php echo Yii::t('employees', 'Manage Employee Categories'); ?></h1>

                <div class="edit_bttns" style="top:20px; right:20px;">
                    <ul>
                        <li> <?php echo CHtml::link(Yii::t('employees', '<span>Add Academic Year</span>'), array('create'), array('class' => 'addbttn last ')); ?></li>
                    </ul>
                </div>
                <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
                <div id="statusMsg">    
                <?php if (Yii::app()->user->hasFlash('notification')): ?>
                    <div class="flash-success" style="color:#F00; padding-left:150px; font-size:12px">
                    <?php echo Yii::app()->user->getFlash('notification'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
                <div class="search-form" style="display:none">
                <?php
                //$this->renderPartial('_search',array(
                //'model'=>$model,
//)); 
                ?>
                </div><!-- search-form -->

                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'employee-categories-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'pager' => array('cssFile' => Yii::app()->baseUrl.'/css/formstyle.css', 'header' => ''),
               'cssFile' => Yii::app()->baseUrl . '/css/formstyle.css',
                 
                'columns' => array(
                /* 'id', */
                'name',
               //'start_date',
                    //'end_date',
                    //'description',
                     array(
                'name' => 'start_date',
                'value' => '$data->start_date',
                'filter' =>true,
                ),
                    array('name' => 'end_date',
                            'value' => '$data->end_date',
                              'filter' =>true),
                    array('name' => 'description',
                            'value' => '$data->description',
                            'filter' =>true
                                ),
                  array('name'=> 'status',
                        'value'=>'($data->status!= 0)? InActive  : Active ',
                        'filter'=>true),
                array(
                'class' => 'CButtonColumn',
                 'afterDelete'=>'function(link,notification,data){ if(notification) $("#statusMsg").html(data); }',  
                'template' => '{view}{update}{delete}',
                ),
                ),
                ));
                ?>
            </div>
        </td>
    </tr>
</table>