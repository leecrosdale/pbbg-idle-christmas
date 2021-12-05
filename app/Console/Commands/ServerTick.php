<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class ServerTick extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:tick';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Server Tick Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get all active tasks and tick them.

        $loopCount = 0;
        $totalLoops = 60;

        do {

            $start = microtime(true);
            $this->comment("Starting loop {$loopCount}");

            $tasks = Task::with('active_characters')->get();

            foreach($tasks as $task)
            {
//                $this->comment("Executing {$task->name}");

                $characters = $task->active_characters;
                $itemGained = $task->item;
                $quantityGained = $task->item_quantity;
                $taskTimeInSeconds = $task->time_in_seconds;

                foreach ($characters as $character)
                {

                    if (!$character->last_task_tick) {
                        $character->tickTask();
                    }

                    if (now()->diffInSeconds($character->last_task_tick) >= $taskTimeInSeconds) {

                        $this->comment("Giving {$character->name} {$quantityGained} x {$itemGained->name}");

                        $character->addItem($itemGained, $quantityGained);
                        $character->tickTask();
                    }
                }

//                $this->comment("Finished executing {$task->name}");
            }

            $loopCount++;

            $time_elapsed_secs = microtime(true) - $start;
            $wait_time_seconds = (1 - $time_elapsed_secs) * 1000000;

            $this->comment("Completed {$loopCount} in {$time_elapsed_secs} - waiting {$wait_time_seconds}");

            usleep($wait_time_seconds);

        } while($loopCount < $totalLoops);


        return Command::SUCCESS;
    }
}
