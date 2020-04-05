<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

use App\Mail\sendMail;

use App\Product;

class productController extends Controller
{
    // create form products store

    public function create(){

       return view('forms\form_products');

    }
    public function buy_products(){

        return view('show_pages\name_of_products');

    }

    public function destroy_session(){

        session()->forget('cart');

        return redirect(route('show_all_products'));

    }

    public function session ($id){

        if(empty(session('cart'))){

            session()->push('cart' , $id);

        }

        else{

            session()->push('cart' , $id);

        }

        return redirect(route('buy_products'));



    }

    public function show(){

        $products = Product::all();

        return view('show_pages.show_all_products' , ['products' => $products]);


    }

    public function store(Request $request){

        $data = $request->validate([

            'name' => 'required|string|max:100' ,
            'price' => 'required|integer' ,
            'image' => 'required'

        ]);

        $request->name;
        $request->price;
        $image = $request->image;

        $image_extension = $image->getclientoriginalextension();

        $image_name = uniqid().".".$image_extension;


        $image_old_name = $image->getPathName();


        move_uploaded_file($image_old_name , public_path()."/uploads"."/".$image_name);

        Product::create([

            'name' => $request->name ,
            'price' => $request->price ,
            'image' => $image_name


        ]);

        session()->put('cart' , []);

        return redirect(route('show_all_products'));



    }

    public function mail(Request $request){


        $name = $request->name;

        $email = $request->email;

        $data = [

            'name' => $name ,
            'email' => $email


        ];


        Mail::to($email)->send(new sendMail($data));

        session()->forget('cart');

        session()->flash('success_message' , 'mail send successfully to'." ".$email);

        return back();


    }

    public function change_locale(Request $request , $type_locale){

        $request->session()->put('lang' , $type_locale);

        return back();


    }

}


