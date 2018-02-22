<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        public function actionSendmails()
        {
            $model= new Notifications;
                
            if(isset($_POST['Notifications']))
		{
//                echo "<pre/>";
//                print_r($_POST['Notifications']);
//                exit;
			$model->attributes=$_POST['Notifications'];   
                        if($model->save())
                        {
                            
                            $message = Yii::app()->sendgrid->createEmail();  
                            //shortcut to $message=new YiiSendGridMail($viewsPath);  
                            $message->setHtml('<p>Message content here with HTML</p>')  
                                ->setSubject('My Subject')   
                                ->addTo('sunilvanam10@gmail.com')  
                                ->setFrom('v.sunilkumar12@gmail.com');  
                            Yii::app()->sendgrid->send($message);
                            
//                             echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";
////                            
//                                $mail=Yii::app()->Smtpmail;
//                                $mail->IsSMTP();
//                               // $mail->SMTPDebug = 2;
//                                $mail->From = trim($mail->Username);
//                                $mail->Subject    = $model->subject;
//                                $mail->MsgHTML($model->message);
//                                $mail->AddAddress($model->to, "");
//                                if(!$mail->Send()) {
//                                    echo "Mailer Error: " . $mail->ErrorInfo;
//                                    exit;
//                                }else {
//                                    echo "Message sent!";
//                                    exit;
//                                }
                            
                            
                            
//                              Yii::import('application.extensions.phpmailer.JPhpMailer'); 
//                            $mail = new JPhpMailer; $mail->IsSMTP(); 
//                            $mail->SetLanguage("es", '/protected/extensions/phpMailer/language/');
//                            $mail->SMTPOptions = array(
//                                                        'ssl' => array(
//                                                        'verify_peer' => false,
//                                                        'verify_peer_name' => false,
//                                                        'allow_self_signed' => true
//                                                        )
//                                                        );
//                            $mail->SMTPSecure = "ssl";  
//                            $mail->Host = 'smtp.gmail.com'; 
//                            $mail->SMTPAutoTLS = false;
//                            $mail->SMTPAuth = true; 
//                            $mail->SMTPSecure = true; 
//                            $mail->Username = 'sunilvanam10@gmail.com'; 
//                            $mail->Port = '465'; 
//                            $mail->Password = '*sunil@1995/*'; 
//                            $mail->SMTPKeepAlive = true;  
//                            $mail->Mailer = "smtp"; 
//                            $mail->IsSMTP(); // telling the class to use SMTP  
                            
//                            $mail->CharSet = 'utf-8';  
//                            $mail->SMTPDebug  = 4;
//                            $mail->SetFrom('sunilvanam10@gmail.com', 'myname'); 
//                            $mail->Subject = 'PHPMailer Test Subject via GMail, basic with authentication'; 
//                            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
//                            $mail->MsgHTML('<h1>JUST A TEST!</h1>'); 
//                            $mail->AddAddress('v.sunilkumar12@gmail.com', 'John Doe'); $mail->Send();
//                            Yii::app()->user->setFlash('contact','Thank you for... as possible.');
//                            $this->refresh();
                            echo "sunil";
                            exit;
   
                            
                            
                        }
                }
       
   
                
                
                
//                echo "<pre/>";
//		print_r($_POST);
//                
//                        exit;
             
		// Uncomment the following line if AJAX validation is needed
		 //$this->performAjaxValidation($model);

		/*if(isset($_POST['Employees']))
		{
			$list = $_POST['Employees'];
			$model =$model->findByAttributes(array('id'=>$_REQUEST['id']));
				
				$model->home_address_line1 = $list['home_address_line1'];
				$model->home_address_line2 = $list['home_address_line2'];
				$model->home_city = $list['home_city'];
				$model->home_state = $list['home_state'];
				$model->home_country_id = $list['home_country_id'];
				$model->home_pin_code = $list['home_pin_code'];
				
				$model->office_address_line1 = $list['office_address_line1'];
				$model->office_address_line2 = $list['office_address_line2'];
				$model->office_city = $list['office_city'];
				$model->office_state = $list['office_state'];
				$model->office_country_id = $list['office_country_id'];
				$model->office_pin_code = $list['office_pin_code'];
				
				$model->office_phone1 = $list['office_phone1'];
				$model->office_phone2 = $list['office_phone2'];
				$model->mobile_phone = $list['mobile_phone'];
				$model->home_phone = $list['home_phone'];
				$model->email = $list['email'];
				$model->fax = $list['fax'];
				
				
				$model->user_id = $list['user_id'];
				$model->save();
			if($model->save())
			{
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}*/
            
		$this->render('sendmails',array(
			'model'=>$model,
		));
        }
}