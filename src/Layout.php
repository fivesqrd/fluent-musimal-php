<?php
namespace Fluent;

/**
 *
 * @author cjb
 */
class Layout
{
    protected $_defaults = array(
        'layout' => [
            'logo'          => null,
            'color'         => '#e74c3c',
            'teaser'        => null,
            'footer'        => null,
        ],
        'message' => [
            'key'           => null,
            'secret'        => null,
            'sender'        => null,
            'headers'       => null,
            'format'        => 'markup',
            'transport'     => 'remote',
            'storage'       => 'sqlite'
        ]
    );

    protected $_options = array();

    public function __construct(array $options = array())
    {
        $this->_options = $options;
    }

    /**
     * @param mixed $content
     * @return \Fluent\Message\Create
     */
    public function create()
    {
        return new Layout\Create(
            array_merge($this->_defaults, $this->_options)
        );
    }
}
