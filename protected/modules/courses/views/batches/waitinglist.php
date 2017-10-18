<?php
$this->breadcrumbs=array(
	'Batches'=>array('/courses'),
	'Batches',
);
?>
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
              <?php //  echo '<br><div class="notifications nt_red" style="padding-top:10px">'.'<i>'.Yii::t('Batch','Registered students with waiting status will display here').'</i></div>'; ?>
  <div class="table_listbx">
     <?php
                if(isset($_REQUEST['id']))
                {
                $posts= Applicants::model()->findAll("batch_id=:x and status=:y ", array(':x'=>$_REQUEST['id'],':y'=> 4));
		 if($posts!=NULL)
				{
                        		
                ?>
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr class="listbxtop_hdng">
                    <td ><?php echo Yii::t('Batch','Sl no.');?></td>
                    <td ><?php echo Yii::t('Batch','Student Name');?></td>
                    
                    <td ><?php echo Yii::t('Batch','Action');?></td>
                    </tr>
                        <?php
                        
                       
						$i=0;
                            foreach($posts as $posts_1)
                            {
								$i++;
								echo '<tr>';
								echo '<td>'.$i.'</td>';
//                                                                $stud= Students::model()->findAll("id=:x",array(':x'=>$posts_1->student_id));
//                                                                foreach($stud as $stud_1){
                                echo '<td>'.CHtml::link(ucfirst( $posts_1->first_name).' '.ucfirst( $posts_1->middle_name).' '.ucfirst( $posts_1->last_name), array('/students/students/view', 'id'=> $posts_1->id)).'</td>';
								?>
								<td >
								<div style="position:absolute;">
								<div  id="<?php echo $i; ?>" class="act_but"><?php echo Yii::t('Batch','Actions');?></div>
								<div class="act_drop" id="<?php echo $i.'x'; ?>">
									<div class="but_bg_outer"></div><div class="but_bg"><div  id="<?php echo $i; ?>" class="act_but_hover"><?php echo Yii::t('Batch','Actions');?></div></div>
									<ul>
										<!--<li class="add"><?php // echo CHtml::link(Yii::t('Batch','Add Leave').'<span>'.Yii::t('Batch','for add leave').'</span>', array('#'),array('class'=>'addevnt','name' => $posts_1->id)) ?></li>-->
										<li class="delete"><?php echo CHtml::link(Yii::t('Batch','Approve').'<span>'.Yii::t('Batch','make applicant approve').'</span>', array('Approve','aid'=>$posts_1->id),array('confirm'=>'Are You Sure , Make Inactive ?')) ?></li>
                                        <!--<li class="edit"><a href="#">Edit Leave<span>for add leave</span></a></li>
										<li class="delete"><a href="#">Delete Leave<span>for add leave</span></a></li>
										<li class="add"><a href="#">Add Fees<span>for add leave</span></a></li>
										<li class="add"><a href="#">Add Report<span>for add leave</span></a></li>-->
									</ul>
								</div>
                                <div class="clear"></div>
                                <div id="<?php echo $posts_1->id ?>"></div>
								</div>
								</td>
                            <?php }
                            ?>
                    </table>
                <?php    	
                }
				else
				{
					echo '<br><div class="notifications nt_red" style="padding-top:10px">'.'<i>'.Yii::t('Batch','No Waiting List Students are avaulable for this batch !').'</i></div>'; 
									
				}
				
				}
                ?>
    
    
 </div>
    </div>
    
    </div>
    </div>
     <?php    	
                }
				else
				{
					 echo '<div class="emp_right" style="padding-left:20px; padding-top:50px;">';
					 echo '<div class="notifications nt_red">'.'<i>'.Yii::t('Batch','Nothing Found!!').'</i></div>'; 
					 echo '</div>';
					
				}
                ?>
    </td>
  </tr>
</tbody></table>
</div>
