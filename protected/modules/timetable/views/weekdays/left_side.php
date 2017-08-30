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
  </div>-->    <h1><?php echo Yii::t('room','VIEW TIMETABLE');?></h1>   
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
					array('label'=>''.Yii::t('tiimetable','View Timetable').'<span>'.Yii::t('hostel','View Batch Wise Timetable').'</span>', 'url'=>array('type/manage') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='type' and (Yii::app()->controller->action->id=='manage') ? true : false),
					    ),  
						                
					array('label'=>''.Yii::t('timetable','View Full Timetable').'<span>'.Yii::t('timetable','View Full Timetable').'</span>',  'url'=>array('weekdays/fulltimetable'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='weekdays' and (Yii::app()->controller->action->id=='fulltimetable')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        array('label'=>''.Yii::t('timetable','View Teachers Timetable').'<span>'.Yii::t('timetable','View Teacher Wise Timetable').'</span>',  'url'=>array('teacherstimetable/index'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='teacherstimetable' and (Yii::app()->controller->action->id=='index') ? true : false), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                       
                            
                            
						   array('label'=>''.'<h1>'.Yii::t('timetable','MANAGE TIMETABLE').'</h1>'), 
					
						array('label'=>Yii::t('timetable','Set Timetable').'<span>'.Yii::t('timetable','Timetable For The Batch').'</span>', 'url'=>array('weekdays/fulltimetable'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->action->id=='timetable' and (Yii::app()->controller->action->id!='fulltimetable')? true : false), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				array('label'=>Yii::t('timetable','Set Weekdays').'<span>'.Yii::t('timetable','Weekdays For The Batch').'</span>', 'url'=>array('weekdays/fulltimetable'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='' and (Yii::app()->controller->action->id!='fulltimetable')? true : false), 'itemOptions'=>array('id'=>'menu_1')
                                                     ),
                                                array('label'=>Yii::t('timetable','Set Class Timing').'<span>'.Yii::t('timetable','Class Timing For The Batch').'</span>', 'url'=>array('weekdays/fulltimetable'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='' and (Yii::app()->controller->action->id!='fulltimetable')? true : false), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
                                                array('label'=>Yii::t('timetable','Set Default Weekdays').'<span>'.Yii::t('timetable','Default Weekdays For The Institution').'</span>', 'url'=>array('type/index'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='type' and (Yii::app()->controller->action->id=='index')? true : false), 'itemOptions'=>array('id'=>'menu_1')
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