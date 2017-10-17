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
namespace Fluent;

class Layout
{
    protected $_options = array();
    
    public function __construct($options)
    {
        $this->_options = $options;
    }

    public function render($body)
    {
        $options = array(
            'teaser' => $body->getTeaser()
        );

        $decode = new Layout\Decode(
            array_merge($this->_options, $options)
        );

        return $decode->getLayout($body->toString())->render();
    }
}
