<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\product;
use App\Http\Resources\product as ProductResource;

class ProductController extends Controller
{	
	//Mostrar uno solo
    public function show ($id)
    {
    	return new ProductResource(product::find($id));
    }
    //Mostrar todo
    public function index ()
    {
    	$products = product::paginate(10);
    	return $products;
    }
    //Eliminar 
    public function destroy ($id)
    {
    	$productToDestroy = product::find($id);
    	if($productToDestroy){
    		$productToDestroy->delete();
    	}
    }

    public function store (Request $request)
    {
    	if ($request->isMethod('post')){
    		$productN = new product;
    		$productN->name = $request->input('name');
    		$productN->price = $request->input('price');

    		if($productN->save()){
    			//return $this->response->json(['status'=>true,'Hecho']);
    		} else {
    			//return $this->response->json(['status'=>false,'No hecho']);
    		}
    	}	
    }

    public function update (Request $request, $id)
    {
    	$productN = product::find($id);
    	if ($productN){
    		$productN->name = $request->input('name');
    		$productN->price = $request->input('price');

    		if ($productN->save()){

    		}else{

    		}
    	}
    }
}
