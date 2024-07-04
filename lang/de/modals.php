<?php

return [
    'kit' => [
        'destroy' => [
            'title' => 'Dieses Set von Arbeitsblättern löschen?',
            'text' => '<p>Alle vorhandenen Arbeitsblätter und ihre zugehörigen Beispiele werden gelöscht.</p>',
            'submit' => 'Set löschen',
        ],
        'update' => [
            'title' => 'Änderungen speichern und neue Arbeitsblätter erstellen?',
            'text' => '<p>Alle vorhandenen Arbeitsblätter und ihre zugehörigen Beispiele werden gelöscht und neue Arbeitsblätter mit neuen Beispielen gemäß der Vorgabe erstellt.</p><p>Für die Arbeitsblätter werden neue URLs generiert - die vorherigen URLs sind nicht mehr funktional!</p>',
            'submit' => 'Set aktualisieren',
        ],
    ],
    'sheet' => [
        'check' => [
            'title' => 'Hast du alle Ergebnisse überprüft?',
            'text' => '<p>Das Arbeitsblatt wird dem Lehrer zur Bewertung gesendet. Nach dem Absenden ist eine Bearbeitung nicht mehr möglich.</p>',
            'submit' => 'Zur Überprüfung einreichen',
        ],
    ]
];
