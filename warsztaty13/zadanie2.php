<?php

interface Employee{
    public function getSalary();
    public function setSalary($salary);
    public function getRole();
}

class Manager implements Employee{
    private $salary;
    private $employees = [];

    public function getSalary(){
        return $this->salary;
    }

    public function setSalary($salary){
        $this->salary = $salary;
    }

    public function getRole(){
        return get_class($this);
    }

    public function addEmployee(Employee $employee){
        $this->employees[] = $employee;
    }

    public function getEmployees(){
        return $this->employees;
    }
}

class Developer implements Employee{
    private $salary;
    private $programminglanguage;

    public function getSalary(){
        return $this->salary;
    }

    public function setSalary($salary){
        $this->salary = $salary;
    }

    public function getRole(){
        return get_class($this);
    }

    public function setProgrammingLanguage($programminglanguage){
        $this->programminglanguage = $programminglanguage;
    }

    public function getProgrammingLanguage(){
        return $this->programminglanguage;
    }
}

class Designer  implements Employee{
    private $salary;
    private $designingTool;

    public function getSalary(){
        return $this->salary;
    }

    public function setSalary($salary){
        $this->salary = $salary;
    }

    public function getRole(){
        return get_class($this);
    }

    public function setDesigningTool($designingTool){
        $this->designingTool = $designingTool;
    }

    public function getDesigningTool(){
        return $this->designingTool;
    }
}


$manager = new Manager();
$manager->setSalary(10000);

$developer1 = new Developer();
$developer1->setSalary(7000);
$developer1->setProgrammingLanguage("PHP");

$developer2 = new Developer();
$developer2->setSalary(7500);
$developer2->setProgrammingLanguage("JavaScript");

$designer = new Designer();
$designer->setSalary(6500);
$designer->setDesigningTool("Figma");

$manager->addEmployee($developer1);
$manager->addEmployee($developer2);
$manager->addEmployee($designer);

echo "Manager:\n";
echo "Rola: " . $manager->getRole() . "\n";
echo "Pensja: " . $manager->getSalary() . "\n";
echo "Podwładni:\n";
foreach ($manager->getEmployees() as $employee) {
    echo "Rola: " . $employee->getRole() . "\n";
    echo "Pensja: " . $employee->getSalary() . "\n";

    if ($employee instanceof Developer) {
        echo "Język programowania: " . $employee->getProgrammingLanguage() . "\n";
    } elseif ($employee instanceof Designer) {
        echo "Narzędzie do projektowania: " . $employee->getDesigningTool() . "\n";
    }
    echo "\n";
}
?>