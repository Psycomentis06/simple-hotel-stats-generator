<?php

/**
 * This is the english translation
 */

$data = [
    'title' => 'Statics',
    'first_time' => [ // First Time page translation
        'greeting' => 'Hello, it looks like this is your first time Let\'s set somethings up before we start ?!',
        'room_price' => 'Room Prices',
        'hotel_rooms' => 'Hotel Rooms',
        'language' => 'Language',
        'placeholder' => [
            'single' => 'Single Room',
            'dual' => 'Dual Room',
            'rooms' => 'Hotel Rooms',
            'language' => [
                'choose' => 'Choose',
                'en' => 'English (Default)',
                'fr' => 'French',
                'ar' => 'Arabic'
            ]
        ],
        'submit' => 'I\'m Ready',
        'errors' => [
            'single_required' => 'Single field is required',
            'dual_required' => 'Dual field is required',
            'rooms_required' => 'Rooms number is required',
            'rooms_interval' => 'Room number must be greater than 20 less than 100'
        ]
    ],
    'stats' => [
        'fill' => 'Fill the fields below',
        'withIncome' => [
            'title' => 'Stat using income',
            'second_title' => 'Create stat based on the hotel income',
            'form' => [
                'labels' => [
                    'income' => 'Hotel income in mounth',
                    'host' => 'Hosting Percent',
                    'date' => 'Date',
                    'food' => 'Food Percent',
                    'drink' => 'Drink Percent'
                ],
                'food' => 'Feeding',
                'submit' => 'Submit'
            ]
        ],
        'withnights' => [
            'title' => 'Stat using nights',
            'second_title' => 'Create stat based on the rented rooms',
            'form' => [
                'labels' => [
                    'single' => 'Single Rooms',
                    'dual' => 'Dual Rooms',
                    'host' => 'Hosting Percent',
                    'date' => 'Date',
                    'food' => 'Food Percent',
                    'drink' => 'Drink Percent'
                ],
                'lengends' => [
                    'nights' => 'Nights',
                    'food' => 'Feeding',
                ],
                'submit' => 'Submit'
            ],
            'alert' => [
                'note' => 'Note:!',
                'desc' => 'This values can be approximate numbers'
            ]
        ],
        'settings' => [
            'change_language' => [
                'title' => 'Change Language',
                'select' => [
                    'title' => 'Language',
                    'option' => [
                        'en' => 'English',
                        'fr' => 'French',
                        'ar' => 'Arabic'
                    ]
                ]
            ],
            'change_hotel_rooms' => [
                'title' => 'Change Hotel rooms number',
                'label' => 'Hotel Rooms',
                'placeholder' => 'eg: 50'
            ],
            'change_room_prices' => [
                'title' => 'Change Rooms prices',
                'legend' => 'Hotel Rooms prices',
                'single' => 'Single Rooms',
                'dual' => 'Dual Rooms'
            ],
            'about' => [
                'title' => 'About',
                'desc' => [
                    'line_one' => 'This application is created by Amor Ali for Tunvita enterprise.',
                    'line_two' => 'The main function of this is to help hotel the owner to make a simple simulation or a make history of earned money for the month',
                    'line_three' => 'The application works is based on mthimathical functions and stats equations so the result the you obtain maybe not perfcet but it will give you and idea and a great help.'
                ]
            ],
            'report_bug' => 'Report Bug',
            'continue' => 'Continue'
        ],
        'tables' => [
            'month' => [
                'total' => 'Total',
                'income' => 'Monthly Income',
                'nights' => 'Monthly Nights',
                'host' => 'Monthly Hosting'
            ],
            'data_table' => [
                'day_n' => 'Day N°',
                'day' => 'Day',
                'days' => 'Days',
                'income' => 'Income',
                'nights' => 'Nights',
                'single' => 'Single Rooms',
                'dual' => 'Dual Rooms',
                'nutrition' => 'Nutrition',
                'drink' => 'Drink',
                'food' => 'Food',
                'download' => 'Download PDF'
            ],
            'home' => 'Main Page'
        ]
    ]
];
