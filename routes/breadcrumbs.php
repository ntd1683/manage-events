<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('Index', route('index'));
});

Breadcrumbs::for('google', function (BreadcrumbTrail $trail) {
    $trail->push('Google', route('google'));
});
