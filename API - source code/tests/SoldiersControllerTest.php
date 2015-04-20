<?php

  class SoldiersControllerTest extends TestCase {

    public function testAllSoldiersRouteJson() {
      $response = $this->call('GET', '/json/soldiers/all');
      $this->assertResponseOk();
    }

    public function testAllSoldiersRouteHTml() {
      $response = $this->call('GET', '/html/soldiers/all');
      $this->assertResponseOk();
    }

    public function testSoldierRouteJson() {
      $response = $this->call('GET', '/json/soldiers/8');
      $this->assertResponseOk();
    }

    public function testSoldierRouteHtml() {
      $response = $this->call('GET', '/html/soldiers/8');
      $this->assertResponseOk();
    }

  }
