<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Computer;
use App\Events\ComputerPublicStatusChanged;
use Illuminate\Support\Facades\Log;

class Broadcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $computer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ComputerPublicStatusChanged $broadcaster)
    {
        ComputerPublicStatusChanged::dispatch($this->computer);
    }
}
