<?php
namespace Fluent\Layout;

use Fluent\Theme;

class Create
{
    protected $_title;
    
    protected $_teaser;
    
    protected $_content;

    protected $_options = array();

    public function __construct($options)
    {
        $this->_options = $options;

        $xml = new \DOMDocument();
        $xml->appendChild(new \DOMElement('content'));

        $this->_content = $xml->childNodes->item(0);
    }
    
    /**
     * @param string $text
     * @return \Fluent\Content\Markup
     */
    public function title($text)
    {
        $this->_title = $text;
        return $this;
    }
    
    /**
     * @param string $text
     * @return \Fluent\Content\Markup
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
     * @return \Fluent\Content\Markup
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
     * @return \Fluent\Content\Markup
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
     * @return \Fluent\Content\Markup
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
        return Theme::factory('musimal', $this->toXml())
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
