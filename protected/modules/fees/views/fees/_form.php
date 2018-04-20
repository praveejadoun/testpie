<?php
//$form = $this->beginWidget('CActiveForm', array(
//    'id' => 'student-log-form',
//    'enableAjaxValidation' => false,
//    'htmlOptions' => array('enctype' => 'multipart/form-data'),
//        ));
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td valign="top" width="245">
            <div class="cont_right formWrapper" style="padding: 6px 20px 20px 0px;">
                <h1>Create Fees</h1>
                <div class="edit_bttns" style="width:175px; top:15px;"></div>
                <style>
                    .fee-particular-head{
                        padding:10px 15px;  background-color:#c5ced9;
                        color:#405875;
                        font-weight:bold;
                        position:relative;
                    }
                    .feeParticular{
                        border:1px solid #c5ced9; padding:15px;background-color:#fff; margin-bottom:20px;

                    }
                    .fees-trash{
                        position:absolute;
                        top:13px;
                        right:13px;
                        width:15px;
                        height:19px;
                        background:url(/images/fees-trash.png) no-repeat;

                    }

                    .applicable-to{
                        border:1px solid #c5ced9; padding:10px; margin-bottom:10px; background-color:#F9F9FD; margin-bottom:15px; margin-top:15px;
                    }
                    .error-brd{
                        border-color:#F30 !important;
                    }
                </style>
                <form name="fee-categories-form" id="fee-categories-form" action="index.php?r=fees/fees/create" method="post" onSubmit="javascript:return validateform()">
                    <div class="formCon">
                        <div class="formConInner" style="width:95%;">
                            <h3>Fee Category</h3>
                            <table width="98%">
                                <tr>
                                    <td width="10%">
                                        <label for="FeeCategories_name" class="required">Name <span class="required">*</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="FeeCategories_name" style="width:100% !important;" name="cname" id="cname" type="text" maxlength="250" required="required"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="FeeCategories_description">Description</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea class="FeeCategories_description" style="width:100% !important; height:120px;" name="description" id="description" required="required"></textarea>
                                    </td>
                                </tr>
                            </table>
                            <div class="clear"></div>
                            <br />
                            <br />
                            <h3 style="width:100%;">Fee Particulars</h3>
                            <div id="mdcontainer">
                                <!-- Fee particulars here -->
                                <div class="fee-particulars" >
                                    <div class="fee-particular" id="fee-particular-0"  data-row="0">
                                        <div class="fee-particular-head">
                                            <table width="100%">
                                                <tr>
                                                    <td width="22%"><label>Name<sup>*</sup></label></td>
                                                    <td width="33%"><label>Description</label></td>
                                                    <td width="17%"><label>Tax</label></td>
                                                    <td width="13%"><label>Discount</label></td>
                                                    <td width="45%"><label>&nbsp;<a href="javascript:void(0)" onClick="javascript:closeParBox(this)">X</a></label></td>
                                                </tr>
                                            </table>
                                            <a href="javascript:void(0);" title="Click to remove particular" class="remove-particular fees-trash"></a>
                                        </div>
                                        <div class="feeParticular">
                                            <table width="94%">
                                                <tr>
                                                    <td width="20%" valign="top">
                                                        <input class="FeeParticulars_name particular-name" placeholder="Particular Name" style="width:120px !important;" name="FeeParticulars[name][]" id="FeeParticulars[name][]" type="text" required="required"/>
                                                    </td>
                                                <div id="warning"></div>
                                                <td width="35%" valign="top">
                                                    <input class="FeeParticulars_description" placeholder="Particular Description"  name="FeeParticulars[description][]" type="text" required="required" />            </td>
                                                <td width="45%" valign="top">

                                                    <?php
                                                    $criteria = new CDbCriteria;
                                                    $mymodel = new feeCollectionParticulars;
                                                    ?>

                                                    <?php
                                                    echo CHtml::dropDownList('FeeParticulars[tax_id][]', $mymodel, CHtml::listData(Taxes::model()->findAll(), 'id', 'label'), array('empty' => 'No Tax', 'style' => 'padding:5px 3px;'));
                                                    ?>


                                                    <?php // echo $form->dropDownlist($mymodel,'FeeParticulars[student_id][]',CHtml::listData(Taxes::model()->findAll($criteria),'id','label'),array('prompt' =>'select')); ?>
