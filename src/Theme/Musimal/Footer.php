<?php
namespace Fluent\Theme\Musimal;

class Footer
{
    protected $_text;

    public function __construct($text)
    {
        $this->_text = $text;

    }

    public function render()
    {
        return '<tr>
              <td height="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:1px;">' . $this->_getSpacerImg() . '</td>
            </tr>
          </table>
        </td>
        <td width="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;width:1px;"></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td valign="top" align="center" bgcolor="#f2f2f2" style="border-collapse:collapse;mso-line-height-rule:exactly;">
    <table align="center" width="450" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:450px;">
      <tr>
        <td width="25" style="border-collapse:collapse;mso-line-height-rule:exactly;width:25px;">&nbsp;</td>
        <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
          <table width="400" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:400px;">
            <tr>
              <td height="38" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:38px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top" class="em_footer" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:10px;line-height:12px;color:#3C4858;">' . $this->_text . '</td>
            </tr>
            <tr>
              <td height="38" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:38px;">&nbsp;</td>
            </tr>
          </table>
        </td>
        <td width="25" style="border-collapse:collapse;mso-line-height-rule:exactly;width:25px;">&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>
</table>
</td>
</tr>
<!-- Emailer Ends Here //-->
</table>
<!--Full width table End-->
<!--Increase/decrease the number of (&nbsp;) as per the template width-->
<div class="em_hide" style="white-space:nowrap;font:20px courier;color:#f2f2f2; background-color:#f2f2f2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
</body>
</html>';

    }

    protected function _getSpacerImg()
    {
        return '<img src="https://s3-eu-west-1.amazonaws.com/fluent-static-production-eu-west/themes/musimal/spacer.gif" height="1" width="1" style="border:0 !important;outline:none !important;display:block;" border="0" alt=""/>';
    }
}
