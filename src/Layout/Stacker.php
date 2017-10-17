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

use Fluent\Layout\Component;

class Stacker
{
    protected $_defaults = array(
        'logo'           => null,
        'color'          => '#e74c3c',
        'teaser'         => null,
        'footer'         => null,
    );

    protected $_options = array();
    
    protected $_stack = array();

    protected $_title;
    
    protected $_header;

    protected $_footer;

    protected $_logo;
    
    public function __construct($options)
    {
        $this->_options = array_merge($this->_defaults, $options);
        
        $this->_header = new Header($this->_options['color'], $this->_options['teaser']);
        $this->_footer = new Footer($this->_options['footer']);
        $this->_logo = new Logo($this->_options['logo']);
    }
    
    public function setTitle($node)
    {
        $this->_title = new Title($node, $this->_options['color']);

        return $this;
    }
    
    public function addParagraph($node)
    {
        array_push($this->_stack, 
            new Spacer(), new Paragraph($node)
        );
        
        return $this;
    }

    public function addNumbers($node)
    {
        array_push($this->_stack, 
            new Spacer(), new Number($node)
        );

        return $this;
    }
    
    public function addButton($node)
    {
        array_push($this->_stack, 
            new Spacer(), new Button($node)
        );

        return $this;
    }
    
    public function render()
    {
        $content = $this->_logo->render();

        if ($this->_title) {
            $content .= (new Spacer())->render() . $this->_title->render();
        }

        array_push($this->_stack, new Spacer());

        foreach ($this->_stack as $partial) {
            $content .= $partial->render();
        }

        return $this->_header->render() . $content . $this->_footer->render();
    }
    
    public function __toString()
    {
        return $this->render();
    }
}