<!--<select class="FeeParticulars_tax" style="width:100px !important;" name="FeeParticulars[tax][]">-->
                                                    <!--<option value="">No Tax</option>-->
                                                    <!--<option value="2">Tax1</option>-->
                                                    <!--</select> -->
                                                </td>
                                                <td width="45%" valign="top">
                                                    <input class="FeeParticulars_tax" placeholder="Discount" style="width:70px !important;" name="FeeParticulars[discount_value][]" type="text" />
                                                </td>
                                                <td width="45%" valign="top">

                                                    <?php echo CHtml::dropDownList('FeeParticulars[discount_type][]', $mymodel, array('1' => '%', '2' => 'INR'), array('style' => 'padding:5px 3px;')); ?>

<!--                <select class="FeeParticulars_discount_type" style="width:100px !important;" name="FeeParticulars[discount_type][]"/>
                 <option value="1">%</option>
                 <option value="2">INR</option>
               </select>-->
                                                </td>
                                                <td width="10%" valign="middle">
                                                </td>
                                                </tr>
                                            </table>
                                            <br />
                                            <h3>Applicable to:</h3>
                                            <div class="particular-accesses-ap">
                                                <div class="particular-access" data-row="0" id="toClo">
                                                    <div class="applicable-to">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <select class="particular-access-type" style="width:120px !important;padding:5px 3px;" name="FeeParticularAccess[0][access_type][]">
                                                                        <option value="1">Default</option>
                                                                        <option value="2">Admission number</option>
                                                                    </select>
                                                                </td>
                                                                <td class="access-datas">
                                                                    <table class="defaultApplicable">
                                                                        <tr>
                                                                            <td>
<!--                                                                                <select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
                                                                                    <option value="">Select Country</option>
                                                                                <?php
//                                                                                    $results = Courses::model()->findAll();
//                                                                                    foreach($results as $country) {
                                                                                ?>
                                                                                    <option value="<?php echo $country["id"]; ?>"><?php echo $country["course_name"]; ?></option>
                                                                                <?php
//                                                                                    }
                                                                                ?>
                                                                                    </select>-->
                                                                                <?php
                                                                                $criteria = new CDbCriteria;
                                                                                $criteria->condition = 'is_deleted=:is_del';
                                                                                $criteria->params = array(':is_del' => 0);
                                                                                ?>
                                                                                <?php
//                                                                                        echo CHtml::dropDownList($mymodel, 'FeeParticularAccess[0][course][]', CHtml::listData(Courses::model()->findAll($criteria),'id','concatened'),
//                                                                                          array(
//                                                                                              'class' => 'particular-access-course',
//                                                                                              'prompt' => 'Select the Course',
//                                                                                              'style'=>'width:177px !important',
//                                                                                              'ajax' => array(
//                                                                                                  'type' => 'POST',
//                                                                                                  'url' => CController::createUrl('Subjects/getCitiesByCountryId'),
//                                                                                                  'update' => '#batch_id',
//                                                                                                  'data' => array('course_id' => 'js:this.value'),
//                                                                                              )
//                                                                                          )
//                                                                                      );
                                                                                ?>
                                                                                <?php
                                                                                echo CHtml::dropDownList('FeeParticularAccess[0][course][]', $mymodel, CHtml::listData(Courses::model()->findAll($criteria), 'id', 'concatened'), array(
                                                                                    'empty' => 'All Courses',
                                                                                    'style' => 'padding:5px 3px;',
                                                                                    'class' => 'particular-access-course',
                                                                                    'ajax' => array(
                                                                                        'type' => 'POST',
                                                                                        'url' => CController::createUrl('Fees/getCitiesByCountryId'),
                                                                                        'update' => '#batch_id',
                                                                                        'data' => array('course_id' => 'js:this.value'),
                                                                                    )
                                                                                ));
                                                                                ?>
                                                                            </td>
                                                                            <td>
<!--                                                                                <select name="state" id="state-list" class="demoInputBox">
                                                                                    <option value="">Select State</option>
                                                                                </select>-->

                                                                                <?php
                                                                                echo CHtml::dropDownList('FeeParticularAccess[0][batch][]', $mymodel, CHtml::listData(Batches::model()->findAll(), 'id', 'name'), array('empty' => 'All Batches', 'class' => 'particular-access-batch', 'style' => 'padding:5px 3px;'));
                                                                                ?>
<!--<select class="access-batch" style="width:120px !important;" name="FeeParticularAccess[][batch][]">
            <option value="">All Batch</option>
