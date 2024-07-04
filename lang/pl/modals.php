<?php

return [
    'kit' => [
        'destroy' => [
            'title' => 'Czy chcesz usunąć ten zestaw arkuszy pracy?',
            'text' => '<p>Wszystkie istniejące arkusze pracy i ich powiązane przykłady zostaną usunięte.</p>',
            'submit' => 'Usuń zestaw',
        ],
        'update' => [
            'title' => 'Czy zapisać zmiany i utworzyć nowe arkusze pracy?',
            'text' => '<p>Wszystkie istniejące arkusze pracy i ich powiązane przykłady zostaną usunięte, a zostaną utworzone nowe arkusze pracy z nowymi przykładami zgodnie z zadaniem.</p><p>Dla arkuszy pracy zostaną utworzone nowe adresy URL - stare adresy URL przestaną być funkcjonalne!</p>',
            'submit' => 'Zaktualizuj zestaw',
        ],
    ],
    'sheet' => [
        'check' => [
            'title' => 'Czy sprawdziłeś wszystkie wyniki?',
            'text' => '<p>Arkusze pracy zostaną wysłane na ocenę do nauczyciela. Po wysłaniu nie będzie możliwości ich edycji.</p>',
            'submit' => 'Wyślij do oceny',
        ],
    ]
];
