<?php

// routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('Index'), route('index'));
});

Breadcrumbs::for('events', function (BreadcrumbTrail $trail) {
    $trail->push(trans('Events'), route('index'));
});

Breadcrumbs::for('create_event', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Create'), route('events.create'));
});

Breadcrumbs::for('edit_event', function (BreadcrumbTrail $trail, $route) {
    $trail->parent('events');
    $trail->push(trans('Edit'), route('events.edit', $route));
});

Breadcrumbs::for('google', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Google Sheet Import'), route('events.google.import'));
});

Breadcrumbs::for('analytics', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Analytics Events'), route('events.analytics'));
});

Breadcrumbs::for('scan-qrcode', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Attendant Events'), route('events.scanQrCode'));
});
