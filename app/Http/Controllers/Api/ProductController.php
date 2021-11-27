<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Response\Success;
use App\Response\Error;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Validator;

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

    public function index()
    {
        $list = $this->model->orderBy("id", "DESC")->with("images")->paginate(10);
        return Success::generic(
            $list,
            messageSuccess(50000, "Lista de Produtos mostrada com sucesso!"),
            $this->request["routeType"]
        );
    }

    public function show($id)
    {
        $this->request["id"] = $id;

        $valitation = Validator::make($this->request->all(), [
            "id"        => ["required"],
        ]);

        if($valitation->fails())
        {
            return Error::generic(
                $valitation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $this->request["routeType"]
            );
        }

        $item = $this->model->where("id", $id)
            ->with("images")
            ->get()
            ->first();

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
        $valitation = Validator::make($this->request->json()->all(), [
            "name"        => ["required"],
            "description" => ["required"],
            "price"       => ["required"],
            "imgs"        => ["required"],
            "imgs.*.url"  => ["required"],
            "imgs.*.main" => ["required"],
        ]);

        if($valitation->fails())
        {
            return Error::generic(
                $valitation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $this->request["routeType"]
            );
        }

        $create = $this->model->create($this->request->all());

        if($create)
        {
            if(isset($this->request->json()->all()["imgs"]) && count($this->request->json()->all()["imgs"]) > 0)
            {
                foreach($this->request->json()->all()["imgs"] as $img)
                {
                    ProductImage::create([
                        "url"        => $img["url"],
                        "main"       => $img["main"],
                        "product_id" => $create->id,
                    ]);
                }
            }

            $return = $this->model->where("id", $create->id)
            ->with("images")
            ->get()
            ->first();

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
        $valitation = Validator::make($this->request->json()->all(), [
            "id"          => ["required"],
            "name"        => ["required"],
            "description" => ["required"],
            "price"       => ["required"],
        ]);

        if($valitation->fails())
        {
            return Error::generic(
                $valitation->errors(),
                messageErrors(2000, "Validação de campo não passou!!"),
                $this->request["routeType"]
            );
        }

        $item = $this->model->find($id);
        $edit = $item->update($this->request->all());

        if($edit)
        {
            if(isset($this->request->json()->all()["imgs"]) && count($this->request->json()->all()["imgs"]) > 0)
            {
                $item->images()->delete();
                foreach($this->request->json()->all()["imgs"] as $img)
                {
                    ProductImage::updateOrCreate([
                        "url"        => $img["url"],
                        "main"       => $img["main"],
                        "product_id" => $item->id,
                    ],
                    [
                        "url"        => $img["url"],
                        "main"       => $img["main"],
                        "product_id" => $item->id,
                    ]);
                }
            }

            $return = $this->model->where("id", $item->id)
            ->with("images")
            ->get()
            ->first();

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

        $valitation = Validator::make($this->request->all(), [
            "id"        => ["required"],
        ]);

        if($valitation->fails())
        {
            return Error::generic(
                $valitation->errors(),
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
