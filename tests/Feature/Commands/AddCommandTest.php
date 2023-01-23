<?php

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('items:add expects two questions', function() {
    $this->artisan('items:add')
        ->expectsQuestion('Item name?', 'test todo')
        ->expectsQuestion('Item due date? (optional)', '')
        ->assertExitCode(0);

   $this->assertCommandCalled('items:add');
});

it('items:add adds a todo item to the database', function() {
    $this->artisan('items:add')
        ->expectsQuestion('Item name?', 'test todo')
        ->expectsQuestion('Item due date? (optional)', '')
        ->assertExitCode(0);

    $this->assertDatabaseHas('items', [
        'name' => 'test todo',
    ]);
});

it('items:add confirms todo item has been created', function() {
    $this->artisan('items:add')
        ->expectsQuestion('Item name?', 'test todo')
        ->expectsQuestion('Item due date? (optional)', '')
        ->expectsOutput('Todo item has been created!')
        ->assertExitCode(0);
});
