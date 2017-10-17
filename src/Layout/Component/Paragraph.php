<?php
/*
    Minimal, responsive, open source email design for transactional user notifications.

    Copyright (C) 2017 Five Squared Digital, fivesqrd.com

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
namespace Fluent\Layout\Component;

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
