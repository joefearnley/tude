<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Validator;
use LaravelZero\Framework\Commands\Command;
use Carbon\Carbon;
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
        $nameIsValid = false;

        while (!$nameIsValid) {
            $name = $this->ask('Item name?');

            $validator = Validator::make(
                ['name' => $name,],
                ['name' => ['required']]
            );

            if ($validator->fails()) {
                $this->error('Item name required');
                continue;
            }

            if ($validator->passes()) {
                $nameIsValid = true;
            }
        }

        $dueDate = $this->ask('Item due date? (optional)');

        $formattedDueDate = isset($dueDate) ? Carbon::parse($dueDate)->format('d/m/Y') : null;

        $item = Item::create([
            'name' => $name,
            'due_date' => $formattedDueDate,
        ]);

        $this->info('Todo item has been created!');
    }

    private function validateName($name) {
        
    }

    private function validateDueDate($dueDate)
    {
        return true;
    }
}
