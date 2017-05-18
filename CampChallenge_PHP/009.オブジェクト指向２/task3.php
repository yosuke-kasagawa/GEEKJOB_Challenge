<?php

// 1～6までのステップを踏んで、「DBからデータを取得、
// 取得したデータを表示できる、2種類のクラス」を作成してください。
//
// 1. DBに人の情報を入れたテーブルを作成してください。
// 2. DBに駅の情報を入れたテーブルを作成してください。
// 3. baseという抽象クラスを作成し、以下を実装してください。
// 　 ・loadというprotectedな関数を用意してください。
// 　 ・showという公開関数を用意してください。
// 4. ３で作成した抽象クラスを継承して、以下のクラスを作成してください。
// ・人の情報を扱うHumanクラス
// ・駅の情報を扱うStationクラス
// また、各クラスに隠匿変数でtableという変数を用意し、
// 各クラスの初期化処理でtable変数にテーブル名を設定してください。
// 5. load関数でDBから全情報を取得するように各クラスの関数を実装してください。
// その際、table変数を利用して、データを取得するようにしてください。
// 6. show関数で各テーブルの情報の一覧が表示されるようにしてください。

  // 提出時は下記を「 1 -> 0 」に
  ini_set('display_errors', 0);

  // DBとPDOの準備
  define('DB_DATABASE', 'challenge_db');
  define('DB_USERNAME', 'kasagawa');
  define('DB_PASSWORD', 'kasagawa');
  define('PDO_DSN', 'mysql:host=localhost;dbname=' . DB_DATABASE . ';charset=utf8');

  // 使用するテーブルを定数化
  const HUMAN_TABLE = 'human_info';
  const STATION_TABLE = 'station_info';

  // 抽象クラスの作成
  abstract class Base {
    abstract protected function load();
    public function show() {}
  }

  // Humanクラスの作成
  class Human extends Base {

    private $table;
    private $pdo_object;

    public function __construct($table) {
      $this->table = $table;
    }

    public function __destruct() {
      $this->pdo_object = null;
    }

    public function load() {
      try {
        $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo_object->prepare("select * from $this->table");
        // $query->bindValue(':name', '%'.$search_str['name'].'%', PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $Exception) {
        die('DB接続に失敗しました: '.$Exception);
      }
    }

    public function show() {
      try {
        $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo_object->prepare("desc $this->table");
        $query->execute();
        $desc = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $pdo_object->prepare("select * from $this->table");
        $query->execute();
        $select = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "【".$this->table."】のカラム情報を表示します<br>";
        foreach ($desc as $key1 => $value1) {
          echo "<br>";
          foreach ($value1 as $key2 => $value2) {
            echo $key2.": ".$value2;
            echo "<br>";
          }
        }
        echo "<br><br>【".$this->table."】のデータ一覧を表示します<br>";
        foreach ($select as $key1 => $value1) {
          echo "<br>";
          foreach ($value1 as $key2 => $value2) {
            echo $key2.": ".$value2;
            echo "<br>";
          }
        }
      } catch (PDOException $Exception) {
        die('DB接続に失敗しました: '.$Exception);
      }
    }

  }

  // Stationクラスの作成
  class Station extends Base {

    private $table;
    private $pdo_object;

    public function __construct($table) {
      $this->table = $table;
    }

    public function __destruct() {
      $this->pdo_object = null;
    }

    public function load() {
      try {
        $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo_object->prepare("select * from $this->table");
        // $query->bindValue(':name', '%'.$search_str['name'].'%', PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $Exception) {
        die('DB接続に失敗しました: '.$Exception);
      }
    }

    public function show() {
      try {
        $pdo_object = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $pdo_object->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $pdo_object->prepare("desc $this->table");
        $query->execute();
        $desc = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = $pdo_object->prepare("select * from $this->table");
        $query->execute();
        $select = $query->fetchAll(PDO::FETCH_ASSOC);
        echo "【".$this->table."】のカラム情報を表示します<br>";
        foreach ($desc as $key1 => $value1) {
          echo "<br>";
          foreach ($value1 as $key2 => $value2) {
            echo $key2.": ".$value2;
            echo "<br>";
          }
        }
        echo "<br><br>【".$this->table."】のデータ一覧を表示します<br>";
        foreach ($select as $key1 => $value1) {
          echo "<br>";
          foreach ($value1 as $key2 => $value2) {
            echo $key2.": ".$value2;
            echo "<br>";
          }
        }
      } catch (PDOException $Exception) {
        die('DB接続に失敗しました: '.$Exception);
      }
    }

  }

  // Humanインスタンスの生成とメソッドの実行
  $human1 = new Human(HUMAN_TABLE);
  $human1_data = $human1->load();
  // echo "<pre>";
  // var_dump($human1_data);
  // echo "</pre>";
  // echo "<br><br>";
  $human1->show();
  echo "<br><br>";


  // // Stationインスタンスの生成とメソッドの実行
  $Station1 = new Station(STATION_TABLE);
  $Station1_data = $Station1->load();
  // echo "<pre>";
  // var_dump($Station1_data);
  // echo "</pre>";
  // echo "<br>";
  $Station1->show();
