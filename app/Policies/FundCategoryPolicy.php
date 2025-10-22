<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FundCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class FundCategoryPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FundCategory');
    }

    public function view(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('View:FundCategory');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FundCategory');
    }

    public function update(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('Update:FundCategory');
    }

    public function delete(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('Delete:FundCategory');
    }

    public function restore(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('Restore:FundCategory');
    }

    public function forceDelete(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('ForceDelete:FundCategory');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FundCategory');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FundCategory');
    }

    public function replicate(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('Replicate:FundCategory');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FundCategory');
    }

}