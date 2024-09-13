<?php

use App\Core\BaseController;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertTrue;

require dirname(__DIR__, 2) . '/vendor/autoload.php';


class BaseControllerTest extends TestCase {
    private $baseControllerInstance;

    protected function setUp(): void {
        $this->baseControllerInstance = new BaseController(); 
    }

    protected function tearDown(): void {
        unset($this->baseControllerInstance);
    }

    public function testLoadModel() {
        $this->assertIsObject($this->baseControllerInstance->loadModel("user"));
    }
}