<?php

namespace App\Models;

use App\ReportStatus;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ReportSpj extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => ReportStatus::class,
    ];

    public function funds()
    {
        return $this->hasMany(ReportSpjFund::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('report_spj_proof_images')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'application/pdf'])
            ->withResponsiveImages();
    }
}
