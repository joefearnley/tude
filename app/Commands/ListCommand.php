<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\Item;

class ListCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'items:list 
        {--all : List all todo items (optional)}
        {--completed : List all completed todo items (optional)}
        {--open : List all open todo items (optional)}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'List the items to do';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = Item::all(['name', 'complete', 'due_date'])
            ->map(function($item) {
                return [
                    'name' => $item->name,
                    'complete' => $item->complete ? 'True' : 'False',
                    'due_date' => isset($item->due_date) ? $item->due_date->format('m/d/Y') : null,
                ];
            });

        if ($this->option('completed')) {}

        $this->table(
            ['Name', 'Complete?', 'Due Date'],
            $items->toArray(),
        );
    }
}
