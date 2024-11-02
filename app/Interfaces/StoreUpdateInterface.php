<?php

namespace App\Interfaces;

interface StoreUpdateInterface
{
    public function store(array $data) : void;

    public function update(array $data, object $model) : object;
}
