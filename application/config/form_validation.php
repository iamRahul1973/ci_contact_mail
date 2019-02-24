<?php
/**
 * Created by PhpStorm.
 * User: iamRahul1995
 * Author URL : https://iamrahul1973.github.io/
 * Date: 09-02-2019
 * Time: 14:05
 */

defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'welcome/contact_mail' => [
        [
            'field' => 'first_name',
            'label' => 'First Name',
            'rules' => 'trim|required|alpha|min_length[3]'
        ],
        [
            'field' => 'last_name',
            'label' => 'Last Name',
            'rules' => 'trim|regex_match[/^[A-Za-z _.-]+$/]' // Allows alphabets and whitespaces only.
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ],
        [
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'trim|required|integer|min_length[10]|max_length[12]'
        ],
        [
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'trim|required|min_length[10]|max_length[500]'
        ]
    ]
];