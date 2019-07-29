<?php
namespace App\Transformers;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{

    public function transform(User $user){
        $data = $user->toArray();
        return [
            'id' => $user->id,
            'name' => (string)$user->name,
            'email' => (string)$user->email,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'email' => 'email'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
