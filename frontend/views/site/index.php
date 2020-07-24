<?php

use yii\helpers\Html;
use yii\bootstrap4\Carousel;
use yii\widgets\ListView;

$this->title = 'El Cuyo';
$images=[
      [ 'content' =>'<img class="img-fluid" src="img/slider3.jpg"/>',
        'caption' => '<h2>EL CUYO</h2><p>This is the caption text</p>',
        'options' => [1],
      ],
      [ 'content' => '<img class="img-fluid" src="img/slider3.jpg"/>',
        'caption' => '<h2>EL CUYO</h2><p>This is the caption text</p>',
        'options' => [2],
      ],
      [ 'content' => '<img class="img-fluid" src="img/slider1.jpg"/>',
        'caption' => '<h2>ETC</h2><p>This is the caption text</p>',
        'options' => [3],
      ],
  ];

?>

<div class="site-index" >

    <?php
      echo Carousel::widget(['items'=> $images, ]);
    ?>

    <div class="body-content container-fluid d-flex justify-content-center" style="">

      <div class="row ">
        <div class="col-12 d-flex justify-content-center jumbotron">
          <div class="row container" style="">
            <div class="col ">
              <h1>EL CUYO</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            </div>
          </div>
        </div>


        <div class="col-12 d-flex justify-content-center">
          <div class="card-deck container ">
            <div class="card border-light">
            <img src="svg/flamenco.svg" alt="Iconos diseñados por Freepik from www.flaticon.es" class="img-fluid">
              <div class="card-body ">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>

              </div>
            </div>
            <div class="card border-light">
              <img src="svg/playa.svg" alt="Iconos diseñados por Freepik from www.flaticon.es" class="img-fluid">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>

              </div>
            </div>
            <div class="card border-light">
              <img src="svg/navegar.svg" alt="Iconos diseñados por Freepik from www.flaticon.es" class="img-fluid">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>

              </div>
            </div>
          </div>
        </div>

        <div class="col-12  " >
          <div class="row  barc">
            <div class="col d-flex justify-content-center" >
              <div class="row container"  >
                <div class="col">
                  <h3>EL CUYO</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="col-12  " style="">
          <div class="row cala" style=" ">
            <div class="col d-flex justify-content-center " style=" background: rgba(255, 0, 0, 0.5);">
              <div class="row container" style="padding-top: 100px; padding-bottom: 100px;" >
                <div class="col-8">
                  <h3>Explore a differentway to travel</h3>
                  <p>Discover new cultures and have a wonderful rest with Backpack Story! Select the country you’d like to visit and provide our agents with estimated time – they’ll find and offer the most suitable tours and hotels.</p>
                  <p>During our work, we organized countless journeys for our clients. We started as a small tour bureau, and soon we expanded our offers list. Today we have valuable experience travelling and we can advise the most stunning resorts, cities and countries to visit!</p>
                </div>

              </div>
            </div>

          </div>
        </div>



        <div class="col-12">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


        </div>
      </div>








    </div>
</div>
