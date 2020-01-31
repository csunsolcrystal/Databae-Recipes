<?php
namespace App\Policies;
use App\Recipe;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class RecipePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can update the recipe.
     *
     * @param  \App\User   $user
     * @param  \App\Recipe $recipe
     * @return mixed
     */
    public function update(User $user, Recipe $recipe)
    {
        return $recipe->user_id == $user->id;
    }
}