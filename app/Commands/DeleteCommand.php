<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\Item;

class DeleteCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'items:delete
        {--all : List all todo items (optional)}
        {--completed : List all completed todo items (optional)}
        {--open : List all open todo items (optional)}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Delete an item';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $query =  Item::query(['id', 'name']);

        if ($this->option('completed')) {
            $query->complete();
        }

        if ($this->option('open')) {
            $query->open();
        }

        $items = $query->get();

        $itemsForDisplay = $items->map(function ($item) {
            $completeDisplay = $item->complete ? '[x] ': '[ ] ';
            return$completeDisplay . $item->name;
        })->toArray();

        $title = 'Todo Items - Select item to delete';

        $option = $this
            ->menu($title, $itemsForDisplay)
            ->setForegroundColour('green')
            ->setBackgroundColour('black')
            ->setWidth(200)
            ->setPadding(10)
            ->setMargin(5)
            ->setExitButtonText('Nevermind')
            ->setTitleSeparator('*-')
            ->addLineBreak('-', 1)
            ->open();

        if (isset($option)) {
            $item = Item::find($items[$option]->id);
            $item->delete();

            $this->info('Todo item "' . $item->name . '" has been marked deleted!');
        }
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
