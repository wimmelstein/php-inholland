<?php 

class User {
    private $id;
    private $first_name;
    private $last_name;
    private $age;


    public function __construct($_id, $_first_name, $_last_name, $_age) {
        $this->id = $_id;
        $this->first_name = $_first_name;
        $this->last_name = $_last_name;
        $this->age = $_age;
    }

    public function getUserName() {
        return $this->first_name . " " . $this->last_name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'age' => $this->age
        ];
    }
}
?>    