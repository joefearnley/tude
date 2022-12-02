<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class AddCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'item:add';

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
        $inputValid = false;
        while($inputValid) {
            $name = $this->ask('Item name?');
            $dueDate = $this->ask('Item due date? (optional)');

            if ($name != '' && $this->validateDueDate()) {
                $inputValid = true;
            }
        }

        // continue on....
    }

    private function validateDueDate($input)
    {
        return true;
    }
}
