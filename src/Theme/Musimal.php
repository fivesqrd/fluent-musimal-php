<?php
namespace Fluent\Theme;

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
