<?php
namespace Fluent\Theme\Musimal;

class Title
{
    protected $_text;

    protected $_colour = '#EE203C';

    public function __construct($xml, $colour = null)
    {
        $this->_text = $xml->nodeValue;

        if ($colour) {
            $this->_colour = $colour;
        }
    }

    public function render()
    {
        return '<tr>
  <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
    <table align="center" width="448" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:448px;">
      <tr>
        <td width="24" style="border-collapse:collapse;mso-line-height-rule:exactly;width:24px;">&nbsp;</td>
        <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
          <table align="center" width="400" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:400px;">
            <tr>
              <td align="center" valign="top" class="em_head2" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:22px;line-height:25px;color:' . $this->_colour . ';font-weight:600;">' . $this->_text . '</td>
            </tr>
          </table>
        </td>
        <td width="24" style="border-collapse:collapse;mso-line-height-rule:exactly;width:24px;">&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>';

    }
}

