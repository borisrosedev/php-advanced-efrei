<?php

namespace App\Traits;

use App\Database\MemoryDatabase;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';


trait CacheData
{
    public function saveDataInMemory($data, MemoryDatabase $memoryDb)
    {
        foreach ($data as $key => $value) {
            if (!is_null($value) && !is_numeric($key)) {
                if ($key == "password") {
                    continue;
                }
                $memoryDb->getConnection()->set($key, $value);
            }
        }
    }

    public function flushDataInMemory(MemoryDatabase $memoryDb)
    {
        $memoryDb->getConnection()->flushdb();
    }
}
