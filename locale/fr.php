<?php

/**
 * this is the french translation
 */

$data = [
    'title' => 'Statics',
    'first_time' => [ // First Time page translation
        'greeting' => 'Bonjour, il semble que ce soit la première fois que nous mettons en place quelque chose avant de commencer?!',
        'room_price' => 'Prix des chambres',
        'hotel_rooms' => 'Chambres d\'hôtel',
        'language' => 'Langue',
        'placeholder' => [
            'single' => 'Chambre simple',
            'dual' => 'Chambre double',
            'rooms' => 'Chambres d\'hôtel',
            'language' => [
                'choose' => 'Choisir',
                'en' => 'Anglais (par défaut)',
                'fr' => 'Français',
                'ar' => 'Arabe'
            ]
        ],
        'submit' => 'Je suis prêt',
        'errors' => [
            'single_required' => 'Le champ "seul" est requis',
            'dual_required' => 'Le champ "double" est requis',
            'rooms_required' => 'Le champ "chambres" est requis',
            'rooms_interval' => 'Le numéro de chambre doit être supérieur à 20 moins de 100'
        ]
        ],
        'stats' => [
            'fill' => 'Remplissez les champs ci-dessous',
            'withIncome' => [
                'title' => 'Statistiques utilisant le revenu',
                'second_title' => 'Créer une statistique basée sur les revenus de l\'hôtel',
                'form' => [
                    'labels' => [
                        'income' => 'Revenu hôtelier en mois',
                        'host' => 'Pourcentage d\'hébergement',
                        'date' => 'Date',
                        'food' => 'Pourcentage de nourriture',
                        'drink' => 'Pourcentage de boisson'
                    ],
                    'food' => 'Nourrir',
                    'submit' => 'Soumettre'
                ]
            ],
            'withnights' => [
                'title' => 'Statistiques utilisant les nuits',
                'second_title' => 'Créer une statistique basée sur les chambres louées',
                'form' => [
                    'labels' => [
                        'single' => 'Chambres simples',
                        'dual' => 'Chambres doubles',
                        'host' => 'Pourcentage d\'hébergement',
                        'date' => 'Date',
                        'food' => 'Pourcentage de nourriture',
                        'drink' => 'Pourcentage de boisson'
                    ],
                    'lengends' => [
                        'nights' => 'Nuits',
                        'food' => 'Nourrir',
                    ],
                    'submit' => 'Soumettre'
                ],
                'alert' => [
                    'note' => 'Remarque:!',
                    'desc' => 'Ces valeurs peuvent être des nombres approximatifs'
                ]
            ],
            'settings' => [
                'change_language' => [
                    'title' => 'Changer de langue',
                    'select' => [
                        'title' => 'Langue',
                        'option' => [
                            'en' => 'Anglais',
                            'fr' => 'Français',
                            'ar' => 'Arabe'
                        ]
                    ]
                ],
                'change_hotel_rooms' => [
                    'title' => 'Changer le nombre des chambre d\'hôtel',
                    'label' => 'Chambres d\'hôtel',
                    'placeholder' => 'par exemple: 50'
                ],
                'change_room_prices' => [
                    'title' => 'Modifier les prix des chambres',
                    'legend' => 'Prix des chambres d\'hôtel',
                    'single' => 'Chambres simples',
                    'dual' => 'Chambres doubles'
                ],
                'about' => [
                    'title' => 'À propos de',
                    'desc' => [
                        'line_one' => 'Cette application est créée par Amor Ali pour l \' entreprise Tunvita. ',
                        'line_two' => 'La fonction principale de ceci est d\' aider le propriétaire de l\'hôtel à faire une simple simulation ou un historique de l \' argent gagné pour le mois',
                        'line_three' => 'L\'application fonctionne est basée sur des fonctions mathématiques et des équations de statistiques, donc le résultat que vous obtenez peut-être pas parfait mais cela vous donnera une idée et une aide précieuse.'
                    ],
                ],
                'report_bug' => 'Rapportez une erreur',
                'continue' => 'Continuer'
            ],
            'tables' => [
                'month' => [
                    'total' => 'Total',
                    'income' => 'Revenu mensuel',
                    'nights' => 'Nuits mensuelles',
                    'host' => 'Hébergement mensuel'
                ],
                'data_table' => [
                    'day_n' => 'Jour N°',
                    'day' => 'Jour',
                    'days' => 'Jours',
                    'income' => 'Revenu',
                    'nights' => 'Nuits',
                    'single' => 'Chambres simples',
                    'dual' => 'Chambres doubles',
                    'nutrition' => 'Nutrition',
                    'drink' => 'Boire',
                    'food' => 'Nourriture',
                    'download' => 'Télécharger le PDF'
                ],
                'home' => 'Page Principale'
            ]
        ]
];