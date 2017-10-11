<?php
namespace Fluent\Theme\Musimal;

class Number
{
    protected $_xml;

    protected $_colour = '#8492A6';

    const LIMIT = 3;

    public function __construct($xml, $colour = null)
    {
        $this->_xml = $xml;

        if ($colour) {
            $this->_colour = $colour;
        }
    }

    public function render()
    {
        return '<tr>
  <td valign="top" align="center" bgcolor="#f2f2f2" style="border-collapse:collapse;mso-line-height-rule:exactly;">
    <table align="center" width="448" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:448px;">
      <tr>
        <td width="24" style="border-collapse:collapse;mso-line-height-rule:exactly;width:24px;">&nbsp;</td>
        <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
            <table border="0" cellspacing="0" cellpadding="0" width="400" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:400px;" class="em_wrapper">
                <tr>' . $this->_getTables(array_slice($this->_getNumbers(), 0, self::LIMIT)) . '</tr>
            </table>
        </td>
        <td width="24" style="border-collapse:collapse;mso-line-height-rule:exactly;width:24px;">&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>';
    }

    protected function _getNumbers()
    {
        $numbers = array();

        foreach ($this->_xml->childNodes as $child) {
            array_push($numbers, $this->_getValueAndCaption($child));
        }

        return $numbers;
    }

    protected function _getValueAndCaption($xml)
    {
        $number = array();

        foreach ($xml->childNodes as $child) {
            if (strtoupper($child->nodeName) == 'VALUE') {
                $number['value'] = $child->nodeValue;
            }

            if (strtoupper($child->nodeName) == 'CAPTION') {
                $number['caption'] = $child->nodeValue;
            }
        }

        return $number;
    }

    protected function _getTables($numbers)
    {
        $tables = null;

        $count = count($numbers);

        $width = round(400 / $count);

        foreach ($numbers as $i => $number) {
            $border = ($i < $count - 1) ? 'border-right:1px solid #ffffff;' : null;
            $tables .= '<td width="' . $width . '">' . $this->_getTable($width, $number, $border) . '</td>';
        }

        return $tables;
    }

    protected function _getTable($width, $number, $border)
    {
        $value = isset($number['value']) ? $number['value'] : null;

          return '<table align="center" width="' . $width . '" border="0" cellspacing="0" cellpadding="0" class="em_wrapper" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;width:' . $width . ';' . $border . '">
            <tr>
              <td height="20" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:20px;">&nbsp;</td>
            </tr>
            ' . $this->_getCaption(isset($number['caption']) ? $number['caption'] : null) . '
            <tr>
              <td align="center" valign="top" class="em_head3" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:12px;line-height:18px;color:' . $this->_colour . ';">' . $value . '</td>
            </tr>
            <tr>
              <td height="20" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:20px;">&nbsp;</td>
            </tr>
          </table>';
    }

    protected function _getCaption($text)
    {
        if (empty($text)) {
            return null;
        }

        return '<tr>
              <td align="center" valign="top" class="em_head4" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:16px;line-height:18px;color:#3C4858;">' . $text . '</td>
            </tr>
            <tr>
              <td height="10" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:10px;">&nbsp;</td>
            </tr>';
    }
}

