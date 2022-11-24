<?php

use App\Models\Item;

it('items:list can be called', function() {
    $this->artisan('items:list');

    $this->assertCommandCalled('items:list');
});

it('items:list displays all items', function () {
    $items = Item::factory()->count(3)->create();

    $items = $items->map->only(['name', 'complete', 'due_date']);

    $this->artisan('items:list')
        ->expectsTable(
            ['Name', 'Complete?', 'Due Date'],
            $items->toArray()
        );
});
