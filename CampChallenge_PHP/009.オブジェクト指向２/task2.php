<?php

  // クラスの継承_課題:クラスの作成2
  //
  // 課題「クラスの作成1」のクラスを継承し、
  // 以下の機能を持つクラスを作成してください。
  // ・２つの変数の中身をクリアするパブリックな関数

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

  // $myBike = new Bike('Specialized', 'Sector');
  // $myBike->callBike();
  // $myBike->setBike('Basso', 'Diamante');
  // $myBike->callBike();

  class BikeInfo extends Bike {

    public function resetBike() {
      $this->brand = null;
      $this->model = null;
    }

  }

  $myBike = new BikeInfo('Specialized', 'Sector');
  $myBike->callBike();
  $myBike->setBike('Basso', 'Diamante');
  $myBike->callBike();
  $myBike->resetBike();
  $myBike->callBike();
