<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Response\Success;
use App\Response\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    protected $model;
    protected $request;

    public function __construct
    (
        Request $request,
        Category $model
    )
    {
        $this->request = $request;
        $this->model = $model;
    }

    public function index()
    {
        $list = $this->model->orderBy("id", "DESC")->with("products")->paginate(10);
        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Categorias mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

    public function show($id)
    {
        $this->request["id"] = $id;
        $validation = Validator::make($this->request->all(), ["id"=> ["required"],]);
        if($validation->fails())
        {
            return Error::generic(
                $validation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $this->request["routeType"]
            );
        }
        $item = $this->model->where("id", $id)->with("products")->get()->first();
        if($item)
        {
            return Success::generic(
                $item,
                messageSuccess(50000, "Sucesso ao visualizar categoria!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao visualizar categoria!"),
            $this->request["routeType"]
        );
    }

    public function create()
    {
        $create = $this->model->create($this->request->json()->all());
        if($create)
        {
            $return = $this->model->where("id", $create->id)->with("products")->get()->first();
            return Success::generic(
                $return,
                messageSuccess(50000, "Sucesso ao criar categoria!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao criar categoria!"),
            $this->request["routeType"]
        );
    }

    public function edit($id)
    {
        $item = $this->model->find($id);
        $edit = $item->update($this->request->json()->all());
        if($edit)
        {
            $return = $this->model->where("id", $item->id)->with("products")->get()->first();
            return Success::generic(
                $return,
                messageSuccess(50000, "Sucesso ao editar categoria!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao editar categoria!"),
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
                messageSuccess(50000, "Sucesso ao deletar categoria!"),
                $this->request["routeType"]
            );
        }
        return Error::generic(
            null,
            messageErrors(2000, "Erro ao deletar categoria!"),
            $this->request["routeType"]
        );
    }

}
