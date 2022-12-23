<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use App\Models\Item;

class AddCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'items:add';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Add a To Do item';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $inputIsValid = false;
        while(!$inputIsValid) {
            $name = $this->ask('Item name?');
            $dueDate = $this->ask('Item due date? (dd/mm/YYYY) (optional)');

            if ($name != '' && $this->validateDueDate($dueDate)) {
                $inputIsValid = true;
            }
        }

        $formattedDueDate = isset($dueDate) ? Carbon::parse($dueDate)->format('d/m/Y') : null;

        // continue on....
        $item = Item::create([
            'name' => $name,
            'due_date' => $formattedDueDate,
        ]);
    }

    private function validateDueDate($dueDate)
    {
        return true;
    }
}
