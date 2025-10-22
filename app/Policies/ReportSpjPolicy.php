<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ReportSpj;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportSpjPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ReportSpj');
    }

    public function view(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('View:ReportSpj');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ReportSpj');
    }

    public function update(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('Update:ReportSpj');
    }

    public function delete(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('Delete:ReportSpj');
    }

    public function restore(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('Restore:ReportSpj');
    }

    public function forceDelete(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('ForceDelete:ReportSpj');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ReportSpj');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ReportSpj');
    }

    public function replicate(AuthUser $authUser, ReportSpj $reportSpj): bool
    {
        return $authUser->can('Replicate:ReportSpj');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ReportSpj');
    }

}