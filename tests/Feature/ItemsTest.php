<?php

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn () => Item::factory()->count(5)->create());

test('items complete query scope returns complete items', function () {
    $items = Item::complete()->get();

    foreach ($items as $item) {
        expect($item)->complete->toBe(true);
    }
});

test('items open query scope retusn open items', function () {
    $items = Item::open()->get();

    foreach ($items as $item) {
        expect($item)->complete->toBe(false);
    }
});

test('items for display scope is an array', function() {
    $itemsForDisplay = Item::query(['name', 'complete', 'due_date'])->forDisplay();

    $this->assertIsArray($itemsForDisplay);
});

// test('items for display scope contains item data', function() {
//     $itemsForDisplay = Item::query(['name', 'complete', 'due_date'])->forDisplay();

//     foreach($itemsForDisplay as $item) {
//         $this->assertArrayHasKey('name', $item);
//         $this->assertArrayHasKey('complete', $item);
//         $this->assertArrayHasKey('due_date', $item);

//         $this->assertArrayNotHasKey('id', $item);
//         $this->assertArrayNotHasKey('created_at', $item);
//         $this->assertArrayNotHasKey('updated_at', $item);
//     }
// });