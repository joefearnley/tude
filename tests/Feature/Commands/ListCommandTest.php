<?php

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn () => Item::factory()->count(5)->create());

it('items:list can be called', function() {
    $this->artisan('items:list');

    $this->assertCommandCalled('items:list');
});

it('items:list displays all items by default', function () {
    $items = Item::query(['name', 'complete', 'due_date'])->forDisplay();

    $this->artisan('items:list')
        ->expectsTable(
            ['Complete?', 'Name', 'Due Date'],
            $items
        );
});

it('items:list displays all items with --all option', function () {
    $items = Item::query(['name', 'complete', 'due_date'])->forDisplay();

    $this->artisan('items:list', ['--all' => true])
        ->expectsTable(
            ['Complete?', 'Name', 'Due Date'],
            $items
        );
});

it('items:list displays true or false', function() {
    $this->artisan('items:list')
        ->expectsOutputToContain('[x]')
        ->expectsOutputToContain('[ ]');
});

it('items:list displays only complete items with --completed option', function() {
    $this->artisan('items:list', ['--completed' => true])
        ->expectsOutputToContain('[x]')
        ->doesntExpectOutputToContain('[ ]');
});

it('items:list displays only complete items with --open option', function() {
    $this->artisan('items:list', ['--open' => true])
        ->expectsOutputToContain('[ ]')
        ->doesntExpectOutputToContain('[x]');
});