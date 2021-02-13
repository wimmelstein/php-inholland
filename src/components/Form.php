<?php


class Form
{
    private $inputs = array();
    private $button;

    /**
     * Form constructor.
     * @param array $input
     * @param $button
     */
    public function __construct(array $inputs, $button)
    {
        $this->inputs = $inputs;
        $this->button = $button;
    }

    public function render()
    {
        echo '<form>';
        $text = '';
        foreach ($this->inputs as $key => $value) {
            $text .= "$key=$value ";
        }
        echo "<input $text />";
        echo $this->button->render();

    }


}