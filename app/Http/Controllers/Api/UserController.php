<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Response\Success;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * Class UsersController
 * @package App\Http\Controllers\Api
 */
class UserController extends Controller
{

    protected $model;
    protected $request;

    public function __construct
    (
        Request $request,
        User $model
    )
    {
        $this->request = $request;
        $this->model = $model;
    }

    /**
     * @return bool|\Illuminate\Http\RedirectResponse|void
     */
    public function index()
    {
        $list = $this->model->paginate(10);
        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Usuários mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

}
