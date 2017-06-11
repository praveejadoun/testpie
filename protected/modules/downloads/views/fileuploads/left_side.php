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
  </div>-->    <h1><?php echo Yii::t('fileuploads','FILE UPLOADS');?></h1>   
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
					array('label'=>''.Yii::t('downloads','All Uploads').'<span>'.Yii::t('downloads','View All File Uploads').'</span>', 'url'=>array('default/index') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> ((in_array(Yii::app()->controller->action->id,array('index'))) ),
					    ),  
						                
					array('label'=>''.Yii::t('downloads','Create File Uploads').'<span>'.Yii::t('downloads','Create File Uploads').'</span>',  'url'=>array('fileuploads/create'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='fileuploads' and (Yii::app()->controller->action->id=='create')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        array('label'=>''.Yii::t('downloads','Manage File Uploads').'<span>'.Yii::t('downloads','Manage File Uploads').'</span>',  'url'=>array('fileuploads/admin'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='fileuploads' and (Yii::app()->controller->action->id=='admin')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
						   array('label'=>''.'<h1>'.Yii::t('downloads','FILE CATEGORY').'</h1>'), 
					
						array('label'=>Yii::t('downloads','Create File Category').'<span>'.Yii::t('downloads','Create File Categories').'</span>', 'url'=>array('filecategory/create'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='filecategory' and (Yii::app()->controller->action->id=='create')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				array('label'=>Yii::t('downloads','Manage File Category').'<span>'.Yii::t('downloads','Manage File Categories').'</span>', 'url'=>array('filecategory/admin'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='filecategory' and (Yii::app()->controller->action->id=='admin')), 'itemOptions'=>array('id'=>'menu_1')
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