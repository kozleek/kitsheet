<?php

return [
    'header' => [
        'title' => 'Bug report',
        'description' => 'Form for reporting a bug in the application',
        'back_button' => 'Back to homepage',
    ],
    'form' => [
        'section_1' => [
            'label' => 'Basic information',
        ],
        'section_2' => [
            'label' => 'Technical information',
            'description' => 'The following information about your device and browser is helpful for the purpose of fixing the bug.',
        ],
        'name' => 'Fullname',
        'email' => 'Email',
        'message' => 'Message',
        'info' => 'Information',
        'save_button' => 'Report bug'
    ],
    'debug' => [
        'browser' => 'Browser:',
        'resolution' => 'Resolution:',
        'window_size' => 'Window size:',
    ],
    'thank_you' => [
        'title' => 'Thank you for your feedback',
        'description' => 'Thank you for your feedback on the KitSheet application.',
        'back_button' => 'Back to the homepage',
        'wrote' => 'wrote',
        'text' => '<p>Thank you for reporting the bug. I will try to fix it as soon as possible.</p><p>Below is a summary of your report:</p>',
        'tech_info' => 'Technical information',
    ],
];
