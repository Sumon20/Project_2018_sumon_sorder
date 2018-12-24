<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">

<head>
  <meta name="viewport" content="width=device-width" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--fgmgMediaReplacePlaceholder-->
  <meta name="robots" content="noindex, nofollow" />
  <meta charset="UTF-8" />
  <title>' . html_escape($subject) . '</title>
</head>

<body align="center" style="-webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; background: #e0e0e0; box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; height: 100%; line-height: 1.7; margin: 0; padding: 0; width: 100% !important"
    bgcolor="#e0e0e0">
    <style type="text/css">
        img {
            max-width: 100%;
            display: block;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.7;
        }

        body {
            background-color: #01191D;
        }

        .ExternalClass {
            width: 100%;
        }

        body {
            background-color: #e0e0e0;
        }
    </style>
    <table align="center" class="body-wrap" style="background: #e0e0e0; box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; width: 100%; word-break: break-word"
        bgcolor="#e0e0e0">
        <tbody>
            <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                <td align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top"
                    valign="top">
                    <table style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                        <tbody>
                            <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                <td class="container" width="600" style="box-sizing: border-box; clear: both !important; display: block !important; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; max-width: 600px !important; padding: 0; vertical-align: top"
                                    valign="top">
                                    <div class="content" style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; max-width: 600px; padding: 12px 20px 20px">
                                        <table class="main" width="100%" cellpadding="0" cellspacing="0" style="background: #FFFFFF; box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"
                                            bgcolor="#FFFFFF">
                                            <tbody>
                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                    <td class="aligncenter" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; text-align: center; vertical-align: top"
                                                        align="center" valign="top">
                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><img
                                                                width="560" src="https://raw.githubusercontent.com/kucsebatch14/kucsebatch14.github.io/master/cdn/emailbanner.jpg"
                                                                alt="" style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0"></div>
                                                    </td>
                                                </tr>
                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                    <td class="content-wrap" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 20px 20px; vertical-align: top"
                                                        valign="top">
                                                        <table width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                            <tbody>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td class="content-block" style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; vertical-align: top"
                                                                        valign="top">
                                                                        <h1 class="wysiwyg-text-align-center" style="box-sizing: border-box; color: rgb(63, 63, 63); font-family:  Helvetica, Arial, sans-serif; font-size: 28px; font-weight: bold; line-height: 1.7; margin: 0; padding: 0; text-align: center !important"
                                                                            align="center">Congratulations !! Your
                                                                            Appionment got set Successfully your appionment id is  <?php echo $appointment->appointment_id ?></li>
                                                                            <li>Full Name: <?php echo "$appointment->pfirstname $appointment->plastname " ?></li>
                                                                            <li>Patient ID: <?php echo $appointment->patient_id ?></li>
                                                                            <li>Date of Birth:<?php echo date('d M Y',strtotime($appointment->date_of_birth)) ?></li>
                                                                            <li>Age:<?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->y; ?> Years
                                                                           <?php echo date_diff(date_create($appointment->date_of_birth), date_create('now'))->m; ?> Month</li>
                                                                            <li>Sex:<?php echo $appointment->sex ?></li>
                                                                            <li>Mobile No:<?php echo $appointment->mobile ?></li>
                                                                            <li>Email Address: <?php echo $appointment->Email ?></li>
                                                                            <li>Problem: <?php echo $appointment->problem ?> </li>                       

                                                                        </h1>
                                                                    </td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td class="content-block" style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; vertical-align: top"
                                                                        valign="top">
                                                                        <div class="wysiwyg-text-align-center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                            align="center">We Bring You The Medical
                                                                            Specialty Care You
                                                                            Need, Where &amp; When You Need It.
                                                                            Culturally Sensitive,
                                                                            Affordable, &amp; Responsive To Community
                                                                            &amp; Individual
                                                                            Needs.<br style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"></div>
                                                                    </td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td width="514" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top"
                                                                        valign="top">
                                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                            <tbody>
                                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                    <td width="50%" class="content-block-grid grid-left aligncenter"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 20px 20px 0; text-align: center; vertical-align: top"
                                                                                        align="center" valign="top">
                                                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"></div>
                                                                                    </td>
                                                                                    <td width="50%" class="content-block-grid grid-right"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0 20px 20px; vertical-align: top"
                                                                                        valign="top">
                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><span
                                                                                                    class="wysiwyg-font-size-large"
                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: large !important; margin: 0; padding: 0"></span></b></div>



                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><span class="wysiwyg-font-size-large"
                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: large !important; margin: 0; padding: 0"><b
                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><br
                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"></b></span></div>

                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td width="514" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top"
                                                                        valign="top">
                                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                            <tbody>
                                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                    <td width="50%" class="content-block-grid grid-left"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 20px 20px 0; vertical-align: top"
                                                                                        valign="top">

                                                                                        <h4 class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; color: #3F3F3F; font-family:  Helvetica, Arial, sans-serif; font-size: 24px; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><a
                                                                                                    rel="nofollow"
                                                                                                    target="_blank"
                                                                                                    href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=vhRyNh3&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                    id="vhRyNh3" style="box-sizing: border-box;color: #da34bd;font-family:  Helvetica, Arial, sans-serif;font-size: 24px;margin: 0;padding: 0;text-decoration: none;"><span
                                                                                                        class="wysiwyg-font-size-large"
                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: large !important; margin: 0; padding: 0">Skilled
                                                                                                        Doctors</span></a></b></h4>
                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center">We have one
                                                                                            of the most experienced
                                                                                            doctors and nurses of the
                                                                                            city <br style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"></div>
                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><a
                                                                                                    rel="nofollow"
                                                                                                    target="_blank"
                                                                                                    href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=F8261w4&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                    id="F8261w4" style="box-sizing: border-box;color: #d134da;font-family:  Helvetica, Arial, sans-serif;margin: 0;padding: 0;text-decoration: none;">Quick
                                                                                                    Recovery</a></b></div>
                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center">Patient who
                                                                                            takes services from us got
                                                                                            90% success rate of having
                                                                                            this same disease once
                                                                                            again <b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><span
                                                                                                    class="wysiwyg-font-size-large"
                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: large !important; margin: 0; padding: 0"><br
                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"></span></b></div>

                                                                                    </td>
                                                                                    <td width="50%" class="content-block-grid grid-right aligncenter"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0 20px 20px; text-align: center; vertical-align: top"
                                                                                        align="center" valign="top">
                                                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><img
                                                                                                width="240" src="https://raw.githubusercontent.com/kucsebatch14/kucsebatch14.github.io/master/cdn/visit%20doctor.jpg"
                                                                                                alt="" style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td class="content-block alignleft" style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; text-align: left; vertical-align: top"
                                                                        align="left" valign="top"></td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td width="514" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top"
                                                                        valign="top">
                                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                            <tbody>
                                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                    <td width="33.3%" height="104"
                                                                                        class="content-block-grid threecolumn-image-left aligncenter"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 5px 0px 0; text-align: center; vertical-align: top"
                                                                                        align="center" valign="top">
                                                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><img
                                                                                                width="166" src="https://mailget.s3.amazonaws.com/upload_files/1494929419-172879963-160X104.png"
                                                                                                alt="" style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0"></div>
                                                                                    </td>
                                                                                    <td width="33.3%" height="104"
                                                                                        class="content-block-grid threecolumn-image-middle aligncenter"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 5px 0px; text-align: center; vertical-align: top"
                                                                                        align="center" valign="top">
                                                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><img
                                                                                                width="166" src="https://mailget.s3.amazonaws.com/upload_files/1494929422-729383920-160X104_1.png"
                                                                                                alt="" style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0"></div>
                                                                                    </td>
                                                                                    <td width="33.3%" height="104"
                                                                                        class="content-block-grid threecolumn-image-right aligncenter"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0 0px 5px; text-align: center; vertical-align: top"
                                                                                        align="center" valign="top">
                                                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"><img
                                                                                                width="166" src="https://mailget.s3.amazonaws.com/upload_files/1494929425-1286934405-160X104_2.png"
                                                                                                alt="" style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 100%; padding: 0"></div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                    <td width="33.3%" class="content-block-grid threecolumn-text-left"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 15px 5px 20px 0; vertical-align: top"
                                                                                        valign="top">

                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">First
                                                                                                Aid Emergency</b></div>

                                                                                    </td>
                                                                                    <td width="33.3%" class="content-block-grid threecolumn-text-middle"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 15px 5px 20px; vertical-align: top"
                                                                                        valign="top">

                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">Medication
                                                                                                Help</b></div>

                                                                                    </td>
                                                                                    <td width="33.3%" class="content-block-grid threecolumn-text-right"
                                                                                        style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 15px 0 20px 5px; vertical-align: top"
                                                                                        valign="top">

                                                                                        <div class="wysiwyg-text-align-center"
                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-align: center !important"
                                                                                            align="center"><b style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">Heart
                                                                                                Emergency</b></div>

                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td class="content-block alignleft" style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.7; margin: 0 auto; padding: 20px 0; text-align: left; vertical-align: top"
                                                                        align="left" valign="top"><a href="http://localhost/kuhospital"
                                                                            target="_blank" class="btn-primary btn-block"
                                                                            style="background: #b61ad1;border-radius: 5px;box-sizing: border-box;color: #FFFFFF;cursor: pointer;display: block;font-family:  Helvetica, Arial, sans-serif;font-weight: bold;line-height: 2;margin: 0;padding: 10px 35px;text-align: center;text-decoration: none;">Visit
                                                                            Our website</a></td>
                                                                </tr>
                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                    <td style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top"
                                                                        valign="top">
                                                                        <table width="100%" cellpadding="0" cellspacing="0"
                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                            <tbody>
                                                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                    <td style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top"
                                                                                        valign="top">
                                                                                        <div align="center" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                            <table border="0"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0" width="100%"
                                                                                                style="background: #fafafa; border: 1px solid #eeeeee; box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0"
                                                                                                bgcolor="#fafafa">
                                                                                                <tbody style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                    <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                        <td align="center"
                                                                                                            valign="top"
                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 9px 9px 0; vertical-align: top">
                                                                                                            <table
                                                                                                                border="0"
                                                                                                                cellpadding="0"
                                                                                                                cellspacing="0"
                                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                <tbody
                                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                    <tr
                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                        <td
                                                                                                                            valign="top"
                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0; vertical-align: top">
                                                                                                                            <table
                                                                                                                                align="left"
                                                                                                                                border="0"
                                                                                                                                cellpadding="0"
                                                                                                                                cellspacing="0"
                                                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                <tbody
                                                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 22px 5px 0; vertical-align: top"><a
                                                                                                                                                href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=e5lrlu7&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                                                                target="_blank"
                                                                                                                                                style="box-sizing: border-box; color: #348eda; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-decoration: none"><img
                                                                                                                                                    src="https://s3-us-west-2.amazonaws.com/mailget/builder_images/app_data/images/icon-facebook.png"
                                                                                                                                                    width="48"
                                                                                                                                                    alt=""
                                                                                                                                                    style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 48px; padding: 0; width: 48px"></a></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: 11px; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 23px 9px 0; vertical-align: top"><span
                                                                                                                                                style="box-sizing: border-box; color: #606060; font-family: Arial; font-size: 11px; font-weight: normal; line-height: 100%; margin: 0; padding: 0; text-align: center; text-decoration: none"></span>Facebook</td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                            <table
                                                                                                                                align="left"
                                                                                                                                border="0"
                                                                                                                                cellpadding="0"
                                                                                                                                cellspacing="0"
                                                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                <tbody
                                                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 22px 5px 0; vertical-align: top"><a
                                                                                                                                                href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=HJsjVI8&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                                                                target="_blank"
                                                                                                                                                style="box-sizing: border-box; color: #348eda; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-decoration: none"><img
                                                                                                                                                    src="https://s3-us-west-2.amazonaws.com/mailget/builder_images/app_data/images/icon-twitter.png"
                                                                                                                                                    width="48"
                                                                                                                                                    alt=""
                                                                                                                                                    style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 48px; padding: 0; width: 48px"></a></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: 11px; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 23px 9px 0; vertical-align: top"><span
                                                                                                                                                style="box-sizing: border-box; color: #606060; font-family: Arial; font-size: 11px; font-weight: normal; line-height: 100%; margin: 0; padding: 0; text-align: center; text-decoration: none"></span>Twitter</td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                            <table
                                                                                                                                align="left"
                                                                                                                                border="0"
                                                                                                                                cellpadding="0"
                                                                                                                                cellspacing="0"
                                                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                <tbody
                                                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 22px 5px 0; vertical-align: top"><a
                                                                                                                                                href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=IVAWeB9&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                                                                target="_blank"
                                                                                                                                                style="box-sizing: border-box; color: #348eda; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-decoration: none"></a></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: 11px; margin: 0; padding: 0">

                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                            <table
                                                                                                                                align="left"
                                                                                                                                border="0"
                                                                                                                                cellpadding="0"
                                                                                                                                cellspacing="0"
                                                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                <tbody
                                                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 22px 5px 0; vertical-align: top"><a
                                                                                                                                                href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=TxgUEM10&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                                                                target="_blank"
                                                                                                                                                style="box-sizing: border-box; color: #348eda; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-decoration: none"><img
                                                                                                                                                    src="https://s3-us-west-2.amazonaws.com/mailget/builder_images/app_data/images/icon-google.png"
                                                                                                                                                    width="48"
                                                                                                                                                    alt=""
                                                                                                                                                    style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 48px; padding: 0; width: 48px"></a></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: 11px; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 23px 9px 0; vertical-align: top"><span
                                                                                                                                                style="box-sizing: border-box; color: #606060; font-family: Arial; font-size: 11px; font-weight: normal; line-height: 100%; margin: 0; padding: 0; text-align: center; text-decoration: none"></span>Google</td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                            <table
                                                                                                                                align="left"
                                                                                                                                border="0"
                                                                                                                                cellpadding="0"
                                                                                                                                cellspacing="0"
                                                                                                                                style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                <tbody
                                                                                                                                    style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 22px 5px 0; vertical-align: top"><a
                                                                                                                                                href="http://track8.fgmail3.com/mailget/email_tracker/link_click?link_id=WvYmyt11&amp;temp_id=IjMyMjYyIg_3D_3D&amp;email_id=mailget_email_id_replace&amp;s_id=mailget_s_id_replace&amp;server=replace_smtp_server&amp;type=replace_drip_type"
                                                                                                                                                target="_blank"
                                                                                                                                                style="box-sizing: border-box; color: #348eda; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0; text-decoration: none"><img
                                                                                                                                                    src="https://s3-us-west-2.amazonaws.com/mailget/builder_images/app_data/images/icon-instagram.png"
                                                                                                                                                    width="48"
                                                                                                                                                    alt=""
                                                                                                                                                    style="box-sizing: border-box; display: block; font-family:  Helvetica, Arial, sans-serif; margin: 0; max-width: 48px; padding: 0; width: 48px"></a></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr
                                                                                                                                        style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; font-size: 11px; margin: 0; padding: 0">
                                                                                                                                        <td
                                                                                                                                            align="center"
                                                                                                                                            valign="top"
                                                                                                                                            style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 23px 9px 0; vertical-align: top"><span
                                                                                                                                                style="box-sizing: border-box; color: #606060; font-family: Arial; font-size: 11px; font-weight: normal; line-height: 100%; margin: 0; padding: 0; text-align: center; text-decoration: none"></span>Instagram</td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                    <td class="aligncenter mailer-info" style="background: #F5F5F5; border-top-color: #DBDADA; border-top-style: solid; border-top-width: 1px; box-sizing: border-box; color: #575454; font-family:  Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 1.7; margin: 0 auto; padding: 15px 20px 20px; text-align: center; vertical-align: top"
                                                        align="center" bgcolor="#F5F5F5" valign="top">
                                                        <h2 class="wysiwyg-text-align-center" style="box-sizing: border-box; color: rgb(46, 46, 46); font-family:  Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 1.7; margin: 0; padding: 0; text-align: center !important"
                                                            align="center">BD HOSPITAL</h2>
                                                        <div class="wysiwyg-text-align-center" style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 1.7; margin: 0; padding: 0; text-align: center !important"
                                                            align="center">Khulna University, Khulna 9208</div>
                                                        <div class="wysiwyg-text-align-center" style="box-sizing: border-box; color: #2e2e2e; font-family:  Helvetica, Arial, sans-serif; font-size: 12px; font-weight: normal; line-height: 1.7; margin: 0; padding: 0; text-align: center !important"
                                                            align="center">

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="footer dark" style="box-sizing: border-box; clear: both; color: #999; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 20px 0; width: 100%">
                                            <table width="100%" style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                <tbody>
                                                    <tr style="box-sizing: border-box; font-family:  Helvetica, Arial, sans-serif; margin: 0; padding: 0">
                                                        <td class="aligncenter footer-td" style="box-sizing: border-box; color: #FFFFFF; font-family:  Helvetica, Arial, sans-serif; margin: 0 auto; padding: 0 20px; text-align: center; vertical-align: top"
                                                            align="center" valign="top">



                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>




</body>