<?php

function routes() {
    return require 'routes.php';
}

function router() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $matchedUri = exactMatchUriInRoutes($uri, $routes);

    if (empty($matchedUri)) {
        $matchedUri = regularExpressionMatchInRoutes($uri, $routes);
        $uri = explode('/', ltrim($uri, '/'));
        $params = params($uri, $matchedUri);
        $params = paramsFormat($uri, $params);
    }
}

function paramsFormat($uri, $params) {
    $paramsData = [];
    foreach ($params as $index => $param) {
        $paramsData[$uri[$index - 1]] = $param;
    }

    return $paramsData;
}

function params($uri, $matchedUri) {
    if (!empty($matchedUri)) {
        $matchedToGetParams = array_keys($matchedUri)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($matchedToGetParams, '/'))
        );
    }

    return $matchedUri;
}

function regularExpressionMatchInRoutes($uri, $routes) {
    return array_filter(
        $routes,
        function($value) use ($uri) {
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function exactMatchUriInRoutes($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }

    return [];
}
