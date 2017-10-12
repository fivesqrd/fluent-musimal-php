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

class Musimal
{
    protected $_content;
    
    public function __construct($content)
    {
        $this->_content = $content;
    }
    
    public function getLayout($options)
    {
        $doc = new \DOMDocument();

        if (!$doc->loadXML($this->_content)) {
            //libxml_use_internal_errors() libxml_get_errors() 
            throw new \Exception('Content XML invalid or not well formed');
        }
        
        $layout = $this->_parse(
            new Musimal\Layout($options),
            $doc->childNodes->item(0)->childNodes
        );
        
        return $layout;
    }
        
    protected function _parse($layout, $body)
    {
        foreach ($body as $node) {
            switch (strtoupper($node->nodeName)) {
                case 'TITLE':
                    $layout->setTitle($node);
                    break;        
                case 'PARAGRAPH':
                    $layout->addParagraph($node);
                    break;        
                case 'BUTTON':
                case 'CALLOUT':
                    $layout->addButton($node);
                    break;
                case 'NUMBERS':
                    $layout->addNumbers($node);
                    break;
            }
        }
        
        return $layout;
    }
}
