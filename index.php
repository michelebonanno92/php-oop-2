<?php

    class Product {
        public $title ;
        public $price ;
        public $img ;
        public $category ;

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
    };

    trait Color {

        public $color;
        
        public function getColor() {
            return $this->color;
        }

        public function setColor(string $color){
           if(strlen($color) >= 3) {
            $this->color = $color;
           } 
            else{
                $this->color = null;
            }

        }
    }

    class Category {
        use Color;
        public $name;
        public $icon;

        function  __construct(string $color,string $name,string $icon){
            $this->color = $color ;
            $this->name = $name;
            $this->icon = $icon;

        }
    };

    // $prova = new Category() ;
    // var_dump($prova);

    class Food extends Product {

        public $ingredients;

        function __construct(string $title, float $price, string $img , Category|null $category = null, string $ingredients = null) {
            parent::__construct($title,$price,$img,$category);

            $this->ingredients = $ingredients;
        }
    };

    class Toy extends Product {
        
        public $material;

        function __construct(string $title, float $price,string $img ,Category|null $category = null, string $material = null) {
            parent::__construct($title, $price, $img, $category);

            $this->material = $material;
        }
    };

    class PetBed extends Product {

        public $size;

        function __construct(string $title, float $price,string $img , Category|null $category = null,  string $size = null ) {
            parent::__construct($title, $price, $img, $category);

            $this->size = $size;
        }
    };

    $cani = new Category('Rosso','Cani','🐶');

    $gatti = new Category('Blu','Gatti','🐱');

    $prodottoPerGatti = new Product (
        'Prodotto per gatti',
         5.998888888,
         'https://www.centroveterinariosanfilippo.it/images/gatto.jpg',
         $gatti
        );
    
    $prodottoPerCani = new Product (
        'Prodotto per cani',
         3000888888.99,
         'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8a_k7NdbDzZaO8-0Wjma777GsQk_rPPb5UA&s',
         $cani
        );

    $ciboPerGatti = new Food (
        'Cibo per gatti',
         2.99,
         'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRij5Z0sKAK7UxJLtmPs_wNC9CI820i4TtZEQ&s',
         $gatti,
         'Manzo, piselli, carote, sale'
        );

    $giocoPerGatti = new Toy (
        'Gioco per gatti',
        0.99,
        'https://arcaplanet.vtexassets.com/arquivos/ids/266266/yes-gioco-con-pallina-per-gatti-intelligenza.jpg?v=637757821671330000',
        $gatti,
        'Plastica'
        );

    $cucciaPerGatti = new PetBed (
        'Cuccia per gatti',
            5.99,
            'https://m.media-amazon.com/images/I/71hK+WBbldL._AC_UF894,1000_QL80_.jpg',
            $gatti,
            'Medium'
        );

    $ciboPerCani = new Food (
        'Cibo per cani',
         2.99,
         'https://media.dm-static.com/images/f_auto,q_auto,c_fit,h_440,w_500/v1716447371/products/pim/5900951253461_CesarDelizieGiornoPolloVerdure100gr_12745_IT/cesar-cibo-umido-in-salsa-per-cani-con-pollo-e-verdure',
         $cani,
         'Manzo, piselli, carote, sale'
        );

    $giocoPerCani = new Toy (
        'Gioco per cani',
        1.99,
        'https://arcaplanet.vtexassets.com/arquivos/ids/223864/trixie-cane-gioco-corda.jpg?v=637454736645100000',
        $cani,
        'Plastica'
        );
    
    $cucciaPerCani = new PetBed (
        'Cuccia per cani',
            5.99,
            'https://media.zooplus.com/bilder/4/400/104120_pla_kuschelbett_basic_fg_8149_4.jpg',
            $cani,
            'Large'
        );

        $products = [
            $prodottoPerGatti,
            $ciboPerGatti,
            $giocoPerGatti,
            $cucciaPerGatti,
            $prodottoPerCani,
            $ciboPerCani,
            $giocoPerCani,
            $cucciaPerCani,
         
        ];
  


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>PHP-OOP-2</title>
    </head>
    <body>
            <main>
               <div class="container">
                    <div class="row g-3">
                        <?php
                            foreach ($products as $product) {
                        ?>
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card" >
                            <img  src="  <?php echo $product->img ?>" class="card-img-top" alt="<?php echo $product->title ?>" >
                                <div class="card-body">
                                    <h2>
                                       <?php echo $product->title ?>
                                    </h2>
                                   
                                    <h6>
                                       <?php echo $product->category->name ?>
                                       <?php echo $product->category->icon ?>
                                       <?php echo $product->category->color ?>
                                    </h6>
                                    <h5>
                                        € <?php echo number_format($product->price, 2, ',', '.') ?>
                                    </h5>

                                    <h5>
                                        Product type : <?php echo get_class($product); ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
               </div>
            </main>
         
    </body>
</html>