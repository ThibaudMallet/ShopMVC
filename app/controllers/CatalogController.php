<?php
namespace Oshop\Controllers;

use \Oshop\Models\Brand;
use \Oshop\Models\Product;
use \Oshop\Models\Type;
use \Oshop\Models\Category;


class CatalogController extends CoreController
{
    public function category($params)
    {
        $categoryId = $params['id'];
        // Un objet type lié a l'id de l'URL
        $categoryModel = new Category();
        $category = $categoryModel->find($categoryId);

        // Un tableau de produits liés a l'id de la categorie
        $productModel = new Product();
        $products = $productModel->findAllByCategoryId($categoryId);

        $this->show('category', [
            "category" => $category,
            "products" => $products
        ]);
    }

    public function type($params)
    {
        $typeId = $params['id'];
        // Un objet type lié a l'id de l'URL
        $typeModel = new Type();
        $type = $typeModel->find($typeId);

        // Un tableau de produits liés a l'id du type
        $productModel = new Product();
        $products = $productModel->findAllByTypeId($typeId);

        $this->show('type', [
            "type" => $type,
            "products" => $products
        ]);
    }

    public function brand($params)
    {
        $brandId = $params['id'];

        // Un objet marque lié a l'id de l'URL
        $brandModel = new Brand();
        $brand = $brandModel->find($brandId);

        // Un tableau de produits liés a l'id de la marque
        $productModel = new Product();
        $products = $productModel->findAllByBrandId($brandId);

        $this->show('brand', [
            "brand" => $brand,
            "products" => $products
        ]);
    }

    public function product($params)
    {
        $productId = $params['id'];
        $productModel = new Product();
        $product = $productModel->findWithForeign($productId);

        // On verifie que le produit existe, sinon on renvoit un message d'erreur
        if($product === false) {
            exit('Product not found');
        }
        $this->show('product', $product);
    }
    
}