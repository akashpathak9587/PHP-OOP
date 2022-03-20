<?php
// Defining Class Methods
class Person
{
    public $age = 28;

    public function setAge($newage)
    {
        $this->age = $newage;
    }

    public function getAge()
    {
        return $this->age . "<br />";
    }
    public function __toString()
    {
        echo "Using the toString method: ";
        return $this->getAge();
    }
}
