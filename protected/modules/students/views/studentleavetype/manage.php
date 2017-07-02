
<style>
.drop select { width:159px;}
</style>


<?php
$this->breadcrumbs=array(
	'Students'=>array('students/index'),
	'Manage',
);


?>

<script language="javascript">
function details(id)
{
	
	var rr= document.getElementById("dropwin"+id).style.display;
	
	 if(document.getElementById("dropwin"+id).style.display=="block")
	 {
		 document.getElementById("dropwin"+id).style.display="none"; 
	 }
	 if(  document.getElementById("dropwin"+id).style.display=="none")
	 {
		 document.getElementById("dropwin"+id).style.display="block"; 
	 }
	 //return false;
	

}
</script>

<script language="javascript">
function hide(id)
{
	$(".drop").hide();
	$('#'+id).toggle();	
}
</script>

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.selecctall').click(function (event) {
            if (this.checked) {
                $('.ch1').each(function () {
                    this.checked = true;
                });
            } else {
                $('.ch1').each(function () {
                    this.checked = false;
                });
            }
        });

    });

</script>


<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="247" valign="top">
        	<?php $this->renderPartial('/default/left_side');?>
        </td>
        <td valign="top">
            <div class="cont_right formWrapper">
               
               <h1><?php echo Yii::t('studentleavetype','Student Leave Types');?></h1>  
              <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

                    <div class="list_contner">
                    <div class="clear"></div>
                    <?php 
					if($list)
                    {
					?>
                    <div class="tablebx">  
                        <div class="pagecon">
							<?php 
                             
                               /* $this->widget('CLinkPager', array(
                              'currentPage'=>$pages->getCurrentPage(),
                              'itemCount'=>$item_count,
                              'pageSize'=>$page_size,
                              'maxButtonCount'=>5,
                              //'nextPageLabel'=>'My text >',
                              'header'=>'',
                            'htmlOptions'=>array('class'=>'pages'),
                            ));*/?>
                        </div> <!-- End div class="pagecon" --> 
                                                              
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            
                            <tr class="tablebx_topbg">
                               
                                <td><?php echo Yii::t('students','Sl. No.');?></td>	
                                <td><?php echo Yii::t('studentleavetype','Name');?></td>
                                <td><?php echo Yii::t('studentleavetype','Code');?></td>
                                <td><?php echo Yii::t('studentleavetype','Label');?></td>
                                <td><?php echo Yii::t('studentleavetype','Color Code');?></td>
                                <td><?php echo Yii::t('studentleavetype','Status');?></td>
                                <td><?php echo Yii::t('studentleavetype','Action');?></td>
                                <!--<td style="border-right:none;">Task</td>-->
                            </tr>
                            <?php 
                            if(isset($_REQUEST['page']))
                            {
                            	$i=($pages->pageSize*$_REQUEST['page'])-9;
                           }
                            else
                            {
                            	$i=1;
                            }
                            $cls="even";
                            ?>
                            
                            <?php 
							foreach($list as $list_1)
                            {
							?>
                                <tr class=<?php echo $cls;?>>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $list_1->name ?></td>
                                <td><?php echo $list_1->code ?></td>
                                <td><?php echo $list_1->label ?></td>
                                <td><?php echo $list_1->colorcode ?></td>
                                <td><?php echo $list_1->status ?></td>
                              
                                
                                    
                                <td class="listbx_subhdng"><?php echo CHtml::link(Yii::t('studentleavetype','Edit'), array('update','id'=>$list_1->id)); ?><span> |</span>
                                                           
                                <?php echo CHtml::link(Yii::t('studentleavetype','Delete'), array('delete','id'=>$list_1->id),array('confirm'=>'Are you sure you want to delete this?')); ?>

                                    
                                </td>                  
                                </tr>
								<?php
                                if($cls=="even")
                                {
                                	$cls="odd" ;
                                }
                                else
                                {
                                	$cls="even"; 
                                }
                                $i++;
							} 
							?>
                        </table>
                        
                        <div class="pagecon">
                           
                            
                           
                        <?php                                        
                         
                        

$this->widget('CLinkPager', array(
                              'currentPage'=>$pages->getCurrentPage(),
                              'itemCount'=>$item_count,
                              'pageSize'=>$page_size,
                              'maxButtonCount'=>5,
                              //'nextPageLabel'=>'My text >',
                              'header'=>'',
                            'htmlOptions'=>array
('class'=>'pages'),
                            ));
?>
                          
                            
                            
                           
                        </div> <!-- END div class="pagecon" 2 -->
                        <div class="clear"></div>
                        
                    </div> <!-- END div class="tablebx" -->
                    
                    <?php 
					}
                    else
                    {
                    	echo '<div class="listhdg" align="center">'.Yii::t('students','Nothing Found!!').'</div>';	
                    }?>
                </div> <!-- END div class="list_contner" -->
                <!-- END List Content -->
                <br />
                
            </div> <!-- END div class="cont_right formWrapper" -->
            <!--</div> 
            </div>-->
            
        </td>
    </tr>
