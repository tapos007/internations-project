<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\RegistrationService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRegistrationController extends Controller
{

    use ApiResponse;
    /**
     * @var RegistrationService
     */
    private $service;


    /**
     * UserRegistrationController constructor.
     */
    public function __construct(RegistrationService $service)
    {
        $this->service = $service;
    }

    public function create(Request $request)
    {

        $user = $this->service->register($request);
        return $this->showOne($user,201);
    }


}
