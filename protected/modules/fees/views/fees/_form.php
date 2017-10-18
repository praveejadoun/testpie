 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" width="245">
                        <div class="cont_right formWrapper">
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
	<input class="FeeCategories_name" style="width:100% !important;" name="cname" id="cname" type="text" maxlength="250" />           
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
                 <textarea class="FeeCategories_description" style="width:100% !important; height:120px;" name="description" id="description"></textarea>
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
                <input class="FeeParticulars_name particular-name" placeholder="Particular Name" style="width:120px !important;" name="FeeParticulars[name][]" type="text" />
           </td>
            <td width="35%" valign="top">
                <input class="FeeParticulars_description" placeholder="Particular Description" style="width:200px !important;" name="FeeParticulars[description][]" type="text" />            </td>
            <td width="45%" valign="top">
                <select class="FeeParticulars_tax" style="width:100px !important;" name="FeeParticulars[tax][]">
<option value="">No Tax</option>
<option value="2">Tax1</option>
</select>            </td>
            <td width="45%" valign="top">
                <input class="FeeParticulars_tax" placeholder="Discount" style="width:70px !important;" name="FeeParticulars[discount_value][]" type="text" />
           </td>
           <td width="45%" valign="top">
                <select class="FeeParticulars_discount_type" style="width:100px !important;" name="FeeParticulars[discount_type][]"/>
                 <option value="1">%</option>
                 <option value="2">INR</option>
               </select>
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
	  <select class="particular-access-type" style="width:120px !important;" name="FeeParticularAccess[][access_type][]">
            <option value="1">Default</option>
            <option value="2">Admission number</option>
         </select>
        </td>                
	<td class="access-datas">
         <table>
          <tr>
           <td>
        	<select class="access-course" style="width:120px !important;" name="FeeParticularAccess[][course][]">
                   <option value="">All Courses</option>
                   <option value="1">Master of Science Degree</option>
                   <option value="2">Science/Engineering</option>
                   <option value="3">Humanities and Arts</option>
               </select>
           </td>
        <td>
       	   <select class="access-batch" style="width:120px !important;" name="FeeParticularAccess[][batch][]">
			<option value="">All Batch</option>
	   </select>
	</td>
        <td>
            <select style="width:120px !important;" name="FeeParticularAccess[][student_category_id][]">
              <option value="">All Categories</option>
              <option value="1">General</option>
            </select>
        </td>        
    </tr>
</table>				
	</td>
        <td>
<input placeholder="Amount" style="width:70px !important; padding-top:6px; padding-bottom:6px;" name="FeeParticularAccess[0][amount][0]" type="text" />
        </td>
        <td>
	   <div style="position:relative;">
            	<a href="javascript:void(0);" title="Click to remove access" class="remove-access fees-trash" style="top:-9px; right:-25px;" data-row="0">
		<a href="javascript:void(0)" onClick="javascript:closeAccessBox(this)">X</a>
		</a>
	   </div>
        </td>
	</tr>
	</table>
       </div>
     </div> 

 

  
    </div>
    <a href="javascript:void(0);" id="asish" title="Click to add access to another group" class="add-particular-access" style="font-size:12px;" data-row="0" onClick="javascript:cloneinnerbox(this)">
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
 <script>
$(document).ready(function(){

$("#add-fee-particular").click(function(){
  var clonedParticularBox = $(".fee-particulars").clone();
clonedParticularBox.find('.particular-access').slice(1).remove();
  clonedParticularBox.find('input').val('');
  $("#mdcontainer").append(clonedParticularBox);
});





});


function validateform(){
if(document.getElementById('cname').value==""){
  alert('Please enter category name');
  document.getElementById('cname').focus();
  return false;
}
else if(document.getElementById('description').value==""){
   alert('Please enter category description');
   document.getElementById('description').focus();
   return false;
}
}

function cloneinnerbox(thisObj){
 var clonedBox = $(".particular-access").first().clone();
clonedBox.find('.particular-access').slice(1).remove();
$(thisObj).prev(".particular-accesses-ap").append(clonedBox);
}
function closeAccessBox(thisObj){
	$(thisObj).closest('.particular-access').remove();
}

function closeParBox(thisObj){
$(thisObj).closest('.fee-particulars').remove();
}
</script>
