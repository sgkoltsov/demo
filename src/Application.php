<?php
namespace App;

use App\View\Renderable;
use App\View\View;
use App\Exception\NotFoundException;

class Application
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function run(string $url, string $method)
    {
        try {

            $view = $this->router->dispatch($url, $method);

            if ($view instanceof Renderable) {
                $view->render();
            } else {
                echo $view;
            }            
        } catch (NotFoundException $e) {            
            (new View('templates.errors', ['errorMessage' => $e->getMessage(), 'errorCode' => $e->getCode()]))->render();
        }
    }
}
