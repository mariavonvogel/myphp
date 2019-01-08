<?php

class Route
{
    static function start()
    {
        // контроллер и экшен по умолчанию
        $controllerName = 'Main';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $actionName = $routes[2];
        }

        $modelName      = 'Model' . ucfirst($controllerName);
        $controllerName = 'Controller' . ucfirst($controllerName);
        $actionName     = 'action' . ucfirst($actionName);

        // подцепляем файл с классом модели (файла модели может и не быть)
        $modelFile = $modelName . '.php';
        $modelPath = registry::get('models') . $modelFile;

        if (is_file($modelPath)) {
            include registry::get('models') . $modelFile;
        }

        // подцепляем файл с классом контроллера
        $controllerFile = $controllerName . '.php';
        $controllerPath = registry::get('controllers') . $controllerFile;

        if (is_file($controllerPath)) {
            include registry::get('controllers') . $controllerFile;
        } else {
            Route::ErrorPage404();
        }

        // создаем объект класса контроллер
        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}