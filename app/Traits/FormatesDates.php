<?php
namespace app\Traits;

use Carbon\Carbon;
trait FormatsDates
{
    // protected $newDateFormat = 'd-m-Y H:i:s';

    public function getUpdatedAtAttribute() {
       return Carbon::parse($value)->isoFormat('MMM Do YY');
    }

    public function getCreatedAtAttribute() {
        return Carbon::parse($value)->isoFormat('MMM Do YY');
    }
}
