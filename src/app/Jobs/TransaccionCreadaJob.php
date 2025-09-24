<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Transaccion;
use App\Mail\TransaccionCreadaMail;
use Illuminate\Support\Facades\Mail;

class TransaccionCreadaJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $email,
        public Transaccion $transaccion,
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)
            ->queue(new TransaccionCreadaMail($this->transaccion));
    }
}
