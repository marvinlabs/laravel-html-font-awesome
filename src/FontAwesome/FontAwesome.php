<?php

namespace MarvinLabs\Html\FontAwesome;

use MarvinLabs\Html\FontAwesome\Elements\FontAwesomeIcon;
use Spatie\Html\Html;

/**
 * Class FontAwesome
 * @package MarvinLabs\Html\FontAwesome
 *
 *          Extend Spatie's HTML builder in order to automatically inject what Bootstrap likes and some other libraries
 *          too
 */
class FontAwesome
{

    /**
     * FontAwesome constructor.
     *
     * @param \Spatie\Html\Html $html
     */
    public function __construct(Html $html)
    {
        $this->html = $html;
    }

    /**
     * Link to the latest font-awesome CSS served from maxcdn.bootstrapcdn.com
     *
     * @return \Spatie\Html\Elements\Element
     */
    public function css()
    {
        /** @var \MarvinLabs\Html\FontAwesome\FontAwesome $this */
        return $this->html->element('link')->attributes([
            'href' => '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
            'rel'  => 'stylesheet',
        ]);
    }

    /**
     * Insert a FontAwesome icon
     *
     * @param string $name Name of the icon (without any 'fa-' prefix)
     *
     * @return \MarvinLabs\Html\FontAwesome\Elements\FontAwesomeIcon
     */
    public function icon($name)
    {
        return FontAwesomeIcon::create()->name($name);
    }

    /**
     * Stack two icons on top of each other. The array must contain exactly 2 elements.
     *
     * An element of the array can either be:
     *
     * - A simple string, in which case it is considered to be the icon name
     * - A key/value pair, both being strings, in which case the key is the icon name and the value will be added to
     *   the icon css classes
     * - A FontAwesomeIcon object, obtained using the icon function.
     *
     * @param array $icons The 2 icons to stack. First is back, second is front.
     *
     * @return \Spatie\Html\Elements\Span
     *
     * @throws \InvalidArgumentException
     */
    public function stack($icons)
    {
        if (count($icons) !== 2)
        {
            throw new \InvalidArgumentException('Expecting exactly 2 icons in the stack');
        }

        $contents = [];
        $index = 2;
        foreach ($icons as $key => $value)
        {
            $contents[] = $this->getStackIconElement($key, $value, $index);
            --$index;
        }

        return $this->html->span($contents)->addClass('fa-stack');
    }

    public function __call($name, $arguments)
    {
        if (empty($arguments)) {
            return $this->icon(kebab_case($name));
        }

        return parent::__call($name, $arguments);
    }

    /**
     * Sanitize an element passed to the FA stack
     *
     * @param int|string                                                   $key
     * @param string|\MarvinLabs\Html\FontAwesome\Elements\FontAwesomeIcon $value
     * @param int                                                          $index Starting at 1
     *
     * @return \MarvinLabs\Html\FontAwesome\Elements\FontAwesomeIcon
     * @throws \InvalidArgumentException
     */
    protected function getStackIconElement($key, $value, $index)
    {
        $element = $value;

        if (is_string($key))
        {
            $element = $this->icon($key)->addClass($value);
        }
        else if (is_string($value))
        {
            $element = $this->icon($value);
        }

        if ( !is_a($element, FontAwesomeIcon::class))
        {
            throw new \InvalidArgumentException('Invalid icon passed to stack');
        }

        return $element->addClass("fa-stack-{$index}x");
    }
}