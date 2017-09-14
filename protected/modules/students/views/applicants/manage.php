
<style>
    .drop select { width:159px;}
</style>


<?php
$this->breadcrumbs = array(
    'Students' => array('index'),
    'Manage',
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
<script>
$(document).ready(function() {
$(".s_no_but").click(function(){
	                $('.gridact_drop').hide();
	            
            	if ($("#"+this.id+'l').is(':hidden')){
					$('.ns_drop').hide();
				    $(".s_no_but").removeClass("ns_drop_hand");	
                	$("#"+this.id+'l').show();
					$("#"+this.id).addClass("ns_drop_hand");
					$(".gridact_drop").hide();
					
				}
            	else{
                	$("#"+this.id+'l').hide();
					$("#"+this.id).removeClass("ns_drop_hand");
            	}
            return false;
       			 });
				  $("#"+this.id+'l').click(function(e) {
            		e.stopPropagation();
        			});
        		
});
$(document).click(function() {
					
            		$('.ns_drop').hide();
					$(".s_no_but").removeClass("ns_drop_hand");
					
        			});
</script>
<script language="javascript">
    function details(id)
    {

        var rr = document.getElementById("dropwin" + id).style.display;

        if (document.getElementById("dropwin" + id).style.display == "block")
        {
            document.getElementById("dropwin" + id).style.display = "none";
        }
        if (document.getElementById("dropwin" + id).style.display == "none")
        {
            document.getElementById("dropwin" + id).style.display = "block";
        }
        //return false;


    }
</script>

<script language="javascript">
    function hide(id)
    {
        $(".drop").hide();
        $('#' + id).toggle();
    }
</script>

<script type="text/javascript">
    function MM_jumpMenu(targ, selObj, restore) { //v3.0
        eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
        if (restore)
            selObj.selectedIndex = 0;
    }
</script>
<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="247" valign="top">
                <?php $this->renderPartial('/default/left_side'); ?>
            </td>
            <td valign="top">
                <div class="cont_right formWrapper">
                    <h1><?php echo Yii::t('students', 'Manage Applicants'); ?></h1>

                    <!-- Save Filter, Load Filter, Clear All -->
                    <div class="search_btnbx">
                        <!--<div class="listsearchbx">
                        <ul>
                        <li><input class="listsearchbar listsearchtxt" name="" type="text" onblur="clearText(this)" onfocus="clearText(this)" value="Search for Contacts"  /></li>
                        <li><input src="images/list_searchbtn.png" name="" type="image" /></li>
                        </ul>
                        </div>-->
                        <?php $j = 0; ?>
                        <div id="jobDialog"></div>
                        <div class="contrht_bttns">
                            <?php
                            //echo "<pre>";
                            //print_r($list);exit;
                            ?>
                            <ul>
                                <li>
                                    <?php
                                    echo CHtml::ajaxLink('<span>' . Yii::t('students', 'Save Filter') . '</span>', $this->createUrl('Savedsearches/Create'), array(
                                        'onclick' => '$("#jobDialog").dialog("open"); return false;',
                                        'update' => '#jobDialog',
                                        'type' => 'GET', 'data' => array('val1' => Yii::app()->request->getUrl(), 'type' => '1'), 'dataType' => 'text',
                                            ), array('id' => 'showJobDialog', 'class' => 'saveic'));
                                    ?>
                                </li>

                                <li><a href="#" class="load_filter" onClick="hide('osload')"><span>
                                            <?php echo Yii::t('students', 'Load Filter'); ?></span></a> 
                                    <div id="osload" style="display:none; overflow-y:auto; height:auto; background:#fff; left:-40px; top:40px" class="drop">
                                        <div class="droparrow"></div>
                                        <ul class="loaddrop">
                                            <li style="text-align:center">
                                                <?php
                                                $data = Savedsearches::model()->findAllByAttributes(array('user_id' => Yii::app()->User->id, 'type' => '1'));
                                                if ($data != NULL) {
                                                    foreach ($data as $data1) {
                                                        echo '<span style="width:150px; float:left; ">';
                                                        echo CHtml::link($data1->name, $data1->url, array('class' => 'vtip'));
                                                        echo '</span>';
                                                        echo '<span>';
                                                        echo CHtml::link('<img src="images/cross.png" border="0" />', array('/savedsearches/deletestudent', 'user_id' => Yii::app()->User->id, 'sid' => $data1->id), array('confirm' => 'Are you sure you want to delete this?'));
                                                        echo '</span>';
                                                    }
                                                } else {
                                                    echo '<span style="color:#d30707;"><i>' . Yii::t('students', 'No Saved Searches') . '</i></span>';
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </div> <!-- END div id="load" -->
                                </li>

                                <li><?php echo CHtml::link('<span>' . Yii::t('students', 'Clear All') . '</span>', array('manage')); ?></li>

                            </ul>
                        </div> <!-- END div class="contrht_bttns" -->
                        <div class="bttns_imprtcntact">
                            <ul>
                                <?php /* ?> <li><a class=" import_contact last" href=""><?php echo Yii::t('students','Import Contact');?></a></li><?php */ ?>
                            </ul>
                        </div> <!-- END div class="bttns_imprtcntact" -->



                    </div> <!-- END div class="search_btnbx" -->

                    <!-- END Save Filter, Load Filter, Clear All -->

                    <div class="clear"></div>

                    <!-- Filters Box -->
                    <div class="filtercontner">
                        <div class="filterbxcntnt">
                            <!-- Filter List -->
                            <div class="filterbxcntnt_inner" style="border-bottom:#ddd solid 1px;">
                                <ul>
                                    <li style="font-size:12px"><?php echo Yii::t('students', 'Filter Your Applicants:'); ?></li>

                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'method' => 'get',
                                    ));
                                    ?>

                                    <!-- Name Filter -->
                                    <li>
                                        <div onClick="hide('name')" style="cursor:pointer;"><?php echo Yii::t('students', 'Name'); ?></div>
                                        <div id="name" style="display:none; width:202px; padding-top:0px; height:30px" class="drop" >
                                            <div class="droparrow" style="left:10px;"></div>
                                            <input type="search" placeholder="search" name="name" value="<?php echo isset($_GET['name']) ? CHtml::encode($_GET['name']) : ''; ?>" />
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- End Name Filter -->

                                    <!-- Registration Number Filter -->
                                    <li>
                                        <div onClick="hide('registrationnumber')" style="cursor:pointer;"><?php echo Yii::t('students', 'Registration number'); ?></div>
                                        <div id="registrationnumber" style="display:none;width:202px; padding-top:0px; height:30px" class="drop">
                                            <div class="droparrow" style="left:10px;"></div>
                                            <input type="search" placeholder="search" name="registrationnumber" value="<?php echo isset($_GET['registrationnumber']) ? CHtml::encode($_GET['registrationnumber']) : ''; ?>" />
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- End Registration Number Filter -->

                                    <!-- Batch Filter -->
                                    <li>
                                        <div onClick="hide('batch')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Course'); ?></div>
                                        <div id="batch" style="display:none; color:#000; width:220px; height:30px; padding-left:10px; padding-top:0px; left:-200px" class="drop">
                                            <div class="droparrow" style="left:210px;"></div>
                                            <?php
                                           /* $data = CHtml::listData(Courses::model()->findAll('is_deleted=:x', array(':x' => '0'), array('order' => 'course_name DESC')), 'id', 'course_name');
                                            echo Yii::t('students', 'Course');
                                            echo CHtml::dropDownList('cid', '', $data, array('prompt' => 'Select',
                                                'ajax' => array(
                                                    'type' => 'POST',
                                                    'url' => CController::createUrl('Students/batch'),
                                                    'update' => '#course_id',
                                                    'data' => 'js:$(this).serialize()'
                                            )));
                                            echo '&nbsp;&nbsp;&nbsp;';
                                            echo Yii::t('students', 'Course');
                                            $data1 = CHtml::listData(Courses::model()->findAll('is_deleted=:y', array(':y' => 0), array('order' => 'name DESC')), 'id', 'course_name');
                                            echo CHtml::activeDropDownList($model, 'course_id', $data1, array('prompt' => 'Select', 'id' => 'course_id'));*/
                                            echo CHtml::activeDropDownList($model, 'course_id', CHtml::listData(Courses::model()->findAll('is_deleted=:y', array(':y' => 0), array('order' => 'name DESC')), 'id', 'course_name'), array('prompt' => 'Select')); 
                                            ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- END Batch Filter -->

                                    <!-- Gender Filter -->
                                    <li>
                                        <div onClick="hide('gender')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Gender'); ?></div>
                                        <div id="gender" style="display:none; width:191px; padding-top:0px; height:30px" class="drop">
                                            <div class="droparrow" style="left:10px;"></div>
                                            <?php
                                            echo CHtml::activeDropDownList($model, 'gender', array('M' => 'Male', 'F' => 'Female'), array('prompt' => 'All'));
                                            ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- End Gender Filter -->

                                    <!-- Blood Group Filter -->
                                    <li>
                                        <div onClick="hide('bloodgroup')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Blood Group'); ?></div>
                                        <div id="bloodgroup" style="display:none;width:191px; padding-top:0px; height:30px" class="drop" >
                                            <div class="droparrow" style="left:10px;"></div>
                                            <?php
                                            echo CHtml::activeDropDownList($model, 'blood_group', array('A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-', 'AB+' => 'AB+', 'AB-' => 'AB-'), array('prompt' => 'Select'));
                                            ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- END Blood Group Filter -->

                                    <!-- Nationality Filter -->
                                    <li>
                                        <div onClick="hide('nationality')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Country'); ?></div>
                                        <div id="nationality" style="display:none;width:191px; padding-top:0px; left:-180px; height:30px;" class="drop">
                                            <div class="droparrow" style="left:189px;"></div>
                                            <?php echo CHtml::activeDropDownList($model, 'nationality_id', CHtml::listData(Countries::model()->findAll(), 'id', 'name'), array('prompt' => 'Select')); ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- END Nationality Filter -->

                                    <!-- Date of Birth Filter -->
                                    <?php
                                    $settings = UserSettings::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
                                    if ($settings != NULL) {
                                        $date = $settings->dateformat;
                                    } else
                                        $date = 'dd-mm-yy';
                                    ?>
                                    <li>
                                        <div onClick="hide('dob')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Date Of Birth'); ?></div>
                                        <div id="dob" style="display:none; width:340px; left:-250px; height:30px; padding-top:0px;" class="drop">
                                            <div class="droparrow" style=" left:280px"></div>
                                            <?php echo CHtml::activeDropDownList($model, 'dobrange', array('1' => 'less than', '2' => 'equal to', '3' => 'greater than'), array('prompt' => 'Option')); ?>                            
                                            <?php
                                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                'name' => 'Applicants[date_of_birth]',
                                                'model' => $model,
                                                'value' => $model->date_of_birth,
                                                'options' => array(
                                                    'showAnim' => 'fold',
                                                    'dateFormat' => $date,
                                                    'changeMonth' => true,
                                                    'changeYear' => true,
                                                    'yearRange' => '1900:'
                                                ),
                                                'htmlOptions' => array(
                                                    'style' => 'height:20px;',
                                                    'id' => 'dobtxt',
                                                ),
                                            ));
                                            ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- END Date of Birth Filter -->

                                    <!-- Registration Date Filter -->
                                    <li>
                                        <div onClick="hide('registration')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Registration Date'); ?></div>
                                        <div id="registration" style="display:none;width:340px; left:-190px;  height:30px; padding-top:0px;" class="drop">
                                            <div class="droparrow" style=" left:200px"></div>
                                            <?php echo CHtml::activeDropDownList($model, 'registrationrange', array('1' => 'less than', '2' => 'equal to', '3' => 'greater than'), array('prompt' => 'Option')); ?>
                                            <?php
                                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                'name' => 'Applicants[registration_date]',
                                                'model' => $model,
                                                'value' => $model->registration_date,
                                                'options' => array(
                                                    'showAnim' => 'fold',
                                                    'dateFormat' => $date,
                                                    'changeMonth' => true,
                                                    'changeYear' => true,
                                                    'yearRange' => '1900:'
                                                ),
                                                'htmlOptions' => array(
                                                    'style' => 'height:20px;',
                                                    'id' => 'admdatetxt'
                                                ),
                                            ));
                                            ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- END Registration Date Filter -->

                                    <!-- Status Filter -->
                                    <li>
                                        <div onClick="hide('status')" style="cursor:pointer;"><?php echo Yii::t('Applicants', 'Status'); ?></div>
                                        <div id="status" style="display:none; width:191px; min-height:30px; left:-120px; padding-top:0px;" class="drop">
                                            <div class="droparrow"  style="left:140px"></div>
                                            <?php
                                            echo CHtml::activeDropDownList($model, 'status', array('1' => 'Pending', '2' => 'Approved', '3' => 'Rejected', '4' => 'Waiting List'), array('selected' => 'selected', 'prompt' => 'All'));
                                            ?>
                                            <input type="submit" value="Apply" />
                                        </div>
                                    </li>
                                    <!-- END Status Filter -->
                                    <?php $this->endWidget(); ?>

                                </ul>
                                <div class="clear"></div>
                            </div> <!-- END div class="filterbxcntnt_inner" -->
                            <!-- END Filter List -->

                            <div class="clear"></div>

                            <!-- Active Filter List -->
                            <div class="filterbxcntnt_inner_bot">
                                <div class="filterbxcntnt_left"><?php echo Yii::t('students', '<strong>Active Filters:</strong>'); ?></div>
                                <div class="clear"></div>
                                <div class="filterbxcntnt_right">
                                    <ul>

                                        <!-- Name Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['name']) and $_REQUEST['name'] != NULL) {
                                            $j++;
                                            ?>
                                            <li>Name : <?php echo $_REQUEST['name'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&name=' ?>"></a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-- END Name Active Filter -->

                                        <!-- Registration Number Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['registrationnumber']) and $_REQUEST['registrationnumber'] != NULL) {
                                            $j++;
                                            ?>
                                            <li>Registration number : <?php echo $_REQUEST['registrationnumber'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&registrationnumber=' ?>"></a></li>								
                                            <?php
                                        }
                                        ?>
                                        <!-- END Registration Number Active Filter -->


                                        <!-- Batch Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['course_id']) and $_REQUEST['Applicants']['course_id'] != NULL) {
                                            $j++;
                                            ?>
                                        <li>Course : <?php echo Courses::model()->findByAttributes(array('id' => $_REQUEST['Applicants']['course_id']))->course_name ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[course_id]=' ?>"></a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-- END Batch Active Filter -->


                                        <!-- Gender Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['gender']) and $_REQUEST['Applicants']['gender'] != NULL) {
                                            $j++;
                                            if ($_REQUEST['Applicants']['gender'] == 'M')
                                                $gen = 'Male';
                                            else
                                                $gen = 'Female';
                                            ?>
                                            <li>Gender : <?php echo $gen ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[gender]=' ?>"></a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-- END Gender Active Filter -->


                                        <!-- Blood Group Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['blood_group']) and $_REQUEST['Applicants']['blood_group'] != NULL) {
                                            $j++;
                                            ?>
                                            <li>Blood Group : <?php echo $_REQUEST['Applicants']['blood_group'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[blood_group]=' ?>"></a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-- END Blood Group Active Filter -->

                                        <!-- Nationality Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['nationality_id']) and $_REQUEST['Applicants']['nationality_id'] != NULL) {
                                            $j++;
                                            ?>
                                            <li>Country : <?php echo Countries::model()->findByAttributes(array('id' => $_REQUEST['Applicants']['nationality_id']))->name ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[nationality_id]=' ?>"></a></li>
                                            <?php
                                        }
                                        ?>
                                        <!-- END Nationality Active Filter -->


                                        <!-- Date of Birth Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['dobrange']) and $_REQUEST['Applicants']['dobrange'] != NULL) {
                                            if (isset($_REQUEST['Applicants']['date_of_birth']) and $_REQUEST['Applicants']['date_of_birth'] != NULL) {
                                                $j++;
                                                if ($_REQUEST['Applicants']['dobrange'] == '1') {
                                                    $range = 'less than';
                                                }
                                                if ($_REQUEST['Applicants']['dobrange'] == '2') {
                                                    $range = 'equal to';
                                                }
                                                if ($_REQUEST['Applicants']['dobrange'] == '3') {
                                                    $range = 'greater than';
                                                }
                                                ?>
                                                <li>Date Of Birth : <?php echo $range . ' : ' . $_REQUEST['Applicants']['date_of_birth'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[date_of_birth]=' ?>"></a></li>
                                                <?php
                                            }
                                        } elseif (isset($_REQUEST['Applicants']['dobrange']) and $_REQUEST['Applicants']['dobrange'] == NULL) {
                                            if (isset($_REQUEST['Applicants']['date_of_birth']) and $_REQUEST['Applicants']['date_of_birth'] != NULL) {
                                                $j++;
                                                $range = 'equal to';
                                                ?>
                                                <li>Date Of Birth : <?php echo $range . ' : ' . $_REQUEST['Applicants']['date_of_birth'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[date_of_birth]=' ?>"></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <!-- END Date of Birth Active Filter -->


                                        <!-- Registration Date Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['registrationrange']) and $_REQUEST['Applicants']['registrationrange'] != NULL) {
                                            if (isset($_REQUEST['Applicants']['registration_date']) and $_REQUEST['Applicants']['registration_date'] != NULL) {
                                                $j++;
                                                if ($_REQUEST['Applicants']['registrationrange'] == '1') {
                                                    $registrationrange = 'less than';
                                                }
                                                if ($_REQUEST['Applicants']['registrationrange'] == '2') {
                                                    $registrationrange = 'equal to';
                                                }
                                                if ($_REQUEST['Applicants']['registrationrange'] == '3') {
                                                    $registrationrange = 'greater than';
                                                }
                                                ?>
                                                <li>Registration Date : <?php echo $registrationrange . ' : ' . $_REQUEST['Applicants']['registration_date'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[registration_date]=' ?>"></a></li>
                                                <?php
                                            }
                                        } elseif (isset($_REQUEST['Applicants']['registrationrange']) and $_REQUEST['Applicants']['registrationrange'] == NULL) {
                                            if (isset($_REQUEST['Applicants']['registration_date']) and $_REQUEST['Applicants']['registration_date'] != NULL) {
                                                $j++;
                                                $registrationrange = 'equal to';
                                                ?>
                                                <li>Registration Date : <?php echo $registrationrange . ' : ' . $_REQUEST['Applicants']['registration_date'] ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[registration_date]=' ?>"></a></li>
                                                <?php
                                            }
                                        }
                                        ?> 
                                        <!-- END Registration Date Active Filter -->

                                        <!-- Status Active Filter -->
                                        <?php
                                        if (isset($_REQUEST['Applicants']['status']) and $_REQUEST['Applicants']['status'] != NULL) {
                                            $j++;
                                            if ($_REQUEST['Applicants']['status'] == '1') {
                                                $status = 'Pending';
                                            } elseif($_REQUEST['Applicants']['status'] == '2') {
                                                $status = 'Approved';
                                            } elseif($_REQUEST['Applicants']['status'] == '3') {
                                                $status = 'Rejected';
                                            }elseif($_REQUEST['Applicants']['status'] == '4') {
                                                $status = 'Waiting List';
                                            }
                                            ?>
                                            <li>Status : <?php echo $status ?><a href="<?php echo Yii::app()->request->getUrl() . '&Applicants[status]=' ?>"></a></li>
                                            <?php
                                        }
                                        ?> 
                                        <!-- END Registration Date Active Filter -->
                                        <?php
                                        if ($j == 0) {
                                            echo '<div style="padding-top:4px; font-size:11px;">' . Yii::t('Applicants', '<i>No Active Filters</i>') . '</div>';
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
                                if ((isset($_REQUEST['val']) and $_REQUEST['val'] == NULL) or ( !isset($_REQUEST['val']))) {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('Applicants', 'All'), Yii::app()->request->getUrl() . '&val=', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'A') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'A'), Yii::app()->request->getUrl() . '&val=A', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'B') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'B'), Yii::app()->request->getUrl() . '&val=B', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'C') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'C'), Yii::app()->request->getUrl() . '&val=C', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'D') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'D'), Yii::app()->request->getUrl() . '&val=D', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'E') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'E'), Yii::app()->request->getUrl() . '&val=E', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'F') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'F'), Yii::app()->request->getUrl() . '&val=F', array('class' => 'vtip')); ?>                            

                                </li>
                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'G') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'G'), Yii::app()->request->getUrl() . '&val=G', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'H') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'H'), Yii::app()->request->getUrl() . '&val=H', array('class' => 'vtip')); ?>                            
                                </li>


                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'I') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>

                                <?php echo CHtml::link(Yii::t('students', 'I'), Yii::app()->request->getUrl() . '&val=I', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'J') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'J'), Yii::app()->request->getUrl() . '&val=J', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'K') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'K'), Yii::app()->request->getUrl() . '&val=K', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'L') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'L'), Yii::app()->request->getUrl() . '&val=L', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'M') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'M'), Yii::app()->request->getUrl() . '&val=M', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'N') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'N'), Yii::app()->request->getUrl() . '&val=N', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'O') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'O'), Yii::app()->request->getUrl() . '&val=O', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'P') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'P'), Yii::app()->request->getUrl() . '&val=P', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'Q') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'Q'), Yii::app()->request->getUrl() . '&val=Q', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'R') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'R'), Yii::app()->request->getUrl() . '&val=R', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'S') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'S'), Yii::app()->request->getUrl() . '&val=S', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'T') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'T'), Yii::app()->request->getUrl() . '&val=T', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'U') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'U'), Yii::app()->request->getUrl() . '&val=U', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'V') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'V'), Yii::app()->request->getUrl() . '&val=V', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'W') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'W'), Yii::app()->request->getUrl() . '&val=W', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'X') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'X'), Yii::app()->request->getUrl() . '&val=X', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'Y') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'Y'), Yii::app()->request->getUrl() . '&val=Y', array('class' => 'vtip')); ?>                            
                                </li>

                                <?php
                                if (isset($_REQUEST['val']) and $_REQUEST['val'] == 'Z') {
                                    echo '<li class="ln_active">';
                                } else {
                                    echo '<li>';
                                }
                                ?>
                                <?php echo CHtml::link(Yii::t('students', 'Z'), Yii::app()->request->getUrl() . '&val=Z', array('class' => 'vtip')); ?>                            
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
                                <div class="box-one">
                            <div class="bttns_addstudent-n">
                                <ul>
                                    <li><?php echo CHtml::link(Yii::t('applicants','Add Applicant'),array('create'),array('class'=>'formbut-n')) ?></li>
                                     
                                        <li> <a class="formbut-n" href="javascript:void(0)" id="delete_student">Delete Applicant</a>  </li> 
                                       
                                </ul>
                            </div>
                        </div>
                               <!-- <div class="contrht_bttns" style="margin: 61px 122px 0px 0px;padding: 0px 401px 0px 0px;">
                                    <ul>
                                        <li><?php echo CHtml::link(Yii::t('employees', 'Add Applicant'), array('create')); ?></li>

                                        <li><a href="javascript:void(0)" id="delete_student">Delete Applicant</a></li>



                                    </ul>
                                </div>-->
                                <div class="ea_pdf" style="top:0px; right:6px;">
                                    <?php echo CHtml::link('<img src="images/pdf-but.png">', array('applicants/managepdf'), array('target' => '_blank')); ?>
                                </div>
                            </div> 

                        </div>
                    </div>
                    <div id="success_flash" align="center" style=" color:#F00; display:none;"><h4>Selected applicant Deleted Successfully !</h4>
 
   </div>
                    <?php
                Yii::app()->clientScript->registerScript(
                        'myHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");', CClientScript::POS_READY
                );
                ?>
                    <?php if(Yii::app()->user->hasFlash('success')):?>
                    <div class="flash-success" style="color:#F00; padding-left:150px; font-size:15px">
                        <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="list_contner">
                        <div class="clear"></div>
                        <?php
                        if ($list) {
                            ?>
                            <div class="tablebx">  
                                <div class="pagecon">
                                    <?php
                                    $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $item_count,
                                        'pageSize' => $page_size,
                                        'maxButtonCount' => 5,
                                        //'nextPageLabel'=>'My text >',
                                        'header' => '',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));
                                    ?>
                                </div> <!-- End div class="pagecon" --> 

                                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="mytable">
                                    <tr class="tablebx_topbg">
                                        <td><input type="checkbox" name="checkall" id="checkall" value="all"/></td>
    <!--                                        <td><?php echo Yii::t('students', 'Sl. No.'); ?></td>	-->
                                        <td><?php echo Yii::t('students', 'Applicant Name'); ?></td>
                                        <td><?php echo Yii::t('students', 'Registration No.'); ?></td>
                                        <td><?php echo Yii::t('students', 'Course'); ?></td>
                                        <td><?php echo Yii::t('students', 'Gender'); ?></td>
                                        <td><?php echo Yii::t('students', 'Status'); ?></td>
                                        <td style="border-right:none;"><?php echo Yii::t('students', 'Actions'); ?></td>
                                    </tr>
                                    <?php
                                    if (isset($_REQUEST['page'])) {
                                        $i = ($pages->pageSize * $_REQUEST['page']) - 9;
                                    } else {
                                        $i = 1;
                                    }
                                    $cls = "even";
                                    ?>

                                    <?php
                                    foreach ($list as $list_1) {
                                        ?>
                                        <tr class=<?php echo $cls; ?>>
                                            <td><input type="checkbox" class="chk" name="chkCid[]" value="<?php echo $list_1->id; ?>"/></td>
        <!--                                            <td><?php echo $i; ?></td>-->
                                            <td style="text-align:left;"><?php echo CHtml::link($list_1->first_name . '  ' . $list_1->middle_name . '  ' . $list_1->last_name, array('view', 'id' => $list_1->id)) ?></td>
                                            <td><?php echo $list_1->registration_no ?></td>
                                            <?php
                                          
                                                $cours = Courses::model()->findByAttributes(array('id' => $list_1->course_id));
                                                 if ($cours != NULL) {
                                                ?>
                                                <td><?php echo $cours->course_name ; ?></td> 
                                                <?php
                                            } else {
                                                ?> 
                                                <td>-</td> 
                                                <?php
                                            }
                                            ?>

                                            <td>
                                                <?php
                                                if ($list_1->gender == 'M') {
                                                    echo 'Male';
                                                } elseif ($list_1->gender == 'F') {
                                                    echo 'Female';
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                
                                                <select name="Applicants[status]" class="Applicants_status" rel="<?php echo $list_1->id ?>"<?php echo ($list_1->status==2)?' disabled="true"':''?>>
                                                    <option value="1"<?php echo ($list_1->status==1)?' selected="selected"':''?>>Pending</option>
                                                    <option value="2"<?php echo ($list_1->status==2)?' selected="selected"':''?>>Approved</option>
                                                    <option value="3"<?php echo ($list_1->status==3)?' selected="selected"':''?>>Rejected</option>
                                                    <option value="4"<?php echo ($list_1->status==4)?' selected="selected"':''?>>Waiting List</option>
                                                </select>
                                            </td>
                                            <?php if($list_1->status==2){?>
                                              <td>
                                                <?php echo '-'; ?>
                                            </td>
                                        <?php } else { ?>
                                              <td align="center" class="act"><div style="position:relative"><span class="action_but" id="<?php echo $list_1->id ?>"></span>
                                            <div class="gridact_drop" id="<?php echo $list_1->id ?>a">
                                                <div class="gridact_arrow"></div>
                                                    <ul>
                                                        <!--<li><a href="#" class="grview">View</a></li>-->
                                                        <li><a href="index.php?r=students/applicants/update&id=<?php echo $list_1->id ?>" class="gredit">Edit</a></li>
                                                        <li><a href="<?php echo $list_1->id ?>" class="grdel">Delete</a></li>
                                                    </ul>
                                            </div>
                                            </div>
                                            </td>
                                          
                                            <?php } ?>
                                     <!-- <td>
                                                <a href="index.php?r=students/applicants/update&id=<?php echo $list_1->id ?>">Edit</a>
                                                <a rel="<?php //echo $list_1->id ?>" href="javascript:void(0)" class="deleteStudent">Delete</a>
                                            </td>-->
                                        </tr>
                                        <?php
                                        if ($cls == "even") {
                                            $cls = "odd";
                                        } else {
                                            $cls = "even";
                                        }
                                        $i++;
                                    }
                                    ?>
                                </table>

                                <div class="pagecon">
                                    <?php
                                    $this->widget('CLinkPager', array(
                                        'currentPage' => $pages->getCurrentPage(),
                                        'itemCount' => $item_count,
                                        'pageSize' => $page_size,
                                        'maxButtonCount' => 5,
                                        //'nextPageLabel'=>'My text >',
                                        'header' => '',
                                        'htmlOptions' => array('class' => 'pages'),
                                    ));
                                    ?>
                                </div> <!-- END div class="pagecon" 2 -->
                                <div class="clear"></div>
                            </div> <!-- END div class="tablebx" -->
                            <?php
                            //Strings for the delete confirmation dialog.
                            $del_con = Yii::t('students', 'Are you sure you want to delete this student category?');
                            $del_title=Yii::t('students', 'Delete Confirmation');
                            $del=Yii::t('students', 'Delete');
                            $cancel=Yii::t('students', 'Cancel');
                            ?>
  
                            <?php
                        } else {
                            echo '<div class="listhdg" align="center">' . Yii::t('students', 'Nothing Found!!') . '</div>';
                        }
                        ?>
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
    $('body').click(function () {
        $('#osload').hide();
        $('#name').hide();
        $('#registrationnumber').hide();
        $('#batch').hide();
        $('#cat').hide();
        $('#pos').hide();
        $('#grd').hide();
        $('#gender').hide();
        $('#marital').hide();
        $('#bloodgroup').hide();
        $('#nationality').hide();
        if ($("#dobtxt").val().length <= 0)
        {
            $('#dob').hide();
        }
        if ($("#admdatetxt").val().length <= 0)
        {
            $('#registration').hide();
        }
        $('#status').hide();

    });

    $('.filterbxcntnt_inner').click(function (event) {
        event.stopPropagation();
    });

    $('.load_filter').click(function (event) {
        event.stopPropagation();
    });

    $(".deleteStudent").click(function () {
        if (confirm("Are you sure you want to delete the applicant?")) {
            sid = $(this).attr("rel");
            self.location = "index.php?r=students/applicants/deletes&sid=" + sid;
        }
    });

    $('.Applicants_status').change(function () {
        
            sid = $(this).val();
            aid = $(this).attr('rel');
            const msg = (sid==2)?'Approved Application Cannot Be Revarted Back . Are You Sure ?':'Are you sure you want to change the status?';
        if (confirm(msg))
        {
            self.location = "index.php?r=students/applicants/changestatus&aid=" +aid+"&sid="+sid;
        }
    })

    $("#checkall").click(function () {
        if ($(this).is(':checked')) {
            $(".chk").attr("checked", "checked");
        } else {
            $(".chk").attr("checked", false);
        }

    });

    $(document).ready(function () {
        $("#delete_student").click(function () {
            if ($(".chk:checked").length == 0) {
                alert("Please select applicant to delete");
                return false;
            } else {
                //alert($(".chk:checked").length);

                var delIds = $(".chk:checked").map(function () {
                    return $(this).val();
                }).toArray();
                //console.log(delIds);

                if (confirm("Are you sure you want to delete selected applicant(s)?")) {
                    $.post("/sms/index.php?r=students/applicants/deleteselected", {"ids": delIds}, function (retVal) {
                        if (retVal == "success") {
                            //alert("Students deleted successfully");
                            window.location.reload();
                        } else {
                            alert("Applicants could not be deleted");
                        }

                    });
                }


            }

        });
    });
</script>
<script>
  $(function() {
      
      $. bind_crud= function(){
    
   


// DELETE

    var deletes = new Array();
    var dialogs = new Array();
    $('.grdel').each(function(index) {
        var id = $(this).attr('href');
        deletes[id] = function() {
            $.ajax({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl;?>/index.php?r=students/applicants/ajax_delete",
                data:{"sid":id,"YII_CSRF_TOKEN":"<?php echo Yii::app()->request->csrfToken;?>"},
                    beforeSend : function() {
                    $("#student-categories-grid").addClass("ajax-sending");
                },
                complete : function() {
                    $("#student-categories-grid").removeClass("ajax-sending");
                },
                success: function(data) {window.location.reload();
                    var res = jQuery.parseJSON(data);
                     var page=$("li.selected  > a").text();
                    $.fn.yiiGridView.update('student-categories-grid', {url:'<?php echo Yii::app()->request->getUrl()?>',data:{"StudentCategories_page":page}});
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
																	 $("#success_flash").css("display","block").animate({opacity: 3.0}, 3000).fadeOut("slow");
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