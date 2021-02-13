<?php


class Table
{
    private $tableHeaders;
    private $data;

    /**
     * Table constructor.
     * @param array $tableHeaders
     */

    //TODO: create column for actions...
    public function __construct($tableHeaders, $data)
    {
        $this->tableHeaders = $tableHeaders;
        $this->data = $data;
    }

    public function renderTable()
    {
        echo '<table class="table table hover">';
        echo '<thead>';
        echo '<tr>';
        foreach ($this->tableHeaders as $th) {
            echo "<th>$th</th>";
        }
        echo '</tr>';
        echo '<tbody>';
        foreach ($this->data as $row) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo "<td>$cell</td>";
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</thead>';
        echo '</table>';
    }


}