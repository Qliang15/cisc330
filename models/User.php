<?php
namespace models;

class User {
    public function getAllUsers() {
        return [
            ['id' => 1, 'name' => 'Cat'],
            ['id' => 2, 'name' => 'Dog'],
            ['id' => 3, 'name' => 'Red']
        ];
    }
}

