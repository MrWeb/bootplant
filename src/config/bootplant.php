<?php

return [
    'app_name'            => "G-Bubble KHS",
    'app_copyrights'      => 'G-Bubble',
    'app_copyrights_txt'  => 'Futurelabs',
    'app_copyrights_link' => 'https://www.futurelabs.it/',
    'app_color'           => 'info', //Possiblità: danger, info, java, royal-blue, salmon, secondary, success, warning
    'app_theme_version'   => '1.3.0',
    'app_menu_position'   => 'top', //left, top

    'currency'            => "CHF", //Da spostare nel DB "fields" table
    'currency_symbol'     => "CHF", //Da spostare nel DB "fields" table
    'IVA'                 => .08,   //Da spostare nel DB "fields" table

    'decimali_valuta'     => [2, "'"],
    'notificationstime'   => 1,  //minuti
    'scadenza_add_note'   => 48, //ore da quando non è più possibile inserire i dettagli chiamata/mail
    'week_end'            => "Friday",
    'week_end_hour'       => "02:00pm",

    'license_url'         => "https://licenze.futurelabs.it/", //Endpoint per la verifica della licenza annuale

    'matching_immobili'   => [
        'mq_max'                 => 500,
        'prezzo_min'             => 10000,
        'prezzo_max'             => 2500000,
        'prezzo_min_affitto'     => 0,
        'prezzo_max_affitto'     => 10000,
        'n_locali_max'           => 12,
        'superficie_terreno_max' => 5000,
        'anno_ricerca_minimo'    => 1990,
        'range_n_locali'         => 1, //Selezionando match 3.5 con il range a 1 trova i 2.5 e 4.5
    ],

    'GOOGLE_API_MAPS'     => "YOUR-API-KEY",
    'portali_attivi'      => true,
];
