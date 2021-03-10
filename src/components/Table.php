<?php

namespace app\components;
class Table
{
    private $tableHeaders;
    private $data;
    private $form;

    /**
     * Table constructor.
     * @param array $tableHeaders
     */

    //TODO: create column for actions...
    public function __construct($tableHeaders, $data, $form)
    {
        $this->tableHeaders = $tableHeaders;
        $this->data = $data;
        $this->form = $form;
    }

    public function renderTable()
    {
        echo '<table class="table table hover">';
        echo '<thead>';
        echo '<tr>';
        foreach ($this->tableHeaders as $th) {
            echo "<th>$th</th>";
        }
        if ($this->form) {
            echo '<th>Action</th>';
        }
        echo '</tr>';
        echo '<tbody>';
        foreach ($this->data as $row) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo "<td>$cell</td>";
            }
            if ($this->form) {
                echo "<td>";
                $this->form->render($row['id']);
                echo "</td>";
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</thead>';
        echo '</table>';
    }


}