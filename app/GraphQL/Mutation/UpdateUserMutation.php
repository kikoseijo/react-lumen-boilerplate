<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUser'
    ];
    public function type()
    {
        return GraphQL::type('users');
    }
    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int())
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }
    public function resolve($root, $args)
    {
        $user = User::find($args['id']);
        if (!$user) {
            return null;
        }
        $user->name = $args['name'];
        $user->save();
        return $user;
    }

}