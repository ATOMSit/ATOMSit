<?php

// Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Tableau de bord', route('admin.home'));
});