<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function update(User $currentUser, User $user)
    {
        //只要更新的用户是自己就可以 执行更新操作
        return $currentUser->id === $user->id;
    }

    public function destroy(User $currentUser, User $user)
    {
        //身为管理员且删除的用户不是自己   才可以执行删除操作
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }

}
