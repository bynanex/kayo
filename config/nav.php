<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Project Header Navigation  Items
    |--------------------------------------------------------------------------
    |
    | Here you can define the navigation items that appear in project views.
    | If the 'route' key matches the current named route the item will appear as
    | active. The current project is passed to the 'action' when generating URLs.
    */

    'project' => [
        [
            'text' => 'Overview',
            'route' => 'overview',
            'action' => 'ProjectController@view'
        ],
        [
            'text' => 'Releases',
            'route' => 'releases',
            'action' => 'ProjectController@releases'
        ],
        [
            'text' => 'Wiki',
            'route' => 'wiki',
            'action' => 'ProjectController@wiki'
        ]
    ]

];
