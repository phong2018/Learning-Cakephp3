<?php

// src/Validator/ProductValidator.php
namespace App\Validator\Product;

use Cake\Validation\Validator;

class CreateProductValidator extends Validator
{
    public function __construct()
    {
        parent::__construct();

        // Add validation rules for the 'name' field
        $this
            ->requirePresence('name')
            ->notEmpty('name', 'Please enter a name.')
            ->minLength('name', 10, 'Name must be at least 10 characters long.');

        // Add validation rules for the 'description' field
        $this
            ->requirePresence('description')
            ->notEmpty('description', 'Please enter a description.');
    }
}
