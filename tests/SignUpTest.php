<?php
require './User.php';
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase{

  public function testTrueAssetsToTrue()
  {
    $condition = true;
    $this->assertTrue($condition);
  }

  public function testUserSignUp()
  {
    $user = new User();
    $email = "test@example.com";
    $password = "fish123";
    $username = "johndoe133";

    $result = $user->signup($email, $password, $username);
    $this->assertTrue($result);
  }

}
