

<?php
 $this->breadcrumbs=array(
	'Employees'=>array('employees/index'),
	'LogCategory'=>array('logcategory/index'),
);
?>
<script>
$(document).ready(function() {
$(".action_but").click(function(){
	                $(".ns_drop").hide();
					$(".s_no_but").removeClass("ns_drop_hand");
	            
				if ($("#"+this.id+'a').is(':hidden')){
					$('.gridact_drop').hide();
					$("#"+this.id+'a').show();
					}
            	else{
                	$("#"+this.id+'a').hide();
					}
            return false;
       			 });
				  $("#"+this.id+'a').click(function(e) {
            		e.stopPropagation();
        			});
        		
});
$(document).click(function() {
					
            		$('.gridact_drop').hide();
					});
</script>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top" id="port-left">
        	<?php $this->renderPartial('/employees/left_side');?>
        </td>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" width="75%">
                    <div class="cont_right formWrapper">
                      <h1><?php echo Yii::t('logcategory','Log Category');?></h1>  
                      <div class="edit_bttns" style="right:15px; top:12px;">
                     <ul>
    <li>
           <?php echo CHtml::link('<span>'. Yii::t('Employees','Create Log Category').'</span>', array('create'),array('class'=>'addbttn last')) ?>
            </li>
    </ul>
    <div class="clear"></div>
   </div>
                         
                <!-- <div class="tableinnerlist" style="padding:35px 0px 0px 0px">-->
                     <div id="employee-categories-grid">
                           <div class="grid_table_con">
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tbody>
       
                 
		  <tr >
                        <th width="70%" align="center"><?php echo Yii::t('Courses','Name');?></th>
                        <th  width="30%" align="center"><?php echo Yii::t('Courses','Action');?></th>
			
		  </tr>
                  
          <?php
          
          $logcategory=EmployeeLogCategory::model()->findAll("is_deleted=:y", array(':y'=>0)); ?>

       <?php   if($logcategory!=null)
              {
         
        
		  foreach($logcategory as $logcategory_1)
				{ ?>
                  <tr>
                      
                        <td>		<?php echo $logcategory_1->name;?></td>
                       	 <td align="center" class="act"><div style="position:relative"><span class="action_but" id="<?php echo $logcategory_1->id ?>"></span>
                                            <div class="gridact_drop" style="right:46px;" id="<?php echo $logcategory_1->id ?>a">
                                                <div class="gridact_arrow"></div>
                                                    <ul>
                                                        <!--<li><a href="#" class="grview">View</a></li>-->
                                                        <li><a href="index.php?r=employees/logcategory/update&id=<?php echo $logcategory_1->id ?>" class="gredit">Edit</a></li>
                                                        <li><a href="<?php echo $logcategory_1->id ?>" class="grde">Delete</a></li>
                                                    </ul>
                                            </div>
                                            </div>
                                            </td>	
					
                                       
									
			
					
					<!--<td>     
                 <?php //echo CHtml::link(Yii::t('Logcategory','Edit')/*,$this->createUrl('courses/update')*/,array('update','id'=>$logcategory_1->id),/*
        //'onclick'=>'$("#jobDialog11").dialog("open"); return false;',
        //'update'=>'#jobDialog1','type' =>'GET','data' => array( 'val1' =>$posts_1->id ),'dataType' => 'text'),array('id'=>'showJobDialog123'.$posts_1->id,*/ array('class'=>'edit')); ?>
                            <span>|</span> 
                                  <?php 
                                         //echo CHtml::link(Yii::t(
  //'Logcategory','Delete'), array('delete', 'id' =>$logcategory_1->id),array('confirm'=>"Are you sure?\n\n Note: All details (students, timetable, fees, exam) related to this batch will be deleted.")); ?>
                                                                 
                                      
 
                                      
                                        </td>-->
                  </tr>
                  
                  <?php    } ?>
                  
                  
                   <?php }else { 
                   echo '<br><div style="padding-top:10px;margin-top:-15px;">'.'<i>'.Yii::t('Batch','No Results Found').'</i></div>'; ?>  
                            
                            
     <?php } ?>
                   <?php
                            //Strings for the delete confirmation dialog.
                            $del_con = Yii::t('logcategory', 'Are you sure you want to delete this student category?');
                            $del_title=Yii::t('logcategory', 'Delete Confirmation');
                            $del=Yii::t('logcategory', 'Delete');
                            $cancel=Yii::t('logcategory', 'Cancel');
                            ?>
         </tbody>
        </table>

                           </div>
                    </div>
                      </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<script type="text/javascript">
  $(function() {
      
      $. bind_crud= function(){
    
   


// DELETE

    var deletes = new Array();
    var dialogs = new Array();
    $('.grde').each(function(index) {
        var id = $(this).attr('href');
        deletes[id] = function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=employees/logcategory/ajax_delete",
                data:{"id":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#employee-categories-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#employee-categories-grid").removeClass("ajax-sending");
                },
                success: function(data) {window.location.reload();
                    var res = jQuery.parseJSON(data);
                     var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('employee-categories-grid', {url:'<?php echo Yii::app()->request->getUrl()?>',data:{"EmployeeCategories_page":page}});
                }//success
            });//ajax
        };//end of deletes

        dialogs[id] =
                        $('<div style="text-align:center;"></div>')
                        .html('<p style="color:#000000"><?php echo $del_con;?></p>')
                       .dialog(
                        {
                            autoOpen: false,
                            title: '<?php echo  $del_title; ?>',
                            modal:true,
                            resizable:false,
                            buttons: [
                                {
                                    text: "<?php echo  $del; ?>",
                                    click: function() {
                                                                      deletes[id]();
                                                                      $(this).dialog("close");
																	 $("#success_flash").css("display","block").animate({opacity: 1.0}, 3000).fadeOut("slow");
                                                                      }
                                },
                                {
                                   text: "<?php echo $cancel; ?>",
                                   click: function() {
                                                                     $(this).dialog("close");
                                                                     }
                                }
                            ]
                        }
                );

        $(this).bind('click', function() {
                                                                      dialogs[id].dialog('open');
                                                                       // prevent the default action, e.g., following a link
                                                                      return false;
                                                                     });
    });//each end

        }//bind_crud end

   //apply   $. bind_crud();
  $. bind_crud();
  })
    </script>
