<?php
// Kiểm tra session trước khi start
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Autoload classes
spl_autoload_register(function($class){
    $file = 'system/libs/'.$class.'.php';
    if (file_exists($file)) {
        include_once $file;
    }
});

// Get URL from request
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'index';
$url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
define('BASE_URL', 'http://localhost/web_perfume');

// Parse URL components
$controllerName = !empty($url[0]) ? ucfirst(strtolower($url[0])) : 'Index';
$methodName = !empty($url[1]) ? $url[1] : 'index';
$params = array_slice($url, 2);

// Build controller file path
$controllerFile = 'app/controllers/' . $controllerName . '.php';

// Check if controller file exists
if (file_exists($controllerFile)) {
    include_once $controllerFile;
    
    // Check if controller class exists
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        
        // Check if method exists
        if (method_exists($controller, $methodName)) {
            // Call controller method with parameters
            call_user_func_array([$controller, $methodName], $params);
        } else {
            // Method not found - show error page or redirect
            http_response_code(404);
            echo "<!DOCTYPE html>
<html>
<head>
    <title>404 - Method Not Found</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        h1 { color: #e74c3c; }
        a { color: #3498db; text-decoration: none; }
    </style>
</head>
<body>
    <h1>404 - Method Not Found</h1>
    <p>The method <strong>{$methodName}</strong> does not exist in controller <strong>{$controllerName}</strong>.</p>
    <a href='/web_perfume/'>← Back to Home</a>
</body>
</html>";
        }
    } else {
        // Controller class not found
        http_response_code(404);
        echo "<!DOCTYPE html>
<html>
<head>
    <title>404 - Controller Class Not Found</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding: 50px; }
        h1 { color: #e74c3c; }
        a { color: #3498db; text-decoration: none; }
    </style>
</head>
<body>
    <h1>404 - Controller Class Not Found</h1>
    <p>The controller class <strong>{$controllerName}</strong> does not exist.</p>
    <a href='/web_perfume/'>← Back to Home</a>
</body>
</html>";
    }
} else {
    // Controller file not found
    http_response_code(404);
    echo "<!DOCTYPE html>
<html>
<head>
    <title>404 - Page Not Found</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            text-align: center; 
            padding: 50px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .error-container {
            background: rgba(255,255,255,0.1);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
        h1 { 
            font-size: 72px; 
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        p { 
            font-size: 18px; 
            margin: 20px 0;
        }
        a { 
            color: white; 
            background: rgba(255,255,255,0.2);
            padding: 10px 30px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: all 0.3s;
        }
        a:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class='error-container'>
        <h1>404</h1>
        <p>Oops! The page you're looking for doesn't exist.</p>
        <p><small>Controller: <strong>{$controllerName}.php</strong> not found</small></p>
        <a href='/web_perfume/'>← Back to Home</a>
    </div>
</body>
</html>";
}

?>