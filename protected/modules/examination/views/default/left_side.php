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
  </div>-->    <h1><?php echo Yii::t('examination','EXAMINATION');?></h1>   
               <ul>
		         
                                   <?php   if(Yii::app()->controller->id=='dashboard'and Yii::app()->controller->action->id=='index' ){ ?>       
                                <li class="list_active">    
		            
                                   <?php echo CHtml::link('Dashboard<span>Examination Dashboard</span>',array('dashboard/'),array('class'=>'sl_ico')); ?>
                            </li> 
                            <?php } else { ?>
                            <li>
                                <?php echo CHtml::link('Dashboard<span>Examination Dashboard</span>',array('dashboard/'),array('class'=>'sl_ico')); ?>
  
                            </li>
                            <?php } ?>
                             <?php   if(Yii::app()->controller->id=='exams'and Yii::app()->controller->action->id=='index' ||  Yii::app()->controller->action->id=='create' ){ ?>       
                                <li class="list_active">    
		            
                               <?php echo CHtml::link('Exams<span>Examination List</span>',array('exams/'),array('class'=>'sl_ico')); ?>
                            </li>
                             <?php } else { ?>
                            <li>
                                <?php echo CHtml::link('Exams<span>Examination List</span>',array('exams/'),array('class'=>'sl_ico')); ?>

                            </li>  
                             <?php } ?>
			            
        <h1>EXAM MANAGEMENT</h1>
                <li>
                   
                        <?php
			
			$rurl = explode('index.php?r=',Yii::app()->request->getUrl());
                       
			$rurl = explode('&id=',$rurl[1]); 
                        echo CHtml::ajaxLink('Select Course/Batch<span>Select Batch And Exam</span>',array('explorer_3','widget'=>'2','rurl'=>$rurl[0]),array('update'=>'#explorer_handler'),array('id'=>'explorer_change','class'=>'abook_ico')); ?>
                        
                    <?php   if(Yii::app()->controller->id=='gradingLevels'and Yii::app()->controller->action->id=='index' ){ ?>       
                <li class="list_active">       
                        <?php echo CHtml::link('Default Grading Levels<span>Set Default Grading Level</span>',array('gradingLevels/'),array('class'=>'sl_ico')); ?>

                </li> 
              <?php } else { ?>
                <li>
                        <?php echo CHtml::link('Default Grading Levels<span>Set Default Grading Level</span>',array('gradingLevels/list'),array('class'=>'sl_ico')); ?>
   
                </li>
              <?php } ?>
               </li>
               <h1>Exam Results</h1>
               <?php if(Yii::app()->controller->id=='result' and Yii::app()->controller->action->id=='index'){?>
               <li class="list_active">
                    <?php echo CHtml::link('Results<span>Search Default Exam Results</span>',array('result/'),array('class'=>'sl_ico')); ?>
 
               </li>
               <?php } else { ?>
               <li>
                    <?php echo CHtml::link('Results<span>Search Default Exam Results</span>',array('result/'),array('class'=>'sl_ico')); ?>
 
               </li>
               <?php } ?>
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