<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FormatsDates;
class Testimonial extends Model
{
    use HasFactory,FormatsDates;
    protected $guarded=[''];
}
