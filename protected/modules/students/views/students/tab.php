<div class="emp_tab_nav">
    <ul style="width:730px;">
          <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='view')
	          {
		      echo CHtml::link(Yii::t('students','Profile'), array('view', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Profile'), array('view', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='assesments')
	          {
		      echo CHtml::link(Yii::t('students','Assessments'), array('assesments', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Assessments'), array('assesments', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='attentance')
	          {
		      echo CHtml::link(Yii::t('students','Attendance'), array('attentance', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Attendance'), array('attentance', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
        
        <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='fees')
	          {
		      echo CHtml::link(Yii::t('students','Fees'), array('fees', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Fees'), array('fees', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
                
                
                 <!--<li> 
		
        <?php     
	          /*if(Yii::app()->controller->action->id=='courses')
	          {
		      echo CHtml::link(Yii::t('students','Courses'), array('courses', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','Courses'), array('courses', 'id'=>$_REQUEST['id']));
			  }*/
	    ?>
		</li>-->
                
                <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='document')
	          {
		      echo CHtml::link(Yii::t('students','document'), array('document', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','document'), array('document', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
                
                 <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='electives')
	          {
		      echo CHtml::link(Yii::t('students','electives'), array('electives', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','electives'), array('electives', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
                
                 <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='achievements')
	          {
		      echo CHtml::link(Yii::t('students','achievements'), array('achievements', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','achievements'), array('achievements', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
                
                <li> 
		
        <?php     
	          if(Yii::app()->controller->action->id=='log')
	          {
		      echo CHtml::link(Yii::t('students','log'), array('log', 'id'=>$_REQUEST['id']),array('class'=>'active'));
			  }
			  else
			  {
	          echo CHtml::link(Yii::t('students','log'), array('log', 'id'=>$_REQUEST['id']));
			  }
	    ?>
		</li>
    <?php /*?><li><a href="#">Additional Notes</a></li><?php */?>
    </ul>
    </div>