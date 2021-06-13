<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";

    protected $allowedFields = ["name", "email", "password", "emailVerificationCode", "isVerified"];

    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $validationRules =  [
        "name" => [
            "rules" => 'required|min_length[10]|max_length[15]',
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
            "rules" => 'required',
            "errors" => [
                "required" => "Your Password is required...",
            ],
        ],
        "emailVerificationCode" => [
            "rules" => 'required',
            "errors" => [
                "required" => "Error Happened, Please Contact the Support...",
            ],
        ],
    ];
}
