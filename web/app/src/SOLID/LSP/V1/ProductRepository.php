<?php

namespace App\Workshop\SOLID\LSP\V1;

interface ProductsRepositoryInterface
{
    public function getAll();
}

class ProductsRepositoryCSV implements ProductsRepositoryInterface
{
    public function getAll()
    {
        // some logic here to get CSV records to store in array
        return [];
    }
}

class ProductsRepositoryDB implements ProductsRepositoryInterface
{
    public function getAll()
    {
        // This violates Liskov Substitution Principle
        // as return values are different when compared same methods
        // here is a DB collection while the other method returns an array
        // The comsumer of either implementation will not work identically
        return DB::table('products')->getAll();
    }
}

// A client example below to shows how badly the LSP violation can hit the code

// As you see, adding ProductsRepositoryDB class leads to
// changes in the following function.
// Breaking LSP leads to breaking Open-Closed Principle too
function getAllProducts(ProductsRepositoryInterface $productsRepository)
{
    $products = $productsRepository->getAll();
    if ($productsRepository instanceof ProductsRepositoryDB) {
        // grab this differently than array results
    } else {
        // get array results
    }
}
