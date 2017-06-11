<style>
.drop select { width:159px;}
</style>

<?php
$this->breadcrumbs=array(
	'Students'=>array('default/index'),
        'Manage Students Archive',
	
);


?>

<script>
function details(id)
{
	//alert("#dropwin"+id);
	var rr= document.getElementById("dropwin"+id).style.display;
	//alert(rr);
	 if(document.getElementById("dropwin"+id).style.display=="block")
	 {
		 document.getElementById("dropwin"+id).style.display="none"; 
	 }
	 if(  document.getElementById("dropwin"+id).style.display=="none")
	 {
		 document.getElementById("dropwin"+id).style.display="block"; 
	 }
	 //return false;
	/*if ($("#dropwin"+id).is(':hidden')){
		 $("#dropwin"+id).show();
	}
	else{
		$("#dropwin"+id).hide();
	}*/

}


/*function details(id) {
	alert(123);
	var ele = document.getElementById("dropwin"+id);
	//var text = document.getElementById("displayText");
	if(ele.style.display == "block") {
		alert(1);
    		ele.style.display = "none";
		//text.innerHTML = "show";
  	}
	else {
		alert(2);
		ele.style.display = "block";
		//text.innerHTML = "hide";
	}
} */
$(document).ready(function() {
	
	
	/*function details()
	  {
		  alert(1);
		$("#batch1").click(function(){
            	if ($("#dropwin").is(':hidden')){
                	$("#dropwin").show();
				}
            	else{
                	$("#dropwin").hide();
            	}
            return false;
       			 });
				 
	  }*/
				 /*
				  $('#dropwin').click(function(e) {
            		e.stopPropagation();
					
        			});*/
        		/*$(document).click(function() {
					if (!$("#dropwin").is(':hidden')){
            		$('#dropwin').hide();
					}
        			});	*/
});	
</script>
<!--<script language="javascript">
$(document).ready(function() {
$('.cont_right').not('.drop').click(function() {
      $(".drop").hide();
});
});
</script>-->
<script language="javascript">
function hide(id)
{/*
	 $(".drop").click(function(e) {
            		e.stopPropagation();
					});
	$(document).click(function() {
					if (!$(".drop").is(':hidden')){
            		$('.drop').hide();
					}
        			});
if ($('#'+id).is(':hidden')){
                	$('#'+id).show();
				}
            	else{
                	$('#'+id).hide();
            	}*/
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
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
      <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('archive','Manage Students Archive');?></h1>
<div class="search_btnbx">
                    <!--<div class="listsearchbx">
                    <ul>
                    <li><input class="listsearchbar listsearchtxt" name="" type="text" onblur="clearText(this)" onfocus="clearText(this)" value="Search for Contacts"  /></li>
                    <li><input src="images/list_searchbtn.png" name="" type="image" /></li>
                    </ul>
                    </div>-->
                    <?php $j=0; ?>
                    <div id="jobDialog"></div>
                    <div class="contrht_bttns">
                        <ul>
                            <li><?php echo CHtml::link('<span>'.Yii::t('students','Clear All').'</span>', array('students')); ?></li>
                            
                        </ul>
                    </div> <!-- END div class="contrht_bttns" -->
                    <div class="bttns_imprtcntact">
                        <ul>
                        	<?php /*?> <li><a class=" import_contact last" href=""><?php echo Yii::t('students','Import Contact');?></a></li><?php */?>
                        </ul>
                    </div> <!-- END div class="bttns_imprtcntact" -->
                    
                    <!-- END div class="bttns_addstudent" -->
                    
                </div> <!-- END div class="search_btnbx" -->
                
                <!-- END Save Filter, Load Filter, Clear All -->
                
                <div class="clear"></div>
                
                <!-- Filters Box -->
                <div class="filtercontner">
                    <div class="filterbxcntnt">
                    	<!-- Filter List -->
                        <div class="filterbxcntnt_inner" style="border-bottom:#ddd solid 1px;">
                            <ul>
                                <li style="font-size:12px"><?php echo Yii::t('students','Filter Your Students:');?></li>
                                
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                'method'=>'get',
                                )); ?>
                                
                                <!-- Name Filter -->
                                <li>
                                    <div onClick="hide('name')" style="cursor:pointer;"><?php echo Yii::t('students','Name');?></div>
                                    <div id="name" style="display:none; width:202px; padding-top:0px; height:30px" class="drop" >
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="name" value="<?php echo isset($_GET['name']) ? CHtml::encode($_GET['name']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                <!-- End Name Filter -->
                                
                                <!-- Admission Number Filter -->
                                <li>
                                    <div onClick="hide('admissionnumber')" style="cursor:pointer;"><?php echo Yii::t('students','Admission number');?></div>
                                    <div id="admissionnumber" style="display:none;width:202px; padding-top:0px; height:30px" class="drop">
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="admissionnumber" value="<?php echo isset($_GET['admissionnumber']) ? CHtml::encode($_GET['admissionnumber']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                 <!-- End Admission Number Filter -->
                                 
                                 <!-- Email Filter -->
                                 <li>
                                    <div onClick="hide('email')" style="cursor:pointer;"><?php echo Yii::t('students','Email');?></div>
                                    <div id="email" style="display:none;width:202px; padding-top:0px; height:30px" class="drop">
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="email" value="<?php echo isset($_GET['email']) ? CHtml::encode($_GET['email']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                 <!-- End Email Filter -->
                                 
                                 <!-- Phone Filter -->
                                <li>
                                    <div onClick="hide('phone1')" style="cursor:pointer;"><?php echo Yii::t('students','Phone');?></div>
                                    <div id="phone1" style="display:none;width:202px; padding-top:0px; height:30px" class="drop">
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="phone1" value="<?php echo isset($_GET['phone1']) ? CHtml::encode($_GET['phone1']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                 <!-- End Phone Filter -->
                                
                                <!-- Batch Filter -->
                               <!-- <li>
                                    <div onClick="hide('batch')" style="cursor:pointer;"><?php echo Yii::t('students','Batch');?></div>
                                    <div id="batch" style="display:none; color:#000; width:406px; height:30px; padding-left:10px; padding-top:0px; left:-200px" class="drop">
                                        <div class="droparrow" style="left:210px;"></div>
                                        <?php
                                        $data = CHtml::listData(Courses::model()->findAll('is_deleted=:x',array(':x'=>'0'),array('order'=>'course_name DESC')),'id','course_name');
                                        echo Yii::t('students','Course');
                                        echo CHtml::dropDownList('cid','',$data,
                                        array('prompt'=>'Select',
                                        'ajax' => array(
                                        'type'=>'POST',
                                        'url'=>CController::createUrl('Students/batch'),
                                        'update'=>'#batch_id',
                                        'data'=>'js:$(this).serialize()'
                                        ))); 
                                        echo '&nbsp;&nbsp;&nbsp;';
                                        echo Yii::t('students','Batch');
                                        $data1 = CHtml::listData(Batches::model()->findAll('is_active=:x AND is_deleted=:y',array(':x'=>'1',':y'=>0),array('order'=>'name DESC')),'id','name');
                                        echo CHtml::activeDropDownList($model,'batch_id',$data1,array('prompt'=>'Select','id'=>'batch_id')); ?>
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>-->
                                <!-- END Batch Filter -->
                                
                                <!-- Gender Filter -->
                              <!--  <li>
                                    <div onClick="hide('gender')" style="cursor:pointer;"><?php echo Yii::t('students','Gender');?></div>
                                    <div id="gender" style="display:none; width:191px; padding-top:0px; height:30px" class="drop">
                                        <div class="droparrow" style="left:10px;"></div>
                                        <?php
                                        //echo CHtml::activeDropDownList($model,'gender',array('M' => 'Male', 'F' => 'Female'),array('prompt'=>'All')); 
                                        ?>
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                <!-- End Gender Filter -->
                                
                                <!-- Blood Group Filter -->
                               <!-- <li>
                                    <div onClick="hide('bloodgroup')" style="cursor:pointer;"><?php echo Yii::t('students','Blood Group');?></div>
                                    <div id="bloodgroup" style="display:none;width:191px; padding-top:0px; height:30px" class="drop" >
                                        <div class="droparrow" style="left:10px;"></div>
                                        <?php /*echo CHtml::activeDropDownList($model,'blood_group',
                                        array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-'),
                                        array('prompt' => 'Select'));*/ ?>
                                        <input type="submit" value="Apply"  />
                                    </div>
                                </li>
                                <!-- END Blood Group Filter -->
                                
                                <!-- Nationality Filter -->
                              <!--  <li>
                                    <div onClick="hide('nationality')" style="cursor:pointer;"><?php echo Yii::t('students','Country');?></div>
                                    <div id="nationality" style="display:none;width:191px; padding-top:0px; left:-180px; height:30px;" class="drop">
                                        <div class="droparrow" style="left:189px;"></div>
                                        <?php// echo CHtml::activeDropDownList($model,'nationality_id',CHtml::listData(Countries::model()->findAll(),'id','name'),array('prompt'=>'Select')); ?>
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                <!-- END Nationality Filter -->
                                
                                <!-- Date of Birth Filter -->
                                <?php
                                $settings=UserSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
                                if($settings!=NULL)
                                {
                                    $date=$settings->dateformat;
                                }
                                else
                                    $date = 'dd-mm-yy';	
                                ?>
                             <!--   <li>
                                    <div onClick="hide('dob')" style="cursor:pointer;"><?php echo Yii::t('students','Date Of Birth');?></div>
                                    <div id="dob" style="display:none; width:340px; left:-250px; height:30px; padding-top:0px;" class="drop">
                                        <div class="droparrow" style=" left:280px"></div>
                                        <?php echo CHtml::activeDropDownList($model,'dobrange',array('1' => 'less than', '2' => 'equal to', '3' => 'greater than'),array('prompt'=>'Option')); ?>                            
                                        <?php 
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                            'name'=>'Students[date_of_birth]',
                                            'model'=>$model,
                                            'value'=>$model->date_of_birth,
                                            
                                            'options'=>array(
                                            'showAnim'=>'fold',
                                            'dateFormat'=>$date,
                                            'changeMonth'=> true,
                                            'changeYear'=>true,
                                            'yearRange'=>'1900:'
                                            ),
                                            'htmlOptions'=>array(
                                            'style'=>'height:20px;',
											'id' => 'dobtxt',
                                            ),
                                        ));
                                        ?>
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>-->
                                <!-- END Date of Birth Filter -->
                                
                                <!-- Admission Date Filter -->
                               <!-- <li>
                                    <div onClick="hide('admission')" style="cursor:pointer;"><?php echo Yii::t('students','Admission Date');?></div>
                                    <div id="admission" style="display:none;width:340px; left:-190px;  height:30px; padding-top:0px;" class="drop">
                                        <div class="droparrow" style=" left:200px"></div>
                                        <?php echo CHtml::activeDropDownList($model,'admissionrange',array('1' => 'less than', '2' => 'equal to', '3' => 'greater than'),array('prompt'=>'Option')); ?>
                                        <?php 
                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'name'=>'Students[admission_date]',
                                        'model'=>$model,
                                        'value'=>$model->admission_date,
                                        
                                        'options'=>array(
                                        'showAnim'=>'fold',
                                        'dateFormat'=>$date,
                                        'changeMonth'=> true,
                                        'changeYear'=>true,
                                        'yearRange'=>'1900:'
                                        ),
                                        'htmlOptions'=>array(
                                        'style'=>'height:20px;',
										'id'=>'admdatetxt'
                                        ),
                                        ));
                                        ?>
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>-->
                                 <!-- END Admission Date Filter -->
                                 
                                <!-- Status Filter -->
                            <!--    <li>
                                <div onClick="hide('status')" style="cursor:pointer;"><?php echo Yii::t('students','Status');?></div>
                                    <div id="status" style="display:none; width:191px; min-height:30px; left:-120px; padding-top:0px;" class="drop">
                                    <div class="droparrow"  style="left:140px"></div>
                                    <?php 
                                    echo CHtml::activeDropDownList($model,'status',array('1' => 'Present', '0' => 'Former'),array('selected'=>'selected','prompt'=>'All')); 
                                    ?>
                                    <input type="submit" value="Apply" />
                                    </div>
                                </li>-->
                                <!-- END Status Filter -->
                                <?php $this->endWidget(); ?>
                                
                            </ul>
                            <div class="clear"></div>
                        </div> <!-- END div class="filterbxcntnt_inner" -->
                        <!-- END Filter List -->
                        
                        <div class="clear"></div>
                        
                        <!-- Active Filter List -->
                        <div class="filterbxcntnt_inner_bot">
                            <div class="filterbxcntnt_left"><?php echo Yii::t('students','<strong>Active Filters:</strong>');?></div>
                            <div class="clear"></div>
                            <div class="filterbxcntnt_right">
                                <ul>
                                	
                                    <!-- Name Active Filter -->
									<?php 
									if(isset($_REQUEST['name']) and $_REQUEST['name']!=NULL)
                                    {
                                    	$j++; 
									?>
                                    	<li>Name : <?php echo $_REQUEST['name']?><a href="<?php echo Yii::app()->request->getUrl().'&name='?>"></a></li>
                                    <?php 
									}
									?>
                                    <!-- END Name Active Filter -->
                                    
                                    <!-- Admission Number Active Filter -->
                                    <?php 
									if(isset($_REQUEST['admissionnumber']) and $_REQUEST['admissionnumber']!=NULL)
                                    { 
                                    	$j++; 
									?>
                                    	<li>Admission number : <?php echo $_REQUEST['admissionnumber']?><a href="<?php echo Yii::app()->request->getUrl().'&admissionnumber='?>"></a></li>								
									<?php 
									}
									?>
                                     <!-- END Admission Number Active Filter -->
                                     
                                       <!-- Email Active Filter -->
                                    <?php 
									if(isset($_REQUEST['email']) and $_REQUEST['email']!=NULL)
                                    { 
                                    	$j++; 
									?>
                                    	<li>Email : <?php echo $_REQUEST['email']?><a href="<?php echo Yii::app()->request->getUrl().'&email='?>"></a></li>								
									<?php 
									}
									?>
                                     <!-- END Email Active Filter -->
                                     
                                       <!-- Phone1 Active Filter -->
                                    <?php 
									if(isset($_REQUEST['phone1']) and $_REQUEST['phone1']!=NULL)
                                    { 
                                    	$j++; 
									?>
                                    	<li>Phone : <?php echo $_REQUEST['phone1']?><a href="<?php echo Yii::app()->request->getUrl().'&phone1='?>"></a></li>								
									<?php 
									}
									?>
                                     <!-- END Phone1 Active Filter -->
                                     
                                     
                                    <!-- Batch Active Filter -->
                                    <?php 
									if(isset($_REQUEST['Students']['batch_id']) and $_REQUEST['Students']['batch_id']!=NULL)
                                    { 
                                    	$j++;
                                    ?>
                                    	<li>Batch : <?php echo Batches::model()->findByAttributes(array('id'=>$_REQUEST['Students']['batch_id']))->name?><a href="<?php echo Yii::app()->request->getUrl().'&Students[batch_id]='?>"></a></li>
                                    <?php 
									}
									?>
                                    <!-- END Batch Active Filter -->
                                    
                                    
                                    <!-- Gender Active Filter -->
                                    <?php 
									if(isset($_REQUEST['Students']['gender']) and $_REQUEST['Students']['gender']!=NULL)
                                    { 
										$j++;
										if($_REQUEST['Students']['gender']=='M')
										$gen='Male';
										else
										$gen='Female';
                                    ?>
                                    	<li>Gender : <?php echo $gen?><a href="<?php echo Yii::app()->request->getUrl().'&Students[gender]='?>"></a></li>
                                    <?php 
									}
									?>
                                    <!-- END Gender Active Filter -->
                                    
                                    
                                    <!-- Blood Group Active Filter -->
                                    <?php 
									if(isset($_REQUEST['Students']['blood_group']) and $_REQUEST['Students']['blood_group']!=NULL)
                                    { 
                                    	$j++; 
									?>
                                    	<li>Blood Group : <?php echo $_REQUEST['Students']['blood_group']?><a href="<?php echo Yii::app()->request->getUrl().'&Students[blood_group]='?>"></a></li>
                                    <?php 
									}
									?>
                                    <!-- END Blood Group Active Filter -->
                                    
                                    <!-- Nationality Active Filter -->
                                    <?php  if(isset($_REQUEST['Students']['nationality_id']) and $_REQUEST['Students']['nationality_id']!=NULL)
                                    {
                                    	$j++; 
									?>
                                    	<li>Country : <?php echo Countries::model()->findByAttributes(array('id'=>$_REQUEST['Students']['nationality_id']))->name?><a href="<?php echo Yii::app()->request->getUrl().'&Students[nationality_id]='?>"></a></li>
                                    <?php 
									}
									?>
                                    <!-- END Nationality Active Filter -->
                                    
                                    
                                    <!-- Date of Birth Active Filter -->
                                    <?php 
                                    if(isset($_REQUEST['Students']['dobrange']) and $_REQUEST['Students']['dobrange']!=NULL)
                                    {
										if(isset($_REQUEST['Students']['date_of_birth']) and $_REQUEST['Students']['date_of_birth']!=NULL)
										{ 
											$j++;
											if($_REQUEST['Students']['dobrange']=='1')
											{
												$range = 'less than';
											}
											if($_REQUEST['Students']['dobrange']=='2')
											{
												$range = 'equal to';
											}
											if($_REQUEST['Students']['dobrange']=='3')
											{
												$range = 'greater than';
											}?>
											<li>Date Of Birth : <?php echo $range.' : '.$_REQUEST['Students']['date_of_birth']?><a href="<?php echo Yii::app()->request->getUrl().'&Students[date_of_birth]='?>"></a></li>
											<?php 
										}
									} 
                                    elseif(isset($_REQUEST['Students']['dobrange']) and $_REQUEST['Students']['dobrange']==NULL)
                                    { 
										if(isset($_REQUEST['Students']['date_of_birth']) and $_REQUEST['Students']['date_of_birth']!=NULL)
										{ 
											$j++;
											$range = 'equal to';  
											?>
											<li>Date Of Birth : <?php echo $range.' : '.$_REQUEST['Students']['date_of_birth']?><a href="<?php echo Yii::app()->request->getUrl().'&Students[date_of_birth]='?>"></a></li>
										<?php 
										}
									}
									?>
                                    <!-- END Date of Birth Active Filter -->
                                    
                                    
                                    <!-- Admission Date Active Filter -->
                                    <?php 
                                    if(isset($_REQUEST['Students']['admissionrange']) and $_REQUEST['Students']['admissionrange']!=NULL)
                                    {
										if(isset($_REQUEST['Students']['admission_date']) and $_REQUEST['Students']['admission_date']!=NULL)
										{
											$j++;
											if($_REQUEST['Students']['admissionrange']=='1')
											{
												$admissionrange = 'less than';
											}
											if($_REQUEST['Students']['admissionrange']=='2')
											{
												$admissionrange = 'equal to';
											}
											if($_REQUEST['Students']['admissionrange']=='3')
											{
												$admissionrange = 'greater than';
											}
											?>
											<li>Admission Date : <?php echo $admissionrange.' : '.$_REQUEST['Students']['admission_date']?><a href="<?php echo Yii::app()->request->getUrl().'&Students[admission_date]='?>"></a></li>
											<?php 
										}
									} 
                                    elseif(isset($_REQUEST['Students']['admissionrange']) and $_REQUEST['Students']['admissionrange']==NULL)
                                    {
										if(isset($_REQUEST['Students']['admission_date']) and $_REQUEST['Students']['admission_date']!=NULL)
										{ 
											$j++;
											$admissionrange = 'equal to'; ?>
											<li>Admission Date : <?php echo $admissionrange.' : '.$_REQUEST['Students']['admission_date']?><a href="<?php echo Yii::app()->request->getUrl().'&Students[admission_date]='?>"></a></li>
										<?php 
										}
									}?> 
                                    <!-- END Admission Date Active Filter -->
                                    
                                    <!-- Status Active Filter -->
                                    <?php  
									if(isset($_REQUEST['Students']['status']) and $_REQUEST['Students']['status']!=NULL)
                                    {
										$j++;
										if($_REQUEST['Students']['status']=='1')
										{
											$status='Present';
										}
										else
										{
											$status='Former';
										}
										?>
										<li>Status : <?php echo $status?><a href="<?php echo Yii::app()->request->getUrl().'&Students[status]='?>"></a></li>
                                    <?php 
									}
									?> 
                                    <!-- END Admission Date Active Filter -->
                                    <?php if($j==0)
                                    {
                                    	echo '<div style="padding-top:4px; font-size:11px;">'.Yii::t('students','<i>No Active Filters</i>').'</div>';
                                    }
									?> 
                                    
                                    <div class="clear"></div>
                                </ul>
                            </div> <!-- END div class="filterbxcntnt_right" -->
                            
                            <div class="clear"></div>
                        </div> <!-- END div class="filterbxcntnt_inner_bot" -->
                        <!-- END Active Filter List -->
                    </div> <!-- END div class="filterbxcntnt" -->
                </div> <!-- END div class="filtercontner"-->
                
                <!-- END Filter Box -->
                <div class="clear"></div>
                
                <!-- Alphabetic Sort -->
                <div class="list_contner_hdng">
                    <div class="letterNavCon" id="letterNavCon">
                        <ul>
                        <?php 
						if((isset($_REQUEST['val']) and $_REQUEST['val']==NULL) or (!isset($_REQUEST['val'])))
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php echo CHtml::link(Yii::t('students','All'), Yii::app()->request->getUrl().'&val=',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='A')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php echo CHtml::link(Yii::t('students','A'), Yii::app()->request->getUrl().'&val=A',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='B')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','B'), Yii::app()->request->getUrl().'&val=B',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='C')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','C'), Yii::app()->request->getUrl().'&val=C',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='D')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','D'), Yii::app()->request->getUrl().'&val=D',array('class'=>'vtip')); ?>                            
                        </li>
                        
						
						<?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='E')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','E'), Yii::app()->request->getUrl().'&val=E',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='F')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        <?php  echo CHtml::link(Yii::t('students','F'), Yii::app()->request->getUrl().'&val=F',array('class'=>'vtip')); ?>                            
                        
                        </li>
                        <?php
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='G')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','G'), Yii::app()->request->getUrl().'&val=G',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='H')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','H'), Yii::app()->request->getUrl().'&val=H',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        
                        <?php
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='I')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        
                        	<?php  echo CHtml::link(Yii::t('students','I'), Yii::app()->request->getUrl().'&val=I',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='J')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','J'), Yii::app()->request->getUrl().'&val=J',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='K')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','K'), Yii::app()->request->getUrl().'&val=K',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='L')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','L'), Yii::app()->request->getUrl().'&val=L',array('class'=>'vtip')); ?>                            
                        </li>
                        
						<?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='M')
                        {
                        	echo '<li class="ln_active">';
                        }                        
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','M'), Yii::app()->request->getUrl().'&val=M',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='N')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','N'), Yii::app()->request->getUrl().'&val=N',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='O')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','O'), Yii::app()->request->getUrl().'&val=O',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='P')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','P'), Yii::app()->request->getUrl().'&val=P',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='Q')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','Q'), Yii::app()->request->getUrl().'&val=Q',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='R')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','R'), Yii::app()->request->getUrl().'&val=R',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='S')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','S'), Yii::app()->request->getUrl().'&val=S',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='T')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','T'), Yii::app()->request->getUrl().'&val=T',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='U')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','U'), Yii::app()->request->getUrl().'&val=U',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='V')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','V'), Yii::app()->request->getUrl().'&val=V',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='W')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','W'), Yii::app()->request->getUrl().'&val=W',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='X')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','X'), Yii::app()->request->getUrl().'&val=X',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='Y')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','Y'), Yii::app()->request->getUrl().'&val=Y',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        <?php 
						if(isset($_REQUEST['val']) and $_REQUEST['val']=='Z')
                        {
                        	echo '<li class="ln_active">';
                        }
                        else
                        {
                        	echo '<li>';
                        }
                        ?>
                        	<?php  echo CHtml::link(Yii::t('students','Z'), Yii::app()->request->getUrl().'&val=Z',array('class'=>'vtip')); ?>                            
                        </li>
                        
                        </ul>
                        
                    	<div class="clear"></div>
                    </div><!-- END div class="letterNavCon" -->
                </div> <!-- END div class="list_contner_hdng" -->
                <!-- END Alphabetic Sort -->
                
                <!-- List Content -->                                          
                
                    <div style="margin-top:20px; position:relative;">
                        <div class="clear"></div>
                        <div style="display: inline-block;margin-bottom: 14px;margin-top: 14px; width: 100%;">
                        <div style="float:left;">
                         <div class="bttns_addstudent">   
                      <ul>
                        	<!--<li><?php echo CHtml::link(Yii::t('students','Add Student'), array('create'),array('class'=>'addbttn last')); ?></li>-->
                                <li><?php echo CHtml::link(Yii::t('students','Delete All'),array('deleteall','id'=>$list),array('class'=>'addbttn last','confirm'=>'Are you sure you want to delete this?')); ?></li>

                      </ul>
                         </div>
                            9
                    </div> 
                            
                        </div>
                    </div>
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
                               <td style="text-align:center">
