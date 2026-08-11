<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you pass to your tests is always bound to an instance of
| PHPUnit TestCase. By default, the "tests/Pest.php" file is loaded
| automatically by Pest.
|
*/

pest()
    ->extend(TestCase::class)
    ->use(RefreshDatabase::class)
    ->in('Feature');
