<?php

  // クラスの利用 in PHP_課題:クラスの作成1
  //
  // 以下の機能を持つクラスを作成してください。
  // ・パブリックな２つの変数
  // ・２つの変数に値を設定するパブリックな関数
  // ・２つの変数の中身をechoするパブリックな関数

  class Bike {

    // public $brand = '';
    // public $model = '';
    public $brand;
    public $model;

    public function __construct($brand, $model) {
      $this -> brand = $brand;
      $this -> model = $model;
    }

    public function setBike($b, $m) {
      $this->brand = $b;
      $this->model = $m;
    }

    public function callBike() {
      echo $this->brand.': '.$this->model;
      echo "<br>";
    }

  }

  $myBike = new Bike('Specialized', 'Sector');
  $myBike->callBike();
  $myBike->setBike('Basso', 'Diamante');
  $myBike->callBike();
