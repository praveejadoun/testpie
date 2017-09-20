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
					array('label'=>''.Yii::t('examination','Dashboard').'<span>'.Yii::t('examination','Examination Dashboard').'</span>', 'url'=>array('dashboard/') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='Dashboard' and (Yii::app()->controller->action->id=='index') ? true : false),
					    ),  
						                
					array('label'=>''.Yii::t('examination','Exams').'<span>'.Yii::t('examination','Examination List').'</span>',  'url'=>array('exam/'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='exam' and (Yii::app()->controller->action->id=='index' or Yii::app()->controller->action->id=='create')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        /*array('label'=>''.Yii::t('examination','Default Grading Levels').'<span>'.Yii::t('examination','Set Default Grading Level').'</span>',  'url'=>array('gradinglevels/manage'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='gradinglevels' and (Yii::app()->controller->action->id=='manage') ? true : false), 'itemOptions'=>array('id'=>'menu_1') 
					       ),*/
                                        
                            
                            
						   array('label'=>''.'<h1>'.Yii::t('examination','EXAM RESULTS').'</h1>'), 
					
						array('label'=>Yii::t('examination','Results').'<span>'.Yii::t('examination','Search Default Exam Results').'</span>', 'url'=>array('result/index'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='result' and (Yii::app()->controller->action->id=='index')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				
						  array('label'=>''.'<h1>'.Yii::t('examination','GRADE BOOK').'</h1>'),
					
						array('label'=>Yii::t('examination','Grade Book').'<span>'.Yii::t('examination','View Default Exam Grade Book').'</span>', 'url'=>array('exam/gradebook'),'active'=>(Yii::app()->controller->id=='exam' and (Yii::app()->controller->action->id=='gradebook')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
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