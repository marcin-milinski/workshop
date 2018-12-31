<?php

namespace App\Workshop\SOLID\LSP\V2;

interface ProductsRepositoryInterface
{
    public function getAll() : array;
}

class ProductsRepositoryCSV implements ProductsRepositoryInterface
{
    public function getAll() : array
    {
        // some logic here to get CSV records to store in array
        return [];
    }
}

class ProductsRepositoryDB implements ProductsRepositoryInterface
{
    public function getAll() : array
    {
        return DB::table('products')->getAll()->toArray();
    }
}
