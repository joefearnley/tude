<?php

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// beforeEach(fn () => User::factory()->create());

it('items:list can be called', function() {
    $this->artisan('items:list');

    $this->assertCommandCalled('items:list');
});

it('items:list displays all items by default', function () {
    Item::factory()->count(3)->create();

    $items = Item::all(['name', 'complete', 'due_date']);

    $this->artisan('items:list')
        ->expectsTable(
            ['Name', 'Complete?', 'Due Date'],
            $items->toArray()
        );
});

it('items:list displays all items with --all option', function () {
    Item::factory()->count(3)->create();

    $items = Item::all(['name', 'complete', 'due_date']);

    $this->artisan('items:list', ['--all' => true]);

    $this->artisan('items:list')
        ->expectsTable(
            ['Name', 'Complete?', 'Due Date'],
            $items->toArray()
        );
});
