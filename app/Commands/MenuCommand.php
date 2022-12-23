<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\Item;

class MenuCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'items:menu';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Interactive menu for todo items';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = Item::all()->pluck('name')->toArray();

        $option = $this->menu('Todo Items', $items)->open();

        dd($option);
    }
}
