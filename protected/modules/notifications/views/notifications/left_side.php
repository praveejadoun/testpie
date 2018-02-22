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
  </div>-->    <h1><?php echo Yii::t('notifications','EMAIL');?></h1>   
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
					array('label'=>''.Yii::t('notifications','New Compose').'<span>'.Yii::t('notifications','Send An Email').'</span>', 'url'=>array('notifications/sendmails') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                  'active'=> ((in_array(Yii::app()->controller->action->id,array('sendmails'))) ),
					   ), 
					array('label'=>''.Yii::t('notifications','Drafts').'<span>'.Yii::t('notifications','View Drafts').'</span>', 'url'=>array('notifications/drafts') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                            'active'=> ((in_array(Yii::app()->controller->action->id,array('drafts'))) ),
					   ),
                                           array('label'=>''.Yii::t('notifications','MailShots').'<span>'.Yii::t('notifications','View MailShots').'</span>', 'url'=>array('notifications/drafts') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                            'active'=> ((in_array(Yii::app()->controller->action->id,array('mailshots'))) ), 
                                           ),
                                               array('label'=>''.Yii::t('notifications','Sent Emails').'<span>'.Yii::t('notifications','Sent Emails').'</span>', 'url'=>array('notifications/sentmail') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                            'active'=> ((in_array(Yii::app()->controller->action->id,array('sentmail'))) ), 
                                            ),  
                                                  array('label'=>''.Yii::t('notifications','Templates').'<span>'.Yii::t('notifications','All Email Templates').'</span>', 'url'=>array('emailtemplates/') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                            'active'=> ((in_array(Yii::app()->controller->action->id,array(''))) ),  
                                                   ), 
					
                            
						   array('label'=>''.'<h1>'.Yii::t('hostel','Room').'</h1>'), 
					
						array('label'=>Yii::t('hostel','Allot Room').'<span>'.Yii::t('hostel','Allot New Room').'</span>', 'url'=>array('registration/create'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='registration' and (Yii::app()->controller->action->id=='create')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				array('label'=>Yii::t('hostel','Change Room').'<span>'.Yii::t('hostel','Manage Rooms').'</span>', 'url'=>array('room/roomchange'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='room' and (Yii::app()->controller->action->id=='roomchange')), 'itemOptions'=>array('id'=>'menu_1')
                                                     ),
                                                array('label'=>Yii::t('hostel','Vacate').'<span>'.Yii::t('hostel','Manage Rooms').'</span>', 'url'=>array('vacate/roomvacate'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='vacate' and (Yii::app()->controller->action->id=='roomvacate')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
                            
						  array('label'=>''.'<h1>'.Yii::t('hostel','Mess Management').'</h1>'),
					
						array('label'=>Yii::t('hostel','View Student Details').'<span>'.Yii::t('hostel','All Student Details').'</span>', 'url'=>array('messmanage/manage'),'active'=>(Yii::app()->controller->id=='messmanage' and (Yii::app()->controller->action->id=='manage')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('hostel','Mess Manage').'<span>'.Yii::t('hostel','Manage Mess Details').'</span>', 'url'=>array('messmanage/messinfo'),'active'=>(Yii::app()->controller->id=='messmanage' and (Yii::app()->controller->action->id=='messinfo')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('hostel','View Mess Dues').'<span>'.Yii::t('hostel','Manage Mess Dues').'</span>', 'url'=>array('settings/settings'),'active'=>(Yii::app()->controller->id=='settings' and (Yii::app()->controller->action->id=='settings')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                            
						 array('label'=>''.'<h1>'.Yii::t('hostel','Notifications').'</h1>'),
						
						array('label'=>Yii::t('hostel','Notifications').'<span>'.Yii::t('hostel','View Notifications').'</span>', 'url'=>array('settings/notifications'),'active'=>(Yii::app()->controller->id=='settings' and (Yii::app()->controller->action->id=='notifications')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'sa_ico')
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