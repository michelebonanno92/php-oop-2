<?php

    class Product {
        public $title ;
        public $price ;
        public $img ;
        protected $category ;

        function  __construct(string $title, float $price,string $img ,Category $category){
            $this->title = $title;
            $this->price = $price;
            $this->img = $img;
            $this->setCategory($category);
        }

        public function getCategory() {
            return $this->category;
        }

        public function setCategory(Category $category){
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



    $cani = new Category(1234 , '=)');
    var_dump($cani);

    $gatti = new Category('Gatti' , '=)');
    var_dump($gatti);

    $prodottiPerGatti = new Product(
        'prodotto',
         15.99,
         'img',
         $gatti
        );
    var_dump($prodottiPerGatti);





?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>
            Ciao Gente
        </h1>
    </body>
</html>