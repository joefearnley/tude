<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\Item;

class UncompleteCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'items:uncomplete';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Uncomplete an item.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = Item::complete()->select('id', 'name')->get();

        $itemsForDisplay = $items->map(function ($item) {
            return $item->id . " - " . $item->name;
        })->toArray();

        $title = 'Todo Items - Select item to uncomplete';

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
                $item->complete = false;
                $item->save();
    
                $this->info('Todo item "' . $item->name . '" has been marked as uncomplete.');
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
