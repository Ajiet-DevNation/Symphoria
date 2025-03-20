<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'events' => [
        'name' => 'Events',
        'index_title' => 'Events List',
        'new_title' => 'New Event',
        'create_title' => 'Create Event',
        'edit_title' => 'Edit Event',
        'show_title' => 'Show Event',
        'inputs' => [
            'img' => 'Img',
            'name' => 'Name',
            'description' => 'Description',
            'event_type_id' => 'Event Type',
            'date' => 'Date',
            'branch' => 'Branch',
            'is_registration' => 'Is Registration',
            'location' => 'Location',
        ],
    ],

    'event_types' => [
        'name' => 'Event Types',
        'index_title' => 'EventTypes List',
        'new_title' => 'New Event type',
        'create_title' => 'Create EventType',
        'edit_title' => 'Edit EventType',
        'show_title' => 'Show EventType',
        'inputs' => [
            'type' => 'Type',
        ],
    ],

    'event_event_rules' => [
        'name' => 'Event Event Rules',
        'index_title' => 'EventRules List',
        'new_title' => 'New Event rule',
        'create_title' => 'Create EventRule',
        'edit_title' => 'Edit EventRule',
        'show_title' => 'Show EventRule',
        'inputs' => [
            'description' => 'Description',
        ],
    ],

    'sponsers' => [
        'name' => 'Sponsers',
        'index_title' => 'Sponsers List',
        'new_title' => 'New Sponser',
        'create_title' => 'Create Sponser',
        'edit_title' => 'Edit Sponser',
        'show_title' => 'Show Sponser',
        'inputs' => [
            'img' => 'Img',
            'site' => 'Site',
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'pass_type' => 'Pass Type',
            'usn' => 'Usn',
            'uid' => 'UID',
            'transaction_id' => 'Transaction Id',
            'college_name' => 'College Name',
            'payment_screenshot' => 'Payment Screenshot',
            'id_card' => 'Id Card',
            'is_paid' => 'Is Paid',
        ],
    ],

    'event_event_registrations' => [
        'name' => 'Event Event Registrations',
        'index_title' => 'EventRegistrations List',
        'new_title' => 'New Event registration',
        'create_title' => 'Create EventRegistration',
        'edit_title' => 'Edit EventRegistration',
        'show_title' => 'Show EventRegistration',
        'inputs' => [
            'user_id' => 'User',
        ],
    ],

    'event_registrations' => [
        'name' => 'Event Registrations',
        'index_title' => 'EventRegistrations List',
        'new_title' => 'New Event registration',
        'create_title' => 'Create EventRegistration',
        'edit_title' => 'Edit EventRegistration',
        'show_title' => 'Show EventRegistration',
        'inputs' => [
            'event_id' => 'Event',
            'user_id' => 'User',
        ],
    ],

    'user_event_registrations' => [
        'name' => 'User Event Registrations',
        'index_title' => 'EventRegistrations List',
        'new_title' => 'New Event registration',
        'create_title' => 'Create EventRegistration',
        'edit_title' => 'Edit EventRegistration',
        'show_title' => 'Show EventRegistration',
        'inputs' => [
            'event_id' => 'Event',
        ],
    ],

    'event_event_organizers' => [
        'name' => 'Event Event Organizers',
        'index_title' => 'EventOrganizers List',
        'new_title' => 'New Event organizer',
        'create_title' => 'Create EventOrganizer',
        'edit_title' => 'Edit EventOrganizer',
        'show_title' => 'Show EventOrganizer',
        'inputs' => [
            'email' => 'Email',
            'name' => 'Name',
            'position' => 'Position',
            'phone' => 'Phone',
            'img' => 'Img',
        ],
    ],

    'main_organizers' => [
        'name' => 'Main Organizers',
        'index_title' => 'MainOrganizers List',
        'new_title' => 'New Main organizer',
        'create_title' => 'Create MainOrganizer',
        'edit_title' => 'Edit MainOrganizer',
        'show_title' => 'Show MainOrganizer',
        'inputs' => [
            'img' => 'Img',
            'name' => 'Name',
            'position' => 'Position',
            'phone' => 'Phone',
            'email' => 'Email',
        ],
    ],

    'event_organizers' => [
        'name' => 'Event Organizers',
        'index_title' => 'EventOrganizers List',
        'new_title' => 'New Event organizer',
        'create_title' => 'Create EventOrganizer',
        'edit_title' => 'Edit EventOrganizer',
        'show_title' => 'Show EventOrganizer',
        'inputs' => [
            'img' => 'Img',
            'phone' => 'Phone',
            'email' => 'Email',
            'name' => 'Name',
            'position' => 'Position',
            'event_id' => 'Event',
        ],
    ],

    'event_type_events' => [
        'name' => 'EventType Events',
        'index_title' => 'Events List',
        'new_title' => 'New Event',
        'create_title' => 'Create Event',
        'edit_title' => 'Edit Event',
        'show_title' => 'Show Event',
        'inputs' => [
            'img' => 'Img',
            'name' => 'Name',
            'description' => 'Description',
            'branch' => 'Branch',
            'date' => 'Date',
            'is_registration' => 'Is Registration',
            'location' => 'Location',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
