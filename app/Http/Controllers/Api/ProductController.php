<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Response\Success;
use App\Response\Error;
use App\Services\Products\CreateOrUpdateProductService;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

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

    public function index()
    {
        $list = $this->model->orderBy("id", "DESC")
            ->with("sizes")
            ->with("colors")
            ->with("categories")
            ->with("images")
            ->paginate(20);
        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Produtos mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

    public function search($search)
    {
        $list = $this->model
            ->where("name", "like", "%".$search."%")
            ->orderBy("id", "DESC")
            ->with("sizes")
            ->with("colors")
            ->with("categories")
            ->with("images")
            ->paginate(20);

        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Produtos mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

    public function show($id)
    {
        $this->request["id"] = $id;
        $validation = Validator::make($this->request->all(), ["id"=>["required"],]);
        if($validation->fails())
        {
            return Error::generic(
                $validation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $this->request["routeType"]
            );
        }
        $item = $this->model->where("id", $id)->with("sizes")
            ->with("colors")->with("categories")->with("images")->get()->first();
        if($item)
        {
            return Success::generic(
                $item,
                messageSuccess(50000, "Sucesso ao visualizar produto!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao visualizar produto!"),
            $this->request["routeType"]
        );
    }

    public function create()
    {
        $create = CreateOrUpdateProductService::execute($this->request);
        if($create)
        {
            $return = $this->model->where("id", $create->id)->with("sizes")
                ->with("colors")->with("categories")->with("images")->get()->first();
            return Success::generic(
                $return,
                messageSuccess(50000, "Sucesso ao criar produto!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao criar produto!"),
            $this->request["routeType"]
        );
    }

    public function edit($id)
    {
        $edit = CreateOrUpdateProductService::execute($this->request, $id);
        if($edit)
        {
            $return = $this->model->where("id", $edit->id)->with("sizes")
                ->with("colors")->with("categories")->with("images")->get()->first();
            return Success::generic(
                $return,
                messageSuccess(50000, "Sucesso ao editar produto!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao editar produto!"),
            $this->request["routeType"]
        );
    }

    public function delete($id)
    {
        $this->request["id"] = $id;
        $validation = Validator::make($this->request->all(), ["id"=>["required"],]);
        if($validation->fails())
        {
            return Error::generic(
                $validation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $this->request["routeType"]
            );
        }
        $delete = $this->model->destroy($id);
        if($delete)
        {
            return Success::generic(
                $delete,
                messageSuccess(50000, "Sucesso ao deletar produto!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao deletar produto!"),
            $this->request["routeType"]
        );
    }

}
