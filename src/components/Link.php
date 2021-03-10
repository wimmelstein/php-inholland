<?php

namespace app\components;
class Link
{

    private string $href;
    private string $linkText;
    private string $target = '_self';

    /**
     * Link constructor.
     * @param string $href
     * @param string $linkText
     * @param string $target
     */
    public function __construct(string $href, string $linkText, string $target)
    {
        $this->href = $href;
        $this->linkText = $linkText;
        $this->target = $target;
    }

    public function __toString()
    {
        return sprintf('<a href="%s" target="%s">%s</a>', $this->href, $this->target, $this->linkText);
    }


}
