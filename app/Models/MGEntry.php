<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Moloquent;
class MGEntry extends Moloquent
{
    protected $collection = 'entries';
    protected $connection = 'mongodb';
    protected $fillable = ["user_id","name", "text", "title", "date", "status"];
}
