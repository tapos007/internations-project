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

    public function addgroupuser(Request $request,$id)
    {
        $this->service->addGroupUser($request,$id);
        return $this->showMessage("user added group successfully");
    }

    public function deletegroupuser(Request $request,$id)
    {
        $this->service->deleteGroupUser($request,$id);
        return $this->showMessage("user delete from group successfully");
    }

    public function addgroup(Request $request)
    {
        $this->service->addgroup($request);
        return $this->showMessage("group insert successfully");
    }

    public function deletegroup(Request $request)
    {
        $this->service->deletegroup($request);
        return $this->showMessage("group delete successfully");
    }


}
