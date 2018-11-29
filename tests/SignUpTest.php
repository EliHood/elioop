<?php
require './User.php';
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class FirstTest extends TestCase{


  public function testTrueAssetsToTrue()
  {
    $condition = true;
    $this->assertTrue($condition);
  }



}
