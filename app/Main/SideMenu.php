<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        return [
			'Reporting' => [
                'icon'=>'home',
                'title'=>'Reporting',
                'route_name'=>'dashboard-overview-1',
                'params' => [
                    'layout' => 'side-menu',
                ],
                
            ],
            'operations'=>[
                'icon'=>'settings',
                'title'=>'Opérations',
                'route_name'=>'operationListe',
                'params' => [
                    'layout' => 'side-menu',
                ]
            ],
            'terminal'=>[
                'icon' =>'hard-drive',
                'title' => 'Terminal',
                'sub_menu' => [
                    'Liste-Terminaux'=>[
                        'icon' => 'LT',
                        'route_name' => 'liste',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Liste Terminaux'
                    ],
                    'Modele' =>[
                        'icon' => 'M-d',
                        'route_name'=>'modeleListe',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' =>'Modèle'
                    ],
                    'fabriquants' => [
                        'icon'=>'F-q',
                        'route_name' => 'fabriquantListe',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' =>'Fabriquants'
                    ],
                
                        'interventions' => [
                            
                            'route_name' => 'typeRequeteListe',
                            'params' => [
                                'layout' => 'side-menu',
                            ],
                            'title' =>'Interventions'
                        ]
                    
                ]
                
            ],
            'marchand' => [
                'icon' => 'home',
                'title' =>'Marchand',
                'sub_menu' => [
                    'Liste-Marchand' => [
                        'icon' =>'',
                        'route_name' => 'marchandListe',
                        'params' =>[
                            'layout' =>'side-menu',
                        ],
                        'title' => 'Liste Marchand'
                    ],
                    'Ville' => [
                        'icon' => '',
                        'route_name' => 'villeListe',
                        'params' => [
                            'layout' => 'side-menu',
                        ],
                        'title' => 'Ville'
                    ]
                ]
            ]
            ,
            'users' => [
                'icon' => 'users',
                'title' => 'Users',

            ],
            'profile' => [
                'icon' => 'trello',
                'title' => 'Profile',
            ],
        ];
    }
}
