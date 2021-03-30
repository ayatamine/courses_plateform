<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatsDates;
class Video extends Model
{
    use HasFactory,FormatsDates;
    protected $guarded=[''];
}
