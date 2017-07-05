<?php
$this->breadcrumbs=array(
	'Courses'=>array('/courses'),
	'Electives',
);
?>
<script type="text/javascript">
function formSubmit()
{
document.getElementById("checkform").submit();
}
</script>
<?php Yii::app()->clientScript->registerCoreScript('jquery');

         //IMPORTANT about Fancybox.You can use the newest 2.0 version or the old one
        //If you use the new one,as below,you can use it for free only for your personal non-commercial site.For more info see
		//If you decide to switch back to fancybox 1 you must do a search and replace in index view file for "beforeClose" and replace with 
		//"onClosed"
        // http://fancyapps.com/fancybox/#license
          // FancyBox2
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/js_plugins/fancybox2/jquery.fancybox.css', 'screen');
         // FancyBox
         //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.js', CClientScript::POS_HEAD);
         // Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/fancybox/jquery.fancybox-1.3.4.css','screen');
        //JQueryUI (for delete confirmation  dialog)
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/js/jquery-ui-1.8.12.custom.min.js', CClientScript::POS_HEAD);
         Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/jqui1812/css/dark-hive/jquery-ui-1.8.12.custom.css','screen');
          ///JSON2JS
         Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/json2/json2.js');
       

           //jqueryform js
               Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/jquery.form.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/form_ajax_binding.js', CClientScript::POS_HEAD);
              Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js_plugins/ajaxform/client_val_form.css','screen');  ?>
              <?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".info").animate({opacity: 1.0}, 3000).fadeOut("slow");',
   CClientScript::POS_READY
);
?>


<?php $batch=Batches::model()->findByAttributes(array('id'=>$_REQUEST['id'])); ?>
          
<div style="background:#FFF;">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
  <tbody><tr>
   
    <td valign="top">
	<?php if($batch!=NULL)
		   {
			   ?>
    <div style="padding:20px;">
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
     <?php $this->renderPartial('tab');?>
    
    <div class="clear"></div>
    <div class="emp_cntntbx" style="padding-top:10px;">
   
    <?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info" style="background-color:#C30; width:800px; height:30px">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
    <?php endif; ?>
         <?php 

$data = CHtml::listData(Courses::model()->findAll("is_deleted 	=:x", array(':x'=>0),array('order'=>'course_name DESC')),'id','course_name');
if(isset($_REQUEST['cou']))
{
	$sel= $_REQUEST['cou'];
      
        
}
else
{
	$sel='';
}
echo '<div style="float:left; width:380px;"><span style="font-size:14px; font-weight:bold; color:#666;">Course</span>&nbsp;&nbsp;&nbsp;&nbsp;';
echo CHtml::dropDownList('id','',$data,array('prompt'=>'Select','onchange'=>'course()','id'=>'cou','options'=>array($sel=>array('selected'=>true)))); 
echo '</div>';

echo '&nbsp;&nbsp;'; ?>

      
        
        

   <?php $this->beginWidget('CActiveForm',array('id'=>'checkform')) ?>
      <div class="table_listbx">
    
     <?php
                if(isset($_REQUEST['id']))
                {
                $posts=Students::model()->findAll("batch_id=:x and is_deleted=:y and is_active=:z", array(':x'=>$_REQUEST['id'],':y'=>'0',':z'=>'1'));
				if($posts!=NULL)
				{
                ?>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr  >
                    <td class="listbxtop_hdng" style="border-right:1px solid #D3DDE6;"></td>
                    <td class="listbxtop_hdng" style="border-right:1px solid #D3DDE6;"><?php echo Yii::t('Batch','Student Name');?></td>
                    <td class="listbxtop_hdng" ><?php echo Yii::t('Batch','Admission Number');?></td>
                    
                    </tr>
                        
						
						<tr><td colspan="3" width="10%" style="border-right:1px solid #D3DDE6;">
                                       
                                        
										
										<?php 
		
		                                   
											$posts1=CHtml::listData($posts, 'id', 'Fullname');
											?>
										<?php
					
					 echo CHtml::checkBoxList('sid', '',$posts1, array('id'=>'1','template' => '{input}{label}</tr><tr><td width="10%">', 'checkAll' => 'All')); ?>
                                        
                                        </td>
                                        <td colspan="2">
                                        
                                        </td>
                                        </tr>
						
                            
                    </table>
                    
                    
                   
                    
                <?php    	
                }
				else
				{
					echo '<br><div class="notifications nt_red" style="padding-top:10px">'.Yii::t('Batch','<i>No Active Students In This Batch</i>').'</div>'; 
									
				}
				
				}
                ?>
    
    
   

 
    </div>
    <?php $this->endWidget(); ?>
    </div>
    </div>
    
    </div>
    </div>
    <?php    	
                }
				else
				{
					 echo '<div class="emp_right" style="padding-left:20px; padding-top:50px;">';
					 echo '<div class="notifications nt_red"><i>Nothing Found!!</i></div>'; 
					 echo '</div>';
					
				}
                ?>
   
   
    </td>
  </tr>
</tbody></table>
</div>


<script>
	//CREATE 

    $('.addevnt').bind('click', function() {var id = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=students/studentLeave/returnForm",
            data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                beforeSend : function() {
                    $("#"+$(this).attr('name')).addClass("ajax-sending");
                },
                complete : function() {
                    $("#"+$(this).attr('name')).removeClass("ajax-sending");
                },
            success: function(data) {
                $.fancybox(data,
                        {    "transitionIn"      : "elastic",
                            "transitionOut"   : "elastic",
                            "speedIn"                : 600,
                            "speedOut"            : 200,
                            "overlayShow"     : false,
                            "hideOnContentClick": false,
                            "afterClose":    function() {window.location.reload();} //onclosed function
                        });//fancybox
            } //success
        });//ajax
        return false;
    });//bind
    function course()
{
var id = document.getElementById('cou').value;
window.location= 'index.php?r=courses/batches/electives&id='+$_REQUEST['id'];	
}
function batch()
{
var id_1 = document.getElementById('cou').value;
var id = document.getElementById('sub').value;
window.location= 'index.php?r=courses/batches/electives&id='+$_REQUEST['id'];	
}
	</script>
               



