<?php

namespace App\Policies;

use App\Models\User;
use App\Models\product_attribute_value;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductAttributeValuePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product_attribute_value  $productAttributeValue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, product_attribute_value $productAttributeValue)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product_attribute_value  $productAttributeValue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, product_attribute_value $productAttributeValue)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product_attribute_value  $productAttributeValue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, product_attribute_value $productAttributeValue)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product_attribute_value  $productAttributeValue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, product_attribute_value $productAttributeValue)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\product_attribute_value  $productAttributeValue
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, product_attribute_value $productAttributeValue)
    {
        //
    }
}