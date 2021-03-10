<?php
namespace app\components;

class Button
{
    private string $value;
    private string $action;
    private string $class;

    /**
     * Button constructor.
     * @param string $value
     * @param string $action
     */
    public function __construct(string $value, string $action, string $class)
    {
        $this->value = $value;
        $this->action = $action;
        $this->class = $class;
    }

    public function render($id)
    {
        echo sprintf('<button id="%s" %s class="%s">%s</button>', $id, $this->action, $this->class, $this->value);
    }

}