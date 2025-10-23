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
        return $authUser->can('view_any:fund_category');
    }

    public function view(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('view:fund_category');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create:fund_category');
    }

    public function update(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('update:fund_category');
    }

    public function delete(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('delete:fund_category');
    }

    public function restore(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('restore:fund_category');
    }

    public function forceDelete(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('force_delete:fund_category');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any:fund_category');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any:fund_category');
    }

    public function replicate(AuthUser $authUser, FundCategory $fundCategory): bool
    {
        return $authUser->can('replicate:fund_category');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder:fund_category');
    }

}