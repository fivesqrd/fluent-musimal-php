<?php
namespace Fluent\Theme\Musimal;

class Logo
{
    protected $_value;

    protected $_colour = '#1D1B19';

    public function __construct($value, $colour = null)
    {
        $this->_value = $value;

        if ($colour) {
            $this->_colour = $colour;
        }
    }

    public function render()
    {
        if (empty($this->_value)) {
            return null;
        }

        return '<tr>
  <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
    <table align="center" width="448" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:448px;">
      <tr>
        <td width="24" style="border-collapse:collapse;mso-line-height-rule:exactly;width:24px;">&nbsp;</td>
        <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
          <table align="center" width="400" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:400px;">
            <tr>
              <td height="40" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:40px;">&nbsp;</td>
            </tr>
            ' . $this->_getLogo($this->_value, $this->_colour) . '
          </table>
        </td>
        <td width="24" style="border-collapse:collapse;mso-line-height-rule:exactly;width:24px;">&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>';

    }

    protected function _getLogo($value, $colour)
    {
        if (substr($value,0,4) == 'http') {
            return $this->_getImage($value);
        } else {
            return $this->_getFallback($value, $colour);
        }
    }

    protected function _getImage($src)
    {
        return '<tr>
            <td align="center" valign="top" class="em_head1">
                <img src="' . $src . '" border="0" alt="Logo">
            </td>
        </tr>';
    }

    protected function _getFallback($text, $colour)
    {
        return '<tr>
              <td align="center" valign="top" class="em_head1" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:28px;line-height:30px;color:' . $colour . ';font-weight:600;">' . $text . '</td>
            </tr>';
    }
}

