<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use Myth\Auth\Authentication\Passwords\ValidationRules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        ValidationRules::class // tambahkan ini
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    // public $loginRules = [
    //     'attempt_login' => [
    //         'field' => 'email',
    //         'label' => 'Email',
    //         'rules' => 'required|valid_email',
    //         'errors' => [
    //             'attempt_login' => 'Anda telah melebihi batas percobaan login. Silakan coba lagi dalam beberapa menit.',
    //         ],
    //     ],
    // ];


    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}