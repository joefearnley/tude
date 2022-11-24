<?php

use App\Models\Item;

dataset('items', function () {
    return [
        Item::factory()->create(),
        Item::factory()->create(),
        Item::factory()->create(),
        Item::factory()->create(),
    ];
});
