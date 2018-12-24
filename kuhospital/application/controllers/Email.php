<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Email extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model([
            'website/appointment_model',
            'website/home_model' 
            
        ]); 

    } 

   public function app($appointment_id = null)
   
   {
    $this->load->library('session');


    $this->load->library('email');

    //  $patientid =P7OGZGC3;
    $subject = 'Hospital Appionment';
//    $message = '<p>Congratulations !! Your Appionment got set Successfully.Your Appionment id is '. $appointment_id .

//    ' Thanks for for being with us</p>';


//    $message= $this->load->view('includes/email');

//  //Get full html:
//  $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
//  <html xmlns="http://www.w3.org/1999/xhtml">
//  <head>
//     <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
//     <title>' . html_escape($subject) . '</title>
//     <style type="text/css">
//         body {
//             font-family: Arial, Verdana, Helvetica, sans-serif;
//             font-size: 16px;
//         }
//     </style>
//  </head>
//  <body>
//  ' . $message . '
//  </body>
//  </html>';
 // Also, for getting full html you may use the following internal method:
  //$body = $this->email->full_html($subject, $message);




 //$body = file_get_contents("localhost/application/controllers/test.html");
 
 
 $data['title'] = "Appointment Details";
 #-------------------------------#   
 $data['appointment'] = $this->appointment_model->read_by_id($appointment_id);
 if(empty($data['appointment'])) show_404();
 $data['setting'] = $this->home_model->setting();
 $data['latest_news'] = $this->home_model->latest_news(3);
 
 $body= $this->load->view('includes/email', $data,true); ##############EMAIL LAYOUT VIEW
 $message = $this->load->view('includes/messageview', $data,true); ####################### message layoput viw######

//  $emailto = $this->appointment_model->read_email($appointment_id);
   // $emailto = $this->appointment_model->read_by_id($appointment_id);

   //$send =  $emailto['Email'];

//    $pro_id =[];
//    foreach($this->data['appointment'] as $key => $val)
//    {
//        $pro_id[] = $val->Email;
//    }

   
    //  $email_send=  $_SESSION['accemail_data'];

      $email_send = $this->session->flashdata('item');
      $to_number =$this->session->flashdata('number');
    //$email_send = $this->appointment_model->read_email($appointment_id);
    
    // $this->data['result']    =   $this->appointment_model->read_email($appointment_id);
    
    // $email_send  = $this->data['appointment'][0]->email;

     $result = $this->email

     ->from('sougoto0220@gmail.com')
    // ->reply_to('sumonsorderkucse20@gmail.com')    // Optional, an account where a human being reads.
    // ->to('sumonsorderkucse20@gmail.com')
     ->reply_to($email_send)
     ->to($email_send)
    ->subject($subject)
    ->message($body)
    ->send();


    //step 1, get data, you can get these value from your database or any user submitted form.No need to urlencode here. Because it will send the data using POST method//
            


            //step 2, sendfunction//
// $to = "017xxxxxxx,016xxxxxxx";
$to=$to_nu
gr9tyyyu777777777777777777777777777777777777777777789-=mber;
$token = "9af42b37f3e6730d3c1ad8a538e4beae";
//$message = "Thanks  your appionment  id is '.$appointment->appointment_id.' , Your Appionment Time is: '.$appointment->start_time.' ";

$url = "http://api.greenweb.com.bd/api.php";


$data= array(
'to'=>"$to",
'message'=>"$message",
'token'=>"$token"333333
); // Add parameters in key value
$ch = curl_init(); // Initialize cURL
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
$smsresult = curl_exec($ch);

            //sendsms end//
			
   
 redirect('appointment_info/'.$appointment_id);
//  var_dump($result);
//  echo '<br />';
//  echo $this->email->print_debugger();

 

   }



}