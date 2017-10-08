<?php
namespace Fluent\Theme\Musimal;

class Paragraph
{
    protected $_text;

    protected $_colour = '#8492A6';

    public function __construct($xml, $colour = null)
    {
        $this->_text = $this->_getInnerHtml($xml);

        if ($colour) {
            $this->_colour = $colour;
        }
    }

    protected function _getInnerHtml($node)
    {
        $innerHTML= '';
        foreach ($node->childNodes as $child) {
            $innerHTML .= $child->nodeValue;
        }

        return $innerHTML;
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
              <td align="left" valign="top" class="em_head3" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:14px;line-height:20px;color:' . $this->_colour . ';">' . $this->_text . '</td>
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
