<?php

namespace App\Jobs;

use App\Mail\AlertNotDone;
use App\Mail\NewChapter;
use App\Mail\NewUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;
    public $data;
    public $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $users, $type)
    {
        $this->data = $data;
        $this->users = $users;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->type) {
            case 'newchapter':
                foreach ($this->users as $user)
                {
                    Mail::to($user->email)->send(new NewChapter($this->data));
                }
                break;
            case 'alertnotdone':
                foreach ($this->users as $user)
                {
                    Mail::to($user->email)->send(new AlertNotDone($this->data));
                }
                break;
            // case 'newuser':
            //         Mail::to($this->users)->send(new NewUser($this->data));
            //     break;

            default:
                # code...
                break;
        }
    }
}
