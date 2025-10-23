<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Sector;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectorPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any:sector');
    }

    public function view(AuthUser $authUser, Sector $sector): bool
    {
        return $authUser->can('view:sector');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create:sector');
    }

    public function update(AuthUser $authUser, Sector $sector): bool
    {
        return $authUser->can('update:sector');
    }

    public function delete(AuthUser $authUser, Sector $sector): bool
    {
        return $authUser->can('delete:sector');
    }

    public function restore(AuthUser $authUser, Sector $sector): bool
    {
        return $authUser->can('restore:sector');
    }

    public function forceDelete(AuthUser $authUser, Sector $sector): bool
    {
        return $authUser->can('force_delete:sector');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any:sector');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any:sector');
    }

    public function replicate(AuthUser $authUser, Sector $sector): bool
    {
        return $authUser->can('replicate:sector');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder:sector');
    }

}