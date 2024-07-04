<?php

return [
    'kit' => [
        'destroy' => [
            'title' => 'Delete this set of worksheets?',
            'text' => '<p>All existing worksheets and their related examples will be deleted.</p>',
            'submit' => 'Delete set',
        ],
        'update' => [
            'title' => 'Save changes and create new worksheets?',
            'text' => '<p>All existing worksheets and their related examples will be deleted and new worksheets with new examples will be created according to the assignment.</p><p>New URLs will be generated for the worksheets - the previous URLs will no longer be functional!</p>',
            'submit' => 'Update set',
        ],
    ],
    'sheet' => [
        'check' => [
            'title' => 'Have you checked all the results?',
            'text' => '<p>The worksheet will be sent to the teacher for evaluation. After submission, it will no longer be possible to edit it.</p>',
            'submit' => 'Submit for review',
        ],
    ]
];
