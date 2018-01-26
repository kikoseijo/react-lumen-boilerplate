<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Relay\Support\InputType as BaseInputType;
use GraphQL;

class UpdateUserEmailInput extends BaseInputType
{
    protected $attributes = [
        'name' => 'UpdateUserEmailInput',
    ];

    protected function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }
}