</select>-->
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                echo CHtml::dropDownList('FeeParticularAccess[0][student_category_id][]', $mymodel, CHtml::listData(StudentCategories::model()->findAll(), 'id', 'name'), array('empty' => 'All Category', 'class' => 'particular-access-studentcategory', 'style' => 'padding:5px 3px'));
                                                                                ?>
                                                                                <!--<select style="width:120px !important;" name="FeeParticularAccess[][student_category_id][]">
                                                                                  <option value="">All Categories</option>
                                                                                  <option value="1">General</option>
                                                                                </select>-->
                                                                            </td>
                                                                        </tr>
                                                                    </table>

                                                                    <table class="admNoApplicable" style="display:none;">
                                                                        <tr>
                                                                            <td>
                                                                                <input class="FeeParticularAccessadmissionNo" placeholder="Admission Numbers seperated by commas" style="width:300px !important;" name="FeeParticularAccess[0][admission_numbers][]" type="text" />
                                                                            </td>

                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td>
                                                                    <input placeholder="Amount" style="width:70px !important; padding-top:6px; padding-bottom:6px;" class="particular-access-amount" name="FeeParticularAccess[0][amount][]" type="text" required="required" />
                                                                </td>
                                                                <td>
                                                                    <div style="position:relative;">
                                                                        <a href="javascript:void(0);" title="Click to remove access" class="remove-access fees-trash" style="top:-9px; right:-25px;" data-row="0" onClick="javascript:closeAccessBox(this)">X</a>
                                                                        </a>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>




                                            </div>
                                            <a href="javascript:void(0);" title="Click to add access to another group" class="add-particular-access" style="font-size:12px;" data-row="0" onClick="javascript:cloneinnerbox(this)">
                                                <strong>+ Add access</strong>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fee particulars here -->
                            </div>



                        </div>
                    </div>
                    <div>
                        <table width="94%">
                            <tr>
                                <td colspan="3">
                                    <a href="javascript:void(0);" title="Click to add another particular" id="add-fee-particular" style="font-size:14px;">
                                        <strong>+ Add particular</strong>
                                    </a>
                                        <!--<strong>/</strong>
                                        <a title="Press `Ctrl + Enter` to add another particular">
                                                <strong>{ Press Ctrl + Enter }</strong>
                                        </a>-->
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="row buttons">
                        <input class="formbut" type="submit" value="Setup Subscriptions &gt;&gt;" />
                    </div>
                </form>
            </div>
        </td>
    </tr>
