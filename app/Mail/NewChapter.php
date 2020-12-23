<?php

namespace App\Mail;

use App\Models\Chapter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewChapter extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $teacher;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        // $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tuongquynguyen.159@gmail.com')
                    ->subject('Một tiến trình mới vừa được giảng viên thêm vào')
                    ->markdown('emails.newchapter');
    }
}