<!--                                    <div class="btn-group mailbox-checkall-buttons">
                                        <input id="ch" class="chkbox checkall" name="ch1" onclick="checkall()" type="checkbox">
                                    </div>-->
                                </td>
                                <td><?php echo Yii::t('students','Sl. No.');?></td>	
                                <td><?php echo Yii::t('students','Student Name');?></td>
                                <td><?php echo Yii::t('students','Admission No.');?></td>
                                <td><?php echo Yii::t('students','Email');?></td>
                                <td><?php echo Yii::t('students','Phone');?></td>
                                <td><?php echo Yii::t('students','Action');?></td>
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
                                <td><?php  //echo $form->checkBox($model,'attribute',array('value' => $list_1->id,"class" => "checkbox1","onclick"=>"selectcheck()")); ?></td>    
                                <td><?php echo $i; ?></td>
                                <td><?php echo CHtml::link($list_1->first_name.'  '.$list_1->middle_name.'  '.$list_1->last_name,array('view','id'=>$list_1->id)) ?></td>
                                <td><?php echo $list_1->admission_no ?></td>
                                <td><?php echo $list_1->email ?></td>
                                <td><?php echo $list_1->phone1 ?></td>
                               
                                    
                                <td class="listbx_subhdng"><?php echo CHtml::link(Yii::t('students','Edit'), array('update','id'=>$list_1->id)); ?><span> |</span>
                                                           
                                <?php echo CHtml::link(Yii::t('students','Delete'), array('delete','id'=>$list_1->id), array('confirm'=>'Are you sure you want to delete this')); ?>

                                    
                                </td>
                                <!--<td style="border-right:none;">Task</td>-->
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
$('body').click(function() {
	$('#load').hide();
   $('#name').hide();
   $('#admissionnumber').hide();
   $('#email').hide();
   $('#phone1').hide();
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
	if($("#joindatetxt").val().length <=0)
	{
		$('#joining').hide();
	}
});

$('.filterbxcntnt_inner').click(function(event){
   event.stopPropagation();
});

$('.load_filter').click(function(event){
   event.stopPropagation();
});

function rowdelete(id)
{
	 $("#"+id).fadeOut("slow");
}
</script>