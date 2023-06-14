<?php

// routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('Index'), route('index'));
});

Breadcrumbs::for('events', function (BreadcrumbTrail $trail) {
    $trail->push(trans('Events'), route('events.index'));
});

Breadcrumbs::for('create_event', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Create'), route('events.create'));
});

Breadcrumbs::for('edit_event', function (BreadcrumbTrail $trail, $route) {
    $trail->parent('events');
    $trail->push(trans('Edit'), route('events.edit', $route));
});

Breadcrumbs::for('show_event', function (BreadcrumbTrail $trail, $route) {
    $trail->parent('events');
    $trail->push(trans('Show'), route('events.show', $route));
});

Breadcrumbs::for('google', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Google Sheet Import'), route('events.google.import'));
});

Breadcrumbs::for('analytics_event', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Analytics Events'), route('events.analytics'));
});

Breadcrumbs::for('scan-qrcode', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Attendant Events'), route('events.scanQrCode'));
});

Breadcrumbs::for('manage', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Manage'), route('events.manage'));
});

Breadcrumbs::for('notify', function (BreadcrumbTrail $trail) {
    $trail->push(trans('Notify'), route('notify.index'));
});

Breadcrumbs::for('analytics_notify', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Create'), route('notify.create'));
});

Breadcrumbs::for('create_notify', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Create'), route('notify.create'));
});

Breadcrumbs::for('edit_notify', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push(trans('Edit'), route('notify.edit'));
});
