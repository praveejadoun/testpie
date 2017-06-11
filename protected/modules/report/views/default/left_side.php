<!--upgrade_div_starts-->
<!--<div class="upgrade_bx">
	<div class="up_banr_imgbx"><a href="http://open-school.org/contact.php" target="_blank"><img src="http://tryopenschool.com/images/promo_bnnr_innerpage.png" width="231" height="200" /></a></div>
	<div class="up_banr_firstbx">
   	  <h1>You are Using Community Edition</h1>
	  <a href="http://open-school.org/contact.php" target="_blank">upgrade to premium version!</a>
    </div>
	
</div>-->
<!--upgrade_div_ends-->
<div id="othleft-sidebar">
             <!--<div class="lsearch_bar">
             	<input type="text" value="Search" class="lsearch_bar_left" name="">
                <input type="button" class="sbut" name="">
                <div class="clear"></div>
  </div>-->    <h1><?php echo Yii::t('default','MANAGE REPORTS');?></h1>   
                    <?php
			function t($message, $category = 'cms', $params = array(), $source = null, $language = null) 
{
    return $message;
}

			$this->widget('zii.widgets.CMenu',array(
			'encodeLabel'=>false,
			'activateItems'=>true,
			'activeCssClass'=>'list_active',
			'items'=>array(
					array('label'=>''.Yii::t('report','Advanced Report').'<span>'.Yii::t('report','Student Advanced Report').'</span>', 'url'=>array('default/advancedreport') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='default' and (Yii::app()->controller->action->id=='advancedreport') ? true : false),
					    ),  
						                
					
                            
                            
						   array('label'=>''.'<h1>'.Yii::t('report','ASSESSMENT REPORT').'</h1>'), 
					
						array('label'=>Yii::t('report','Batch Assessment Report').'<span>'.Yii::t('report','Batch Wise Assessment Report').'</span>', 'url'=>array('default/assessment'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='default' and (Yii::app()->controller->action->id=='assessment')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				array('label'=>Yii::t('report','Student Assessment Report').'<span>'.Yii::t('report','Student Assessment').'</span>', 'url'=>array('default/studentexam'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='default' and (Yii::app()->controller->action->id=='studentexam')), 'itemOptions'=>array('id'=>'menu_1')
                                                     ),
                                               
                            
						  array('label'=>''.'<h1>'.Yii::t('report','ATTENDANCE REPORT').'</h1>'),
					
						array('label'=>Yii::t('report','Teacher Attendance').'<span>'.Yii::t('report','Teacher Attendance Report').'</span>', 'url'=>array('default/employeeattendance'),'active'=>(Yii::app()->controller->id=='default' and (Yii::app()->controller->action->id=='employeeattendance')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('report','Student Attendance').'<span>'.Yii::t('report','Student Attendance Report').'</span>', 'url'=>array('default/studentattendance'),'active'=>(Yii::app()->controller->id=='default' and (Yii::app()->controller->action->id=='studentattendance')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('report','Attendance percentage Reminder').'<span>'.Yii::t('report','Attendance Percentage Report').'</span>', 'url'=>array('default/reminder'),'active'=>(Yii::app()->controller->id=='default' and (Yii::app()->controller->action->id=='reminder')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                            
						
						
					    
					
					
				),
			)); ?>
		
		</div>
        <script type="text/javascript">

	$(document).ready(function () {
            //Hide the second level menu
            $('#othleft-sidebar ul li ul').hide();            
            //Show the second level menu if an item inside it active
            $('li.list_active').parent("ul").show();
            
            $('#othleft-sidebar').children('ul').children('li').children('a').click(function () {                    
                
                 if($(this).parent().children('ul').length>0){                  
                    $(this).parent().children('ul').toggle();    
                 }
                 
            });
          
            
        });

    </script>