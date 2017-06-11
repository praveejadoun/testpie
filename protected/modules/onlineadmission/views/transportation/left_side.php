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
  </div>-->    <h1><?php echo Yii::t('transportation','MANAGE ROUTE');?></h1>   
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
					array('label'=>''.Yii::t('transport','List All Routes').'<span>'.Yii::t('transport','All Route Details').'</span>', 'url'=>array('routedetails/manage') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='routedetails' and (Yii::app()->controller->action->id=='manage') ? true : false),
					    ),  
						                
					array('label'=>''.Yii::t('transport','Driver-Vehicle Association').'<span>'.Yii::t('transport','Assign Driver To Vehicle').'</span>',  'url'=>array('driverdetails/assign'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='driverdetails' and (Yii::app()->controller->action->id=='assign')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        array('label'=>''.Yii::t('transport','Search Students').'<span>'.Yii::t('transport','Search All Students').'</span>',  'url'=>array('transportation/studentssearch'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='transportation' and (Yii::app()->controller->action->id=='studentssearch') ? true : false), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        array('label'=>''.Yii::t('transport','Attendance Log').'<span>'.Yii::t('transport','Display Attendance Log').'</span>',  'url'=>array('transportation/attendancelog'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='transportation' and (Yii::app()->controller->action->id=='attendancelog')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                      
                            
                            
						   array('label'=>''.'<h1>'.Yii::t('transport','ROUTES').'</h1>'), 
					
						array('label'=>Yii::t('transport','Allotment').'<span>'.Yii::t('transport','Allot Students').'</span>', 'url'=>array('transportation/create'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='transportation' and (Yii::app()->controller->action->id=='create')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				
                            
						  array('label'=>''.'<h1>'.Yii::t('transport','SETTINGS').'</h1>'),
					
						array('label'=>Yii::t('transport','Devices').'<span>'.Yii::t('transport','Assign Devices To A Route').'</span>', 'url'=>array('devices/'),'active'=>(Yii::app()->controller->id=='devices'), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('transport','Vehicle Details').'<span>'.Yii::t('transport','All Vehicle Details').'</span>', 'url'=>array('vehicledetails/manage'),'active'=>(Yii::app()->controller->id=='vehicledetails' and (Yii::app()->controller->action->id=='manage')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('transport','Driver Details').'<span>'.Yii::t('transport','All Driver Details').'</span>', 'url'=>array('driverdetails/manage'),'active'=>(Yii::app()->controller->id=='driverdetails' and (Yii::app()->controller->action->id=='manage')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('transport','Transport Fee Management').'<span>'.Yii::t('transport','Fee Payment Details').'</span>', 'url'=>array('transportation/viewall'),'active'=>(Yii::app()->controller->id=='transportation' and (Yii::app()->controller->action->id=='viewall')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('transport','Bus Log').'<span>'.Yii::t('transport','Bus Log').'</span>', 'url'=>array('buslog/manage'),'active'=>(Yii::app()->controller->id=='buslog' and (Yii::app()->controller->action->id=='manage')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
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