<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportSpjFund extends Model
{
    protected $guarded = ['id'];

    public function fundCategory()
    {
        return $this->belongsTo(FundCategory::class);
    }
}
