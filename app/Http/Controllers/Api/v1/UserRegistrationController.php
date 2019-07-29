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

    public function delete($id)
    {
        $this->service->delete($id);
        return $this->showMessage("user deleted successfully");
    }

    public function addgroup(Request $request,$id)
    {
        $this->service->addGroup($request,$id);
        return $this->showMessage("user added group successfully");
    }

    public function deletegroup(Request $request,$id)
    {
        $this->service->deleteGroup($request,$id);
        return $this->showMessage("user delete from group successfully");
    }


}
