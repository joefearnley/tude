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
        $query =  Item::query(['name', 'complete', 'due_date']);

        if ($this->option('completed')) {
            $query->complete();
        }

        if ($this->option('open')) {
            $query->open();
        }

        $items = $query->forDisplay();

        $this->table(
            ['Name', 'Complete?', 'Due Date'],
            $items,
        );
    }
}
