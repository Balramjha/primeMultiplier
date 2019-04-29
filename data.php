<?php 
class PrimeNumberSeries {

  protected $seriesLength;

  function __construct($seriesLength){
    $this->seriesLength = $seriesLength;
  }

  function generate(){
    $seriesLength = 0;
    $series = [];
    $number = 2;
    while($seriesLength < $this->seriesLength){
      if($this->isPrimeNumber($number)){
        $series[$seriesLength] = $number;
        $seriesLength++;
      }
      $number++;
    }
    return $series;
  }

  private function isPrimeNumber($number){
    for ($j = 2; $j<=($number / 2); $j++) {
      if ($number % $j === 0) {
        return false;
      }
    }
    return true;
  }

}

class MultiplicationTable {

  protected $number;

  protected $seperator = ' ';

  protected $multipliers = [];

  function __construct($number){
    $this->number = $number;
  }

  function multipliers($multipliers){
    $this->multipliers = $multipliers;
    return $this;
  }

  function multiply(){
    foreach($this->multipliers as $multiplier){
      echo ($this->number * $multiplier).$this->seperator;
    }
  }
}

$primeNumberSeries = (new PrimeNumberSeries(10))->generate();
echo ' | ';
foreach($primeNumberSeries as $number){
  echo $number.' ';
}

echo nl2br(PHP_EOL).'-- + ---------------------------------------------'.nl2br(PHP_EOL);

foreach($primeNumberSeries as $number) {
  echo $number .' | ';
  (new MultiplicationTable($number))->multipliers($primeNumberSeries)->multiply();
  echo nl2br(PHP_EOL);
}

?> 
