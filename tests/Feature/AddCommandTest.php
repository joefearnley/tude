<?php

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// it('items:add can be called', function() {
//     $this->artisan('items:add');

//     $this->assertCommandCalled('items:add');
// });

it('items:add expects two questions', function() {
    $this->artisan('items:add')
        ->expectsQuestion('Item name?')
        ->expectsQuestion('Item due date? (dd/mm/YYYY) (optional)')
        ->assertExitCode(0);

//    $this->assertCommandCalled('items:add');
});
