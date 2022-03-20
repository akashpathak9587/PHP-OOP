<?php
// Structuring Classes
class MyClass
{
}

$obj = new MyClass;

var_dump($obj);
echo "<br>";

// Defining Class Properties
class myClass2
{
    public $prop1 = "I'm a class property";
}

$obj = new myClass2;
var_dump($obj);
echo "<br>";
echo $obj->prop1;
echo "<br>";

// Importing a Class Into Another PHP Program
require_once "Person.php";

$p = new Person(20);

echo $p->getAge();

$p = new Person;

echo $p->getAge();
$p->setAge(30); // Set a new value for age
echo $p->getAge(); // Read it out again to show the change

// The power of OOP becomes apparent when using multiple instances of the same class.
$p1 = new Person;
$p2 = new Person;

// get the age property for both objects
echo $p1->getAge();
echo $p2->getAge();

// set different age for both objects
$p1->setAge(18);
$p2->setAge(25);

// output both objects' age values
echo $p1->getAge();
echo $p2->getAge();

// Magic Methods in OOP
// Using Constructors and Destructors
class Person2
{
    public $age;

    function __construct($age)
    {
        $this->age = $age;
        echo 'The class "', __CLASS__, '" was initiated!<br />';
    }
    function setAge($newage)
    {
        $this->age = $newage;
    }

    function getAge()
    {
        return $this->age . "<br />";
    }

    function __destruct()
    {
        echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }
    protected function getAge2()
    {
        return $this->age . "<br />";
    }
}

// Create a new object
$p = new Person2(20);

// Get the value of $age
echo $p->getAge();

echo "End of file.";

// To explicitly trigger the destructor, you can destroy the object using the function unset():

$p = new Person;
// Get the value of $age
echo $p->getAge();
unset($obj);

// Converting to a String
$p = new Person;

// Output the object as a string
echo $p;

// Using Class Inheritance
class TallPerson extends Person2
{

    function __construct()
    {
        echo 'The class "', __CLASS__, '" was initiated!<br />';
    }

    function speak()
    {
        echo "I am not just a Person but a " . __CLASS__;
    }
}

$p = new TallPerson;

// Use a method on child class
echo $p->speak();

// Access a method on the parent class
echo $p->getAge();

// Overwriting Inherited Properties and Methods
class TallPerson2 extends Person2
{

    function __construct()
    {
        echo 'The class "', __CLASS__, '" was initiated!<br>';
    }

    function speak()
    {
        echo "I am not just a Person but a " . __CLASS__;
    }
    public function callProtectedAge()
    {
        return $this->getAge2();
    }
}
$p = new TallPerson2;

// Use a method on child class
echo $p->speak();

// Use a method from the parent class
echo $p->getAge();

// Assigning the Visibility of Properties and Methods

// Public Properties and Methods
// All the methods and properties you've used so far have been public. This means that they can be accessed anywhere, both within the class and externally.

// Protected Properties and Methods
// When a property or method is declared protected, it can only be accessed within the class itself or in descendant classes (classes that extend the class containing the protected method).
echo $p->callProtectedAge();

// Private Properties and Methods
// A property or method declared private is accessible only from within the class that defines it. This means that even if a new class extends the class that defines a private property, that property or method will not be available at all within the child class.

// Static Properties and Methods
// A method or property declared static can be accessed without first instantiating the class; you simply supply the class name, scope resolution operator, and the property or method name.

// Specifying Types on Properties 
// When defining a property inside a class, you can also specify what type of data the property should hold. 
//  "One of the major benefits of using types on properties is that they type check your class variables and signal you when a wrong data type is used."
// To demonstrate this, add int to the $age property to ensure it only receives an integer value. Then attempt to pass the value null to $age: