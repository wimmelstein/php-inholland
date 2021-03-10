<?php

namespace app\components;
class Jumbotron
{

    private string $title;
    private string $subTitle;

    /**
     * Jumbotron constructor.
     * @param string $title
     * @param string $subTitle
     */
    public function __construct(string $title, string $subTitle)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
    }

    public function __toString()
    {
        return sprintf('
            <div class="jumbotron  jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">%s</h1>
                    <p>%s</p>
                </div>
            </div>'
            , $this->title, $this->subTitle);
    }

}