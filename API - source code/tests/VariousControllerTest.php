<?php

  Class VariousControllerTest extends Testcase {

    public function testFrontpageJson() {
      $response = $this->call('GET', '/json');
      $this->assertResponseOk();
    }

    public function testFrontpageHtml() {
      $response = $this->call('GET', '/html');
      $this->assertResponseOk();
    }

    public function testFrontpageXml() {
      $response = $this->call('GET', '/xml');
      $this->assertResponseOk();
    }

  }
