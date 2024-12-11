<?php

// Route for the home page
$router->addRoute('GET', '', function () {
    renderView('home');
});

$router->addRoute('POST', 'post_route', function () {
    echo "This is a Post Route!";
});
