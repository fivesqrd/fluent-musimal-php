<?php
namespace Fluent\Theme\Musimal;

class Layout
{
    protected $_options = array(
        'logo'           => null,
        'color'          => '#e74c3c',
        'teaser'         => null,
        'footer'         => null,
    );
    
    protected $_stack = array();

    protected $_title;
    
    protected $_header;

    protected $_footer;

    protected $_logo;
    
    public function __construct($options)
    {
        $this->_options = $options;
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
