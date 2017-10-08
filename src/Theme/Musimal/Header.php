<?php
namespace Fluent\Theme\Musimal;

class Header
{
    protected $_teaser;

    protected $_colour;

    public function __construct($colour, $teaser = null)
    {
        $this->_teaser = $teaser;
        $this->_colour = $colour;
    }

    public function render()
    {
        return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <title>Fluent Musimal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <meta name="format-detection" content="telephone=no">
    <!--[if !mso]><!-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<!--<![endif]-->
<style type="text/css">
.ExternalClass * {
    line-height: 100%;
}
img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
a img {border:none;}
a {
    color: ' . $this->_colour . '
}

/*Stylesheed for the devices width between 0px to 480px*/
@media only screen and (max-width:449px) {
.em_main_table {
    width: 100% !important;
}
.em_wrapper {
    width: 100% !important;
}
.em_aside {
    padding-left: 10px !important;
    padding-right: 10px !important;
}
.em_hide {
    display: none !important;
}
.em_hight10 {
    height: 10px !important;
}
}
</style>
</head>
<body style="margin:0 !important;padding:0 !important;-webkit-text-size-adjust:100% !important;-ms-text-size-adjust:100% !important;-webkit-font-smoothing:antialiased !important;" bgcolor="#f2f2f2">
<p style="Margin:0px !important;Padding:0px !important;"/>
      <!--[if gte mso 9]>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
              <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
          </xml>
      <![endif]-->
    </p>
    <!--Full width table start-->
    <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#f2f2f2" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;">
      <!-- Emailer Starts Here-->
      <tr>
        <td align="center" valign="top" class="em_aside" style="border-collapse:collapse;mso-line-height-rule:exactly;">
          <table style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;table-layout:fixed;" width="450" border="0" cellspacing="0" cellpadding="0" align="center" class="em_main_table">
            <!--Conetnt section start Here-->
            <tr>
              <td height="20" class="em_hight10" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:20px;">&nbsp;</td>
            </tr>
            ' . $this->_getTeaser($this->_teaser) . '
            <tr>
              <td valign="top" align="center" bgcolor="#ffffff" style="border-collapse:collapse;mso-line-height-rule:exactly;">
                <table align="center" width="450" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:450px;">
                  <tr>
                    <td width="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;width:1px;"></td>
                    <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
                      <table align="center" width="448" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:448px;">
                        <tr>
                          <td height="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:1px;">' . $this->_getSpacerImg() . '</td>
                        </tr>';

    }

    protected function _getSpacerImg()
    {
        return '<img src="https://s3-eu-west-1.amazonaws.com/fluent-static-production-eu-west/themes/musimal/spacer.gif" height="1" width="1" style="border:0 !important;outline:none !important;display:block;" border="0" alt=""/>';
    }

    protected function _getTeaser($text)
    {
        if (empty($text)) {
            return null;
        }

        return '<tr>
  <td height="20" class="em_hight10" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:20px;">' . $text . '</td>
</tr>';

    }
}
