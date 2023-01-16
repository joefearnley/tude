<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\Item;

class CompleteCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'items:complete';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Complete an item.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $items = Item::complete()->pluck('name')->toArray();

        $title = 'Todo Items - Select item to complete';

        $option = $this
            ->menu($title, $items)
            ->setForegroundColour('green')
            ->setBackgroundColour('black')
            ->setWidth(200)
            ->setPadding(10)
            ->setMargin(5)
            ->setExitButtonText("Abort")
            // remove exit button with
            // ->disableDefaultItems()
            ->setTitleSeparator('*-')
            ->addLineBreak('<3', 2)
            ->addStaticItem('AREA 2')
            ->open();


        dd($option);

        // if (isset($option)) {
        //     $item = Item::find($option);
        //     $item->complete = true;
        //     $item->save();
        // }
    }
}
