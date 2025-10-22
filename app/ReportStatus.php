<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum ReportStatus: string implements HasLabel, HasColor
{
    case Draft = 'draft';
    case Submitted = 'submitted';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Revision = 'revision';

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::Draft => 'Draft',
            self::Submitted => 'Submitted',
            self::Approved => 'Approved',
            self::Rejected => 'Rejected',
            self::Revision => 'Revision',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Draft => 'secondary',
            self::Submitted => 'primary',
            self::Approved => 'success',
            self::Rejected => 'warning',
            self::Revision => 'danger',
        };
    }
}
