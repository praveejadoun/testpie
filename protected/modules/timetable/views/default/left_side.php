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
               <ul>
		            <li>
                              
                                 <?php
			
                                    $rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                                    $rurl = explode('&id=',$rurl[1]); 
                                    echo CHtml::ajaxLink('View Timetable<span>View Batch wise Timetable</span>',array('','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'lbook_ico')); ?>
                               <?php echo CHtml::link('View full timetable<span>View Full Timetable</span>',array('weekdays/fulltimetable'),array('class'=>'sl_ico')); ?>
                                
                        <?php echo CHtml::link('View Teachers timetable<span>View Teacher Wise Timetable</span>',array('teacherstimetable/index'),array('class'=>'sl_ico')); ?>
                            </li>
                    
			            
        <h1>Manage Timetable</h1>
                <li>
                   
                        <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
                        echo CHtml::ajaxLink('Set Timetable<span>Timetable for the batch</span>',array('/site/explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'abook_ico')); ?>
                   
                        <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
                        echo CHtml::ajaxLink('Set Weekdays<span>Weekdays for the batch</span>',array('/site/explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'abook_ico')); ?>
                  
                        <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
                        echo CHtml::ajaxLink('Set Class Timing<span>Class Timing For The Batch</span>',array('/site/explorer','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'abook_ico')); ?>
                  
                        <?php if(Yii::app()->controller->action->id=='default' and Yii::app()->controller->id=='weekdays' ){?>
                            <li class="list_active">           <?php echo CHtml::link('Set Default Weekdays<span>Default Weekdays For The Institution</span>',array('/timetable/weekdays/default','type'=>'default'),array('class'=>'set_dw_ico'));?>
                            </li>
                            <?php } else {?>
                            <li class="">           <?php echo CHtml::link('Set Default Weekdays<span>Default Weekdays For The Institution</span>',array('/timetable/weekdays/default'),array('class'=>'set_dw_ico'));?>
                            </li>
                            <?php } ?>
               </li>
                
                </ul>
		
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