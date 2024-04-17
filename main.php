<?php
class Animal {
    protected $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}

class Cow extends Animal {
    public function getMilk() {
        return rand(8, 12);
    }
}

class Chicken extends Animal {
    public function getEggs() {
        return rand(0, 1);
    }
}

class Farm {
    private $animals = [];

    public function addAnimal(Animal $animal) {
        $this->animals[] = $animal;
    }

    public function countAnimals() {
        $cowCount = 0;
        $chickenCount = 0;

        foreach ($this->animals as $animal) {
            if ($animal instanceof Cow) {
                $cowCount++;
            } elseif ($animal instanceof Chicken) {
                $chickenCount++;
            }
        }

        echo "Cow count: $cowCount\n";
        echo "Chicken count: $chickenCount\n";
    }

    public function collectProduce() {
        $milkTotal = 0;
        $eggsTotal = 0;

        foreach ($this->animals as $animal) {
            if ($animal instanceof Cow) {
                $milkTotal += $animal->getMilk();
            } elseif ($animal instanceof Chicken) {
                $eggsTotal += $animal->getEggs();
            }
        }

        echo "Total milk collected: $milkTotal liters\n";
        echo "Total eggs collected: $eggsTotal pieces\n";
    }
}

$farm = new Farm();

for ($i = 1; $i <= 10; $i++) {
    $cow = new Cow($i);
    $farm->addAnimal($cow);
}

for ($i = 1; $i <= 20; $i++) {
    $chicken = new Chicken($i);
    $farm->addAnimal($chicken);
}

$farm->countAnimals();

for ($i = 1; $i <= 7; $i++) {
    echo "Day $i:\n";
    $farm->collectProduce();
}

for ($i = 1; $i <= 5; $i++) {
    $chicken = new Chicken($i);
    $farm->addAnimal($chicken);
}

$cow = new Cow(11);
$farm->addAnimal($cow);

$farm->countAnimals();

for ($i = 1; $i <= 7; $i++) {
    echo "Week $i:\n";
    $farm->collectProduce();
}
