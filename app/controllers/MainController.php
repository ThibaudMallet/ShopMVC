<?php
namespace Oshop\Controllers;

use \Oshop\Models\Type;
use \Oshop\Models\Category;


class MainController extends CoreController
{
    public function home()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->findHomeCategories();
        $this->show('home', $categories);
    }

    public function legalMentions()
    {
        $this->show('legal');
    }

    /**
     * Methode de test, a ne pas utiliser en prod
     *
     * @return void
     */
    public function test()
    {
        $model = new Type();
        dump($model->findAll(), $model->find(1));die;
    }

    
}