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
  </div>-->    <h1><?php echo Yii::t('book','MANAGE BOOKS');?></h1>   
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
					array('label'=>''.Yii::t('library','Search Books').'<span>'.Yii::t('library','Search All Books').'</span>', 'url'=>array('book/booksearch') ,'linkOptions'=>array('class'=>'lbook_ico'),
                                   'active'=> (Yii::app()->controller->id=='book' and (Yii::app()->controller->action->id=='booksearch') ? true : false),
					    ),  
						                
					array('label'=>''.Yii::t('library','List Books').'<span>'.Yii::t('library','All Book Details').'</span>',  'url'=>array('book/manage'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='book' and (Yii::app()->controller->action->id=='manage')), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        array('label'=>''.Yii::t('library','Add Book').'<span>'.Yii::t('library','Add New Book Details').'</span>',  'url'=>array('book/create'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> (Yii::app()->controller->id=='book' and (Yii::app()->controller->action->id=='create') ? true : false), 'itemOptions'=>array('id'=>'menu_1') 
					       ),
                                        
						   array('label'=>''.'<h1>'.Yii::t('library','BOOK LEND').'</h1>'), 
					
						array('label'=>Yii::t('library','Borrow Book').'<span>'.Yii::t('library','Issue Book Here').'</span>', 'url'=>array('borrowbook/create'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='borrowbook' and (Yii::app()->controller->action->id=='create')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
		  				array('label'=>Yii::t('library','Return Book').'<span>'.Yii::t('library','Lend Book Here').'</span>', 'url'=>array('returnbook/manage'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='returnbook' and (Yii::app()->controller->action->id=='manage')), 'itemOptions'=>array('id'=>'menu_1')
                                                     ),
                                                array('label'=>Yii::t('library','View Book Details').'<span>'.Yii::t('library','All Book Details').'</span>', 'url'=>array('book/bookdetails'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='book' and (Yii::app()->controller->action->id=='bookdetails')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
                                                 array('label'=>Yii::t('library','Due Dates').'<span>'.Yii::t('library','All Dues Here').'</span>', 'url'=>array('settings/settings'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> (Yii::app()->controller->id=='settings' and (Yii::app()->controller->action->id=='settings')), 'itemOptions'=>array('id'=>'menu_1')
                                                    ),
                            
						  array('label'=>''.'<h1>'.Yii::t('library','SETTINGS').'</h1>'),
					
						array('label'=>Yii::t('library','Manage Book Category').'<span>'.Yii::t('library','Add New Book Category').'</span>', 'url'=>array('category/admin'),'active'=>(Yii::app()->controller->id=='category' and (Yii::app()->controller->action->id=='admin')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('library','View Student Details').'<span>'.Yii::t('library','All Student Details').'</span>', 'url'=>array('borrowbook/studentdetails'),'active'=>(Yii::app()->controller->id=='borrowbook' and (Yii::app()->controller->action->id=='studentdetails')), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
                                                    ),
                                                array('label'=>Yii::t('library','View Authors').'<span>'.Yii::t('library','All Author Details').'</span>', 'url'=>array('author/'),'active'=>(Yii::app()->controller->id=='author'), 'itemOptions'=>array('id'=>'menu_1'),'linkOptions'=>array('class'=>'ar_ico')
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