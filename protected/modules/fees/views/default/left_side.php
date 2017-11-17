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
  </div>-->    <h1><?php echo Yii::t('fees','Manage Fees');?></h1>   
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
					array('label'=>''.Yii::t('fees','Dashboard').'<span>'.Yii::t('fees','Fees Dashboard').'</span>', 'url'=>array('/fees/feesdashboard') ,'linkOptions'=>array('class'=>'lbook_ico'),'active'=> ((Yii::app()->controller->id=='feesdashboard') && (in_array(Yii::app()->controller->action->id,array('index','create')))),'itemOptions'=>array('id'=>'menu_1')),  
						                
					array('label'=>''.Yii::t('fees','Create Fees').'<span>'.Yii::t('fees','Create Fees').'</span>',  'url'=>array('fees/create'),'linkOptions'=>array('class'=>'sl_ico' ),'active'=> ((Yii::app()->controller->id=='fees' and (Yii::app()->controller->action->id=='create' or Yii::app()->controller->action->id=='create2')) or (Yii::app()->controller->id=='subscription' and Yii::app()->controller->action->id=='index')), 
					       ),
                                        array('label'=>Yii::t('fees','Manage Invoices').'<span>'.Yii::t('fees','Manage Generated Invoices').'</span>', 'url'=>array('/fees/invoices/'),'linkOptions'=>array('class'=>'abook_ico'),'active'=> ((Yii::app()->controller->id=='invoices') and (Yii::app()->controller->action->id== 'manage' or Yii::app()->controller->action->id== 'view' or Yii::app()->controller->action->id== 'index'))),

						    
					
		  				 
						  array('label'=>''.'<h1>'.Yii::t('fees','Payment Types').'</h1>'),
					
						array('label'=>Yii::t('fees','Create Payment Type').'<span>'.Yii::t('fees','Create a Payment Type').'</span>', 'url'=>array('/fees/paymenttypes/create'),'active'=>((Yii::app()->controller->id=='paymenttypes' and Yii::app()->controller->action->id=='create')? true : false ),'linkOptions'=>array('class'=>'ar_ico')),
                                                array('label'=>Yii::t('fees','Manage Payment Types').'<span>'.Yii::t('fees','Manage all Payment Types').'</span>', 'url'=>array('/fees/paymenttypes/admin'),'active'=>((Yii::app()->controller->id=='paymenttypes' and Yii::app()->controller->action->id!='create')? true : false ),'linkOptions'=>array('class'=>'ar_ico')), 
						  array('label'=>''.'<h1>'.Yii::t('fees','Tax Settings').'</h1>'),
						
						array('label'=>Yii::t('fees','Create Tax'.'<span>'.'Create a New Tax Value').'</span>', 'url'=>array('taxes/create'),'active'=>((Yii::app()->controller->id=='taxes' and Yii::app()->controller->action->id=='create')? true : false),'linkOptions'=>array('class'=>'sa_ico')),
						array('label'=>Yii::t('fees','Manage Tax').'<span>'.Yii::t('fees','Manage All Tax Values').'</span>', 'url'=>array('taxes/admin'),'active'=>((Yii::app()->controller->id=='taxes' and Yii::app()->controller->action->id!='create') ? true : false),'linkOptions'=>array('class'=>'sm_ico')),
						  array('label'=>''.'<h1>'.Yii::t('fees','Payment Gateway').'</h1>'),
						
						array('label'=>Yii::t('fees','Settings').'<span>'.Yii::t('fees','Gateway Settings').'</span>', 'url'=>array('gateways/settings'),'active'=>(Yii::app()->controller->id=='gateways' and (Yii::app()->controller->action->id=='settings')),'linkOptions'=>array('class'=>'mp_ico')), 
						//array('label'=>Yii::t('employees','Manage Grades').'<span>'.Yii::t('employees','All Employee Grades').'</span>', 'url'=>array('employeeGrades/admin'),'active'=>(Yii::app()->controller->id=='employeeGrades' ? true : false),'linkOptions'=>array('class'=>'mg_ico')), 
						
					    
					
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