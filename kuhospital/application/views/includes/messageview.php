
***************************************
*         KU BD HOSPITAL SYSTEM            *
***************************************
Doctor: <?php echo "$appointment->firstname $appointment->lastname"?>

Department: <?php echo $appointment->department ?>

Appointment Date: <?php echo $appointment->date ?>

Appointment Day: <?php echo $appointment->available_days ?>

Appionment Time : <?php echo "$appointment->start_time - $appointment->end_time" ?>

Appointment ID: <?php echo $appointment->appointment_id ?>

Serial No: <?php echo ($appointment->serial_no<=9)?"0$appointment->serial_no":$appointment->serial_no ?>

Full Name: <?php echo "$appointment->pfirstname $appointment->plastname " ?>

Patient ID: <?php echo $appointment->patient_id ?>

Problem: <?php echo $appointment->problem ?>
----------------------------
Thanks for using our service      
----------------------------                                
                   

  









                                    



         
                                            
                                           