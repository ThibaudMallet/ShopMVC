<?php
namespace Oshop\Controllers;

use \Oshop\Models\Brand;
use \Oshop\Models\Type;
use \Oshop\Models\Category;


class CoreController
{
    protected function show($viewName, $viewData = [])
    {
        // Permet de recuperer l'accés a l'objet $router
        global $router;
        // Charger la liste de toutes les marques depuis notre BDD
        $brand = new Brand();
        $brands = $brand->findAll();

        $type = new Type();
        $types = $type->findAll();

        $category = new Category();
        $categories = $category->findAll();
        
        $absoluteURL = $_SERVER['BASE_URI'];
        // On charge nos partials pour avoir un header et un footer
        require_once __DIR__ . '/../views/header.tpl.php';
        // On charge le template dynamiquement selon contenu de l'URL
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        //require_once __DIR__ . "/../views/{$viewName}.tpl.php";
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}