</table>
    
</body>
<script>
    var ch = $("#ch");
$('body').click(function() {
	$('#osload').hide();
	$('#name').hide();
	$('#admissionnumber').hide();
	$('#batch').hide();
	$('#cat').hide();
	$('#pos').hide();
	$('#grd').hide();
	$('#gender').hide();
	$('#marital').hide();
	$('#bloodgroup').hide();
	$('#nationality').hide();
	if($("#dobtxt").val().length <=0)
	{
		$('#dob').hide();
	}
	if($("#admdatetxt").val().length <=0)
	{
		$('#admission').hide();
	}
	$('#status').hide();
 
});

$('.filterbxcntnt_inner').click(function(event){
   event.stopPropagation();
});

$('.load_filter').click(function(event){
   event.stopPropagation();
});
function checkall()
{
    
	if($("#ch").is(":checked"))
	{ 
		$('.checkbox1').prop('checked', true);
	}
	else
	{
		$('.checkbox1').each(function() { //loop through each checkbox
		   this.checked = false; //deselect all checkboxes with class "checkbox1"                       
		});         
	}
}
function selectcheck()
{
	var numberOfChecked = $('.checkbox1:checked').length; //count of all checked checkboxes with class "checkbox1"
	var totalCheckboxes = $('.checkbox1:checkbox').length; //count of all textboxes with class "checkbox1"
	if(numberOfChecked == totalCheckboxes)
		ch.checked=true;
	else
		ch.checked=false;	
}

function delete_all()
{
	var numberOfChecked = $('.checkbox1:checked').length; //count of all checked checkboxes with class "checkbox1"
	var totalCheckboxes = $('.checkbox1:checkbox').length; //count of all textboxes with class "checkbox1"
	var notChecked = $('.checkbox1:not(":checked")').length;//totalCheckboxes - numberOfChecked;
	
	if(numberOfChecked > 0)
	{		
		var favorite = [];
		$.each($("input[name='convs']:checked"), function(){            
			favorite.push($(this).val());
		});
		var r = confirm("Are you sure ? Do you want to delete this?");
		if(r==true){
			$.ajax({
				url:"/index.php?r=students/students/delete_all",
				type:'POST',
				data:{id:favorite, "YII_CSRF_TOKEN":"ce4e11b27b5c1977be8ce91f77ca6a90f8e3cda1"},
				dataType:"json",
				success:function(response){
					if(response.status=="success"){
						window.location.reload();
					}
					else{
						alert("Error");
					}
				}
			});
		}
		else
		{
		
		return false;
		}
	}else{
		alert("Please select atleast one Student");
		return false;
	}
}
</script>		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
				</div><!-- sidebar -->
	</div>
</div>
    <div class="clear"></div>
  </div>
 </div>
<script>
  window.intercomSettings = {
    app_id: "jrgna4bh"
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/jrgna4bh';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>