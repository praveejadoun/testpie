<!--upgrade_div_starts-->
<div class="upgrade_bx">
	<div class="up_banr_imgbx"><a href="http://open-school.org/contact.php" target="_blank"><img src="http://tryopenschool.com/images/promo_bnnr_innerpage.png" width="231" height="200" /></a></div>
	<div class="up_banr_firstbx">
   	  <h1>You are Using Community Edition</h1>
	  <a href="http://open-school.org/contact.php" target="_blank">upgrade to premium version!</a>
    </div>
	
</div>
<!--upgrade_div_ends-->

        <div id="othleft-sidebar">
            <!--<div class="lsearch_bar">
            <input name="" type="text" class="lsearch_bar_left" value="Search" />
            <input name="" type="button" class="sbut" />
            <div class="clear"></div>
            </div>-->
            <h1>My Account</h1>  
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
				//The Welcome Link
				//array('label'=>''.t('Welcome'),  'url'=>array('/message/index') ,'linkOptions'=>array('class'=>'menu_1' ), 'itemOptions'=>array('id'=>'menu_1') 
				//),
				
				
				// The MailBox Link
				
				array('label'=>t('Mailbox<span>All Received Messages</span>'), 'url'=>array('/mailbox'),
				'active'=> ((Yii::app()->controller->module->id=='mailbox' and  Yii::app()->controller->id!='news') ? true : false),'linkOptions'=>array('class'=>'inbox_ico')),
				
				array('label'=>t('News<span>All Site News</span>'), 'url'=>array('/mailbox/news'),
				'active'=> ((Yii::app()->controller->id=='news') ? true : false),'linkOptions'=>array('class'=>'news_ico')),
				
				//The Events Link
				//'label'=>''.t('Events'), 'url'=>'javascript:void(0);', 'itemOptions'=>array('id'=>'menu_2'),
				array('label'=>''.t('<h1>Events</h1>'),
				'active'=> ((Yii::app()->controller->module->id=='cal') ? true : false)),
				
				array('label'=>t('Events List<span>All Events</span>'), 'url'=>array('/dashboard/default/events'),
				'active'=> ((Yii::app()->controller->module->id=='dashboard') ? true : false),'linkOptions'=>array('class'=>'evntlist_ico')),
				
				array('label'=>t('Calendar<span>Schedule Events</span>'), 'url'=>array('/cal'),
				'active'=> (((Yii::app()->controller->module->id=='cal') and (Yii::app()->controller->id != 'eventsType')) ? true : false),'linkOptions'=>array('class'=>'cal_ico')),
				
				array('label'=>t('Event Types<span>Manage Event Types</span>'), 'url'=>array('/cal/eventsType'),
				'active'=> ((Yii::app()->controller->id=='eventsType') ? true : false),'linkOptions'=>array('class'=>'evnttype_ico')),
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