<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ReportSpj;
use App\Models\User;
use App\ReportStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportSpjPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any:report_spj');
    }

    public function view(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('view:report_spj');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create:report_spj');
    }

    public function update(User $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('update:report_spj') 
        && ($authUser->hasRole(['super_admin', 'admin']) || in_array($reportSpj->status, [ReportStatus::Draft, ReportStatus::Revision]) );
    }

    public function delete(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('delete:report_spj');
    }

    public function restore(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('restore:report_spj');
    }

    public function forceDelete(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('force_delete:report_spj');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any:report_spj');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any:report_spj');
    }

    public function replicate(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('replicate:report_spj');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder:report_spj');
    }

    public function approve(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('approve:report_spj');
    }

    public function reject(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('reject:report_spj');
    }

    public function revision(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('revision:report_spj');
    }

    public function review(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('review:report_spj');
    }

}