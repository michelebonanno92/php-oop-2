<?php

    class Product {
        public $title ;
        public $price ;
        public $img ;
        protected $category ;

        function  __construct(string $title, float $price,string $img , Category|null $category = null){
            $this->title = $title;
            $this->price = $price;
            $this->img = $img;
            $this->setCategory($category);
        }

        public function getCategory() {
            return $this->category;
        }

        public function setCategory(Category|null $category){
            $this->category = $category;
        }
    }

    class Category {
        public $name;
        public $icon ;

        function  __construct(string $name,string $icon){
            $this->name = $name;
            $this->icon = $icon;

        }
    }

    class Food extends Product {

        public $ingredients;

        function __construct(string $title, float $price, string $img , Category|null $category = null, string $ingredients = null) {
            parent::__construct($title,$price,$img,$category);

            $this->ingredients = $ingredients;
        }
    }

    class Toy extends Product {
        
        public $material;

        function __construct(string $title, float $price,string $img ,Category|null $category = null, string $material = null) {
            parent::__construct($title, $price, $img, $category);

            $this->material = $material;
        }
    }

    class PetBed extends Product {

        public $size;

        function __construct(string $title, float $price,string $img , Category|null $category = null,  string $size = null ) {
            parent::__construct($title, $price, $img, $category);

            $this->size = $size;
        }
    }

    $cani = new Category('Cani','🐶');
    var_dump($cani);

    $gatti = new Category('Gatti','🐱');
    var_dump($gatti);

    $prodottiPerGatti = new Product(
        'prodotto per gatti',
         5.99,
         'https://www.centroveterinariosanfilippo.it/images/gatto.jpg',
         $gatti
        );
    var_dump($prodottiPerGatti);

    
    $prodottiPerCani = new Product(
        'prodotto per cani',
         3.99,
         'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8a_k7NdbDzZaO8-0Wjma777GsQk_rPPb5UA&s',
         $cani
        );
    var_dump($prodottiPerCani);

    $ciboPerGatti = new Food(
        'Cibo per gatti',
         2.99,
         'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8a_k7NdbDzZaO8-0Wjma777GsQk_rPPb5UA&s',
         $gatti,
         'Manzo, piselli, carote, sale'
        );
    var_dump($ciboPerGatti);





?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    
    </body>
</html>