<?php

namespace MarvinLabs\Html\FontAwesome;

use Illuminate\Support\Str;
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

    /** @var \Spatie\Html\Html */
    protected $html;
    /** @var string */
    private $iconStyle;

    /**
     * FontAwesome constructor.
     *
     * @param \Spatie\Html\Html $html
     * @param string $iconStyle
     */
    public function __construct(Html $html, $iconStyle)
    {
        $this->html = $html;
        $this->iconStyle = $iconStyle;
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
        return FontAwesomeIcon::create()->name($name, $this->iconStyle);
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

    /**
     * Magic method which will take care of calling the `icon` method when given an icon name directly.
     *
     * For instance `fa()->beer()` will be caught here and turned into `fa()->icon('beer')`
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return \MarvinLabs\Html\FontAwesome\Elements\FontAwesomeIcon
     */
    public function __call($name, $arguments)
    {
        if (empty($arguments))
        {
            return $this->icon(Str::kebab($name));
        }
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
