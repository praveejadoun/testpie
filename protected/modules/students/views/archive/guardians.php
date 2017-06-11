<style>
.drop select { width:159px;}
</style>

<?php
$this->breadcrumbs=array(
	'Students'=>array('default/index'),
        'Manage Guardians Archive',
	
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
	
}	
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
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    
      <?php $this->renderPartial('/default/left_side');?>
    
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
<h1><?php echo Yii::t('archive','Manage Guardians Archive');?></h1>
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
                          
                            <li><?php echo CHtml::link('<span>'.Yii::t('guardians','Clear All').'</span>', array('guardians')); ?></li>
                            
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
                                <li style="font-size:12px"><?php echo Yii::t('guardians','Filter Your Guardian:');?></li>
                                
                                <?php $form=$this->beginWidget('CActiveForm', array(
                                'method'=>'get',
                                )); ?>
                                
                                <!-- Name Filter -->
                                <li>
                                    <div onClick="hide('name')" style="cursor:pointer;"><?php echo Yii::t('guardians','Name');?></div>
                                    <div id="name" style="display:none; width:202px; padding-top:0px; height:30px" class="drop" >
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="name" value="<?php echo isset($_GET['name']) ? CHtml::encode($_GET['name']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                <!-- End Name Filter -->
                                
                                <!-- Email Filter -->
                                 <li>
                                    <div onClick="hide('email')" style="cursor:pointer;"><?php echo Yii::t('guardians','Email');?></div>
                                    <div id="email" style="display:none;width:202px; padding-top:0px; height:30px" class="drop">
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="email" value="<?php echo isset($_GET['email']) ? CHtml::encode($_GET['email']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                 <!-- End Email Filter -->
                                 
                                 <!-- Phone Filter -->
                              <!--  <li>
                                    <div onClick="hide('phone1')" style="cursor:pointer;"><?php echo Yii::t('guardians','Phone');?></div>
                                    <div id="phone1" style="display:none;width:202px; padding-top:0px; height:30px" class="drop">
                                        <div class="droparrow" style="left:10px;"></div>
                                        <input type="search" placeholder="search" name="phone1" value="<?php echo isset($_GET['phone1']) ? CHtml::encode($_GET['phone1']) : '' ; ?>" />
                                        <input type="submit" value="Apply" />
                                    </div>
                                </li>
                                 <!-- End Phone Filter -->
                               
                                <?php $this->endWidget(); ?>
                                
                            </ul>
                            <div class="clear"></div>
                        </div> <!-- END div class="filterbxcntnt_inner" -->
                        <!-- END Filter List -->
                        
                        <div class="clear"></div>
                        
                        <!-- Active Filter List -->
                        <div class="filterbxcntnt_inner_bot">
                            <div class="filterbxcntnt_left"><?php echo Yii::t('guardians','<strong>Active Filters:</strong>');?></div>
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
									if(isset($_REQUEST['mobile_phone']) and $_REQUEST['mobile_phone']!=NULL)
                                    { 
                                    	$j++; 
									?>
                                    	<li>Phone : <?php echo $_REQUEST['mobile_phone']?><a href="<?php echo Yii::app()->request->getUrl().'&mobile_phone='?>"></a></li>								
									<?php 
									}
									?>
                                     <!-- END Phone1 Active Filter -->
                                     
                                    <?php if($j==0)
                                    {
                                    	echo '<div style="padding-top:4px; font-size:11px;">'.Yii::t('guardians','<i>No Active Filters</i>').'</div>';
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
                        	<?php echo CHtml::link(Yii::t('guardians','All'), Yii::app()->request->getUrl().'&val=',array('class'=>'vtip')); ?>                            
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
                        	<?php echo CHtml::link(Yii::t('guardians','A'), Yii::app()->request->getUrl().'&val=A',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','B'), Yii::app()->request->getUrl().'&val=B',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','C'), Yii::app()->request->getUrl().'&val=C',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','D'), Yii::app()->request->getUrl().'&val=D',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','E'), Yii::app()->request->getUrl().'&val=E',array('class'=>'vtip')); ?>                            
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
                        <?php  echo CHtml::link(Yii::t('guardians','F'), Yii::app()->request->getUrl().'&val=F',array('class'=>'vtip')); ?>                            
                        
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
                        	<?php  echo CHtml::link(Yii::t('guardians','G'), Yii::app()->request->getUrl().'&val=G',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','H'), Yii::app()->request->getUrl().'&val=H',array('class'=>'vtip')); ?>                            
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
                        
                        	<?php  echo CHtml::link(Yii::t('guardians','I'), Yii::app()->request->getUrl().'&val=I',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','J'), Yii::app()->request->getUrl().'&val=J',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','K'), Yii::app()->request->getUrl().'&val=K',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','L'), Yii::app()->request->getUrl().'&val=L',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','M'), Yii::app()->request->getUrl().'&val=M',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','N'), Yii::app()->request->getUrl().'&val=N',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','O'), Yii::app()->request->getUrl().'&val=O',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','P'), Yii::app()->request->getUrl().'&val=P',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','Q'), Yii::app()->request->getUrl().'&val=Q',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','R'), Yii::app()->request->getUrl().'&val=R',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','S'), Yii::app()->request->getUrl().'&val=S',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','T'), Yii::app()->request->getUrl().'&val=T',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','U'), Yii::app()->request->getUrl().'&val=U',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','V'), Yii::app()->request->getUrl().'&val=V',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','W'), Yii::app()->request->getUrl().'&val=W',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','X'), Yii::app()->request->getUrl().'&val=X',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','Y'), Yii::app()->request->getUrl().'&val=Y',array('class'=>'vtip')); ?>                            
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
                        	<?php  echo CHtml::link(Yii::t('guardians','Z'), Yii::app()->request->getUrl().'&val=Z',array('class'=>'vtip')); ?>                            
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
                            <li><?php echo CHtml::link(Yii::t('guardians','Delete All'),array('deleteall','id'=>$list),array('class'=>'addbttn last','confirm'=>'Are you sure you want to delete this?')); ?></li>

                      </ul>
                         </div>
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
                                <td><?php echo Yii::t('guardians','Sl. No.');?></td>	
                                <td><?php echo Yii::t('guardians','Guardian Name');?></td>
                                <td><?php echo Yii::t('guardians','Email');?></td>
                                <td><?php echo Yii::t('guardians','Phone');?></td>
                                <td><?php echo Yii::t('guardians','Action');?></td>
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
                                <td><?php echo CHtml::link($list_1->first_name.' '.$list_1->last_name) ?></td>
                                <td><?php echo $list_1->email ?></td>
                                <td><?php echo $list_1->mobile_phone ?></td>
                                                                                              
                                <td class="listbx_subhdng"><?php echo CHtml::link(Yii::t('guardians','Edit'), array('update_1','id'=>$list_1->id)); ?><span> |</span>
                                                           
                                <?php echo CHtml::link(Yii::t('guardians','Delete'), array('deletes','id'=>$list_1->id),array('confirm'=>'Are you sure you want to delete this?')); ?>

                                  <?php // echo CHtml::link('Delete', array('deletes','id'=>$list_1->id), array(/*'success'=>'rowdelete('.$i.')'*/),array('confirm'=>'Do you want to delete this employee ?'));?>
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

</div>
    </td>
  </tr>
</table>
</body>
<script>
$('body').click(function() {
	$('#load').hide();
   $('#name').hide();
   $('#mobile_phone').hide();
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