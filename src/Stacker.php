<?php
/*
    Stacker is a simple open source library for building responsive transactional 
    email notifications quickly with minimal markup. 

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

/**
 * @author cjb
 */
class Stacker
{
    protected $_defaults = array(
        'logo'          => null,
        'color'         => '#e74c3c',
        'footer'        => null,
    );

    protected $_options = array();

    public function __construct($options = array())
    {
        $this->_options = array_merge($this->_defaults, $options);

        $xml = new \DOMDocument();
        $xml->appendChild(new \DOMElement('content'));

        $this->_content = $xml->childNodes->item(0);
    }
    
    /**
     * @param string $text
     * @return \Fluent\Stacker
     */
    public function title($text)
    {
        $this->_title = $text;
        return $this;
    }
    
    /**
     * @param string $text
     * @return \Fluent\Stacker
     */
    public function paragraph($text)
    {
        $element = new \DOMElement('paragraph');
        $this->_content->appendChild($element);
        $element->appendChild($this->_getCData($text));
        return $this;
    }

    /**
     * @param string $text
     * @return \Fluent\Stacker
     */
    public function segment($string)
    {
        $element = new \DOMElement('paragraph');
        $this->_content->appendChild($element);
        $element->appendChild($this->_getCData($string));
        return $this;
    }
    
    /**
     * @param array $numbers Up to 3 number/caption pairs
     * @return \Fluent\Stacker
     */
    public function number(array $numbers)
    {
        if (array_key_exists('value', $numbers)) {
            /* we have been given one number only */
            $numbers = array($numbers);
        }
        
        $parent = $this->_content
            ->appendChild(new \DOMElement('numbers'));

        foreach ($numbers as $number) {
            $element = $this->_getNumberElement(
                $parent->appendChild(new \DOMElement('number')), $number
            );
        }

        return $this;
    }

    /**
     * @param string $href
     * @param string $text
     * @return \Fluent\Stacker
     */
    public function button($href, $text)
    {
        $element = new \DOMElement('button', htmlentities($text));
        $this->_content->appendChild($element);
        $element->setAttribute('href', $href);
        return $this;
    }

    /**
     * @return string
     */
    public function toXml()
    {
        if ($this->_title) {
            $this->_content->appendChild(
                new \DOMElement('title', htmlentities($this->_title))
            );
        }

        $doc = $this->_content->ownerDocument;
        return $doc->saveXml();
    }

    public function teaser($text)
    {
        $this->_teaser = $text;
        return $this;
    }

    /**
     * Return the message body in HTML format
     * @return string
     */
    public function render()
    {
        return (new Musimal($this->toXml()))
            ->getLayout($this->_options['layout'])
            ->render();
    }

    /**
     * Passes content to the Fluent Client and returns the object
     * @param array $params
     * @return \Fluent\Message\Deliver
     */
    public function deliver(array $params)
    {
        $params['content'] = $this->toXml();

        return new Message\Deliver(
            $params, $this->_options['message']
        );
    }

    /**
     * Delivers message via the Fluent Web Service and returns a message ID
     * @param array $params
     * @return string $messageId
     */
    public function send($params)
    {
        return $this->deliver($params)->send();
    }

    protected function _getNumberElement($element, $number)
    {
        if (array_key_exists('value', $number)) {
            $element->appendChild(
                new \DOMElement('value', htmlentities($number['value']))
            );
        }

        if (array_key_exists('caption', $number)) {
            $element->appendChild(
                new \DOMElement('caption', $number['caption'])  
            );
        }

        return $element;
    }

    protected function _getCData($text)
    {
        return $this->_content->ownerDocument->createCDATASection($text);
    }
    
    public function __toString()
    {
        return $this->render();
    }
}
