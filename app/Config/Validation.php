<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

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

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $signup = [
        "name" => [
            "rules" => 'required|min_length[3]|max_length[15]',
            "errors" => [
                "required" => "Your Full Name is required...",
                "min_length" => "Please Enter A Valid Name...",
                "max_length" => "Your Name Cannot Be Longer Than 15 Character..."
            ],
        ],
        "email" => [
            "rules" => 'required|valid_email|is_unique[users.email]',
            "errors" => [
                "required" => "Your Email is required...",
                "valid_email" => "Please Enter A Valid Email...",
                "is_unique" => "An Account Connected to This Email Is Already Registered..."
            ],
        ],
        "password" => [
            "rules" => 'required|min_length[5]|max_length[20]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters..."
            ],
        ],
        "cpassword" => [
            "rules" => 'required|min_length[5]|max_length[20]|matches[password]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters...",
                "matches" => "Your Confirmation Password Doesn't Match The Password..."
            ],
        ],
    ];
    public $signin = [
        "email" => [
            "rules" => 'required|valid_email|is_not_unique[users.email]',
            "errors" => [
                "required" => "Your Email is required...",
                "valid_email" => "Please Enter A Valid Email...",
                "is_not_unique" => "The Given Email Is Not Registered..."
            ],
        ],
        "password" => [
            "rules" => 'required|min_length[5]|max_length[20]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters..."
            ],
        ],
    ];
    public $findAccount = [
        "email" => [
            "rules" => 'required|valid_email|is_not_unique[users.email]',
            "errors" => [
                "required" => "Your Email is required...",
                "valid_email" => "Please Enter A Valid Email...",
                "is_not_unique" => "The Given Email Is Not Registered..."
            ],
        ],
    ];
    public $resetpass = [
        "newpassword" => [
            "rules" => 'required|min_length[5]|max_length[20]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters..."
            ],
        ],
        "cnewpassword" => [
            "rules" => 'required|min_length[5]|max_length[20]|matches[newpassword]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters...",
                "matches" => "Your Confirmation Password Doesn't Match The Password..."
            ],
        ]
    ];
    public $editProfile = [
        "name" => [
            "rules" => 'required|min_length[3]|max_length[15]',
            "errors" => [
                "required" => "Your Full Name is required...",
                "min_length" => "Please Enter A Valid Name...",
                "max_length" => "Your Name Cannot Be Longer Than 15 Character..."
            ],
        ],
        "email" => [
            "rules" => 'required|valid_email|is_unique[users.email,email,{email}]',
            "errors" => [
                "required" => "Your Email is required...",
                "valid_email" => "Please Enter A Valid Email...",
                "is_unique" => "An Account Connected to This Email Is Already Registered..."
            ],
        ],
        "password" => [
            "rules" => 'required|min_length[5]|max_length[20]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters..."
            ],
        ],
    ];
    public $savePassword = [
        "password" => [
            "rules" => 'required|min_length[5]|max_length[20]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters..."
            ],
        ],
        "newpassword" => [
            "rules" => 'required|min_length[5]|max_length[20]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters..."
            ],
        ],
        "cnewpassword" => [
            "rules" => 'required|min_length[5]|max_length[20]|matches[newpassword]',
            "errors" => [
                "required" => "Your Password is required...",
                "min_length" => "Your Password Cannot Be Shorter Than 5 Characters...",
                "max_length" => "Your Password Cannot Be Longer Than 20 Characters...",
                "matches" => "Your Confirmation Password Doesn't Match The Password..."
            ],
        ]
    ];
}
