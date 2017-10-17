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
namespace Fluent\Layout;

class Decode
{
    protected $_options;
    
    public function __construct($options)
    {
        $this->_options = $options;
    }
    
    public function getLayout($xml)
    {
        $doc = new \DOMDocument();

        if (!$doc->loadXML($xml)) {
            //libxml_use_internal_errors() libxml_get_errors() 
            throw new \Exception('Content XML invalid or not well formed');
        }
        
        return $this->_parseXml(
            new Stacker($this->_options),
            $doc->childNodes->item(0)->childNodes
        );
    }
        
    protected function _parseXml($stacker, $nodes)
    {
        foreach ($nodes as $node) {
            switch (strtoupper($node->nodeName)) {
                case 'TITLE':
                    $stacker->setTitle($node);
                    break;        
                case 'PARAGRAPH':
                    $stacker->addParagraph($node);
                    break;        
                case 'BUTTON':
                case 'CALLOUT':
                    $stacker->addButton($node);
                    break;
                case 'NUMBERS':
                    $stacker->addNumbers($node);
                    break;
            }
        }
        
        return $stacker;
    }
}
