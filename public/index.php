<?php
// Donne accés a toutes les dependances installées via composer.
require_once __DIR__ . '/../vendor/autoload.php';

/*spl_autoload_register(function($className) {
    echo 'autoloadTest : '.$className.'<br>';
    $classNameWithSlash = str_replace('\\', '/', $className);
    $classNameCleaned = str_replace('Oshop/', '', $classNameWithSlash);
    echo __DIR__.'/../'.strtolower($classNameCleaned).'.php<br>';

    require_once __DIR__.'/../'.$classNameCleaned.'.php';
});
*/

// Instancie AltoRouteur
$router = new AltoRouter();


//dump($_SERVER['REQUEST_URI']);die;
//http://localhost/socle_php/hermes/s05/S05-projet-oShop-morgancorroyer/public
// Definit la racine du site
$router->setBasePath($_SERVER['BASE_URI']);

// map permet de créer une nouvelle route
$router->map(
    // Definit le verbe HTTP
    'GET',
    // Definit l'URL de la route
    '/',
    // Definit la methode et la controller
    [
        // Definit la methode qui va etre executée
        'action' => 'home',
        'controller' => '\Oshop\Controllers\MainController'
    ],
    // Nom de la route pour altorouteur
    'home'
);

$router->map(
    'GET',
    '/legal',
    [
        'action' => 'legalMentions',
        'controller' => '\Oshop\Controllers\MainController'
    ],
    'legal'
);

$router->map(
    'GET',
    '/catalog/category/[i:id]',
    [
        'action' => 'category',
        'controller' => '\Oshop\Controllers\CatalogController'
    ],
    'catalog-category'
);

$router->map(
    'GET',
    '/catalog/type/[i:id]',
    [
        'action' => 'type',
        'controller' => '\Oshop\Controllers\CatalogController'
    ],
    'catalog-type'
);

$router->map(
    'GET',
    '/catalog/brand/[i:id]',
    [
        'action' => 'brand',
        'controller' => '\Oshop\Controllers\CatalogController'
    ],
    'catalog-brand'
);

$router->map(
    'GET',
    '/catalog/product/[i:id]',
    [
        'action' => 'product',
        'controller' => '\Oshop\Controllers\CatalogController'
    ],
    'catalog-product'
);

// Utile uniquement en dev, a retirer avant la mise en prod
$router->map(
    'GET',
    '/test',
    [
        'action' => 'test',
        'controller' => 'MainController'
    ],
    'test'
);
// on faire la liaison entre l'URL et les routes integrées via map
$match = $router->match();
// Determine si une route correspond a l'URL
if($match) {
    $methodToUse = $match['target']['action'];
    $controllerToUse = $match['target']['controller'];

    // On instancie notre controller
    $controller = new $controllerToUse();
    // On execute la methode definie dans la route
    $controller->$methodToUse($match['params']);
} else {
    // Si aucune route ne correspond a l'URL
    exit('404 Not found');
}

// Une ternaire va renvoyer soit le param page ou null
//$route = isset($_GET['page']) ? substr($_GET['page'], 1) : null;
/**$route = null;
if(isset($_GET['page'])) {
    $route = $_GET['page'];
} else {
    $route = null;
}*/

// Definition de toutes nos routes
/**$routes = [
    'home' => [
        'url' => '',
        'method' => 'home'
    ],
    'category' => [
        'url' => '',
        'method' => 'category'
    ]
];
// Instanciation de notre MainController
$controller = new MainController();

foreach ($routes as $routeName => $routeValues) {
    // Si $route est egal au nom de la route, c'est celle qu'on utilise
    if($route === $routeName) {
        $method = $routeValues['method'];

        // On charge dynamiquement notre méthode en fonction de $template
        $controller->$method();
        exit;
    }
}
$controller->home();*/