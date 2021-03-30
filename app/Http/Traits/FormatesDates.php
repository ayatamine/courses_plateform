trait FormatsDates
{
    protected $newDateFormat = 'd-m-Y H:i:s';

    public function getUpdatedAtAttribute($value) {
       return Carbon::parse($value)->format($this->newDateFormat);
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format($this->newDateFormat);
    }
}