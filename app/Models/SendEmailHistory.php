<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendEmailHistory extends Model
{
    use HasFactory;

    protected $table = "sent_email_history";

    protected $fillable = [
        "email",
        "subject",
        "message",
        "status",
    ];
}
