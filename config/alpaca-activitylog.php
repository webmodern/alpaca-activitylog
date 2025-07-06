<?php

return [
    'resources' => [
        'ActivityLogResource' => \webmodern\AlpacaActivityLog\Resources\Activities\ActivityResource::class,
    ],

    /*
     * true - all auth users in panel
     * email - only for one email or @domain users
     * false - no acces in panel
     */
    'access' => true,

    'activitylog_resource' => [
        'should_register_navigation' => true,
        'slug' => 'activities',
        'icon' => 'heroicon-o-identification',
        'navigation_sort' => -1,
        'navigation_badge' => false,
        'navigation_group' => false,
        'sub_navigation_position' => Filament\Pages\Enums\SubNavigationPosition::Top,
        'is_globally_searchable' => false,
        'show_model_path' => true,
        'is_scoped_to_tenant' => true,
        'cluster' => 'App\Filament\Clusters\Access\AccessCluster',
    ],
];
