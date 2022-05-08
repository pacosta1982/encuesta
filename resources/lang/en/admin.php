<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'survey' => [
        'title' => 'Surveys',

        'actions' => [
            'index' => 'Surveys',
            'create' => 'New Survey',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'settings' => 'Settings',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'survey_id' => 'Survey',
            'section_id' => 'Section',
            'content' => 'Content',
            'type' => 'Type',
            'options' => 'Options',
            'rules' => 'Rules',
            
        ],
    ],

    'answer' => [
        'title' => 'Answers',

        'actions' => [
            'index' => 'Answers',
            'create' => 'New Answer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'question_id' => 'Question',
            'entry_id' => 'Entry',
            'value' => 'Value',
            
        ],
    ],

    'type' => [
        'title' => 'Types',

        'actions' => [
            'index' => 'Types',
            'create' => 'New Type',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'entry' => [
        'title' => 'Entries',

        'actions' => [
            'index' => 'Entries',
            'create' => 'New Entry',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'survey_id' => 'Survey',
            'participant_id' => 'Participant',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];