</table>
</td>
</tr>
</table>
</div>
<!-- content -->
</div>
<div class="clear"></div>
</div>
</div>
<?php //$this->endWidget();  ?>
<script>
    $(document).ready(function () {


        $("#mdcontainer").on('change', '.particular-access-type', function () {
            if ($(this).val() == 1) {
                $(this).closest('.particular-access').find('.defaultApplicable').show();
                $(this).closest('.particular-access').find('.admNoApplicable').hide();

            } else {

                $(this).closest('.particular-access').find('.defaultApplicable').hide();
                $(this).closest('.particular-access').find('.admNoApplicable').show();
            }

        });


        $("#add-fee-particular").click(function () {
            //alert($(".fee-particulars").size());
            var clonedParticularBox = $(".fee-particulars").last().clone();
            var numBox = clonedParticularBox.find('.particular-access').length;
            if (numBox > 1)
            {
                clonedParticularBox.find('.particular-access').slice(1).remove();
            }

            if (clonedParticularBox.find(".particular-access-type").length == 1) {
                //alert($(".fee-particulars").size());
                var temp = $(".fee-particulars").length;
//                    alert($(".fee-particulars").length);
                //if ($(".fee-particulars").size() > 1) {
                //dRow = clonedParticularBox.find('.add-particular-access').attr('data-row');
                //  alert(dRow);

                //alert(dRow);
                var nname = "FeeParticularAccess[" + temp + "][access_type][]";
                clonedParticularBox.find(".particular-access-type").attr('name', nname);

                var couname = "FeeParticularAccess[" + temp + "][course][]";
                clonedParticularBox.find(".particular-access-course").attr('name', couname);

                var batname = "FeeParticularAccess[" + temp + "][batch][]";
                clonedParticularBox.find(".particular-access-batch").attr('name', batname);

                var scname = "FeeParticularAccess[" + temp + "][student_category_id][]";
                clonedParticularBox.find(".particular-access-studentcategory").attr('name', scname);

                var amtname = "FeeParticularAccess[" + temp + "][amount][]";
                clonedParticularBox.find(".particular-access-amount").attr('name', amtname);

                var admname = "FeeParticularAccess[" + temp + "][admission_numbers][]";
                clonedParticularBox.find(".FeeParticularAccessadmissionNo").attr('name', admname);



            }

            clonedParticularBox.find('input').val('');
            var lastDataRow = clonedParticularBox.find('.add-particular-access').attr('data-row');
            //alert(lastDataRow);
            var newdatarow = parseInt(lastDataRow) + parseInt(1);
            //alert(newdatarow);
            clonedParticularBox.find('.add-particular-access').attr('data-row', newdatarow)
            //alert(clonedParticularBox.find('.add-particular-access').attr('data-row'));
            $("#mdcontainer").append(clonedParticularBox);
        });





    });


    function validateform() {
        if (document.getElementByClassName('FeeParticularAccessadmissionNo').value == "") {
            alert("sunil");

            return false;
        }
//         var temp = $(".fee-particulars").length;
//        alert($(".fee-particulars").length);
//       var sun = $(".FeeParticulars[name][]").length;
//        alert($("FeeParticulars[name][]").length);
//        var temp = $(".fee-particulars").length;
//        if(document.getElementByName('FeeParticularAccess[0][amount][]').value==""){
//            alert('Please enter category amount');
//            document.getElementByName('FeeParticularAccess[0][amount][]').focus();
//            return false;
//        }else


//        if (document.getElementById('cname').value == "") {
//            alert('Please enter category name');
//            document.getElementById('cname').focus();
//            return false;
//        } else if (document.getElementById('description').value == "") {
//            alert('Please enter category description');
//            document.getElementById('description').focus();
//            return false;
//        }
//        }else if (document.getElementById('FeeParticulars[name][]').value == ""){
//            alert('Please enter Particular Name');
//            document.getElementById('FeeParticulars[name][]').focus();
//            return false;
//        }
//          var x = document.getElementsByName("FeeParticularAccess[0][amount][]").length;
//          if(document.getElementByName("FeeParticularAccess[0][amount][]").value == "")
//          alert(x);
    }

    function cloneinnerbox(thisObj) {
        var dataRow = $(thisObj).attr('data-row');

        var clonedBox = $(".particular-access").first().clone();
        if (dataRow != 0) {
            var newname = "FeeParticularAccess[" + dataRow + "][access_type][]";
            clonedBox.find(".particular-access-type").attr('name', newname);

            var newname = "FeeParticularAccess[" + dataRow + "][course][]";
            clonedBox.find(".particular-access-course").attr('name', newname);

            var newname = "FeeParticularAccess[" + dataRow + "][batch][]";
            clonedBox.find(".particular-access-batch").attr('name', newname);

            var newname = "FeeParticularAccess[" + dataRow + "][student_category_id][]";
            clonedBox.find(".particular-access-studentcategory").attr('name', newname);

            var newmname = "FeeParticularAccess[" + dataRow + "][amount][]";
            clonedBox.find(".particular-access-amount").attr('name', newmname);

            var newmname = "FeeParticularAccess[" + dataRow + "][admission_numbers][]";
            clonedBox.find(".FeeParticularAccessadmissionNo").attr('name', newmname);

            //alert(clonedBox.find(".particular-access-amount").attr('name'));
            //Manage other dropdown 3

        }




        clonedBox.find('.particular-access').slice(1).remove();
        clonedBox.find('.admNoApplicable').css("display", "none");
        clonedBox.find('.defaultApplicable').css("display", "block");
        $(thisObj).prev(".particular-accesses-ap").append(clonedBox);
    }
    function closeAccessBox(thisObj) {
        $(thisObj).closest('.particular-access').remove();
    }

    function closeParBox(thisObj) {
        $(thisObj).closest('.fee-particulars').remove();
    }



</script>
<script>
    function getState(val) {
        $.ajax({
            type: "POST",
            url: "get_state.php",
            data: 'course_id=' + val,
            success: function (data) {
                $("#state-list").html(data);
            }
        });
    }

</script>

<script type="text/javascript">
    $('#book_serices_id').change(function () {
        var book_serices_id = $(this).val();
        $.ajax({
            type: "POST",
            dataType: 'html',
            method: 'POST',
            data: {'book_serices_id': book_serices_id},
            url: "<?php echo Yii::app()->baseUrl; ?>/index.php?r=fees/fees/select_books",
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                // alert(data.length);
                var selOpts = "<option value=''> Select Book </option>";
                for (i = 0; i < data.length; i++)
                {
                    var id = data[i]['id'];
                    var val = data[i]['book_name'];
                    selOpts += "<option value='" + id + "' >" + val + "</option>";
                }

                $('#books_id').html(selOpts);
<?php
if (isset($web_support->books_id)) {
    echo '$("#books_id").val(' . $web_support->books_id . ');';
}
?>
            },
            error: function (se) {
                console.log(se);
            }
        });
    }).change();

</script>
