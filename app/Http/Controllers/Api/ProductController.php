<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Response\Success;
use Illuminate\Http\Request;
use App\Models\Product;

/**
 * Class UsersController
 * @package App\Http\Controllers\Api
 */
class ProductController extends Controller
{

    protected $model;
    protected $request;

    public function __construct
    (
        Request $request,
        Product $model
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
        $list = $this->model->paginate(20);
        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Produtos mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

}
