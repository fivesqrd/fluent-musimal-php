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

class Button
{
    protected $_url;

    protected $_text;

    protected $_colour = '#8492A6';

    public function __construct($xml, $colour = null)
    {
        $this->_url = $xml->attributes->getNamedItem('href')->value;
        $this->_text = $xml->nodeValue;

        if ($colour) {
            $this->_colour = $colour;
        }
    }

    protected function _getSpacerImg()
    {
        return '<img src="https://s3-eu-west-1.amazonaws.com/fluent-static-production-eu-west/themes/musimal/spacer.gif" height="1" width="1" style="border:0 !important;outline:none !important;display:block;" border="0" alt=""/>';
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
              <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
                <table align="center" width="165" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;">
                  <tr>
                    <td width="2" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;width:1px;"></td>
                    <td valign="top" align="center" style="border-collapse:collapse;mso-line-height-rule:exactly;">
                      <table align="center" width="161" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;mso-table-lspace:0px;mso-table-rspace:0px;">
                        <tr>
                          <td height="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:1px;">' . $this->_getSpacerImg() . '</td>
                        </tr>
                        <tr>
                          <td height="36" align="center" valign="middle" class="em_btn" style="border-collapse:collapse;mso-line-height-rule:exactly;font-family:\'Lato\', Arial, sans-serif;font-size:14px;color:' . $this->_colour . ';height:36px;"><a href="' . $this->_url . '" target="_blank" style="border-collapse:collapse;mso-line-height-rule:exactly;color:' . $this->_colour . ';line-height:36px;text-decoration:none;display:block;">' . $this->_text . '</a></td>
                        </tr>
                        <tr>
                          <td height="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;font-size:0px; line-height:0px; height:1px;">' . $this->_getSpacerImg() . '</td>
                        </tr>
                      </table>
                    </td>
                    <td width="1" bgcolor="#e5e9f2" style="border-collapse:collapse;mso-line-height-rule:exactly;width:1px;"></td>
                  </tr>
                </table>
              </td>
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
