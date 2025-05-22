<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Company;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/products', function (Request $request){
//     $product = new Product();
//     $product->name = $request->input('name');
//     $product->price = $request->input('price');
//     $product->description = $request->input('description');
//     $product->category_id = $request->input('category_id');
//     $product->company_id = $request->input('company_id');
//     $product->save();
//     return response()->json($product);
// });

// Route::get('/products', function (Request $request){
//     $products = Product::all();
//     return response()->json($products);
// });

// Route::get('/products/{id}', function ($id){
//     $product = Product::find($id);
//     return response()->json($product);
// });


// Route::patch('/products/{id}', function (Request $request ,$id){
//     $product = Product::find($id);

//     if($request->input('name')!== null){
//         $product->name = $request->input('name');
//     }

//     if($request->input('price')!== null){
//         $product->price = $request->input('price');
//     }

//     if($request->input('description')!== null){
//         $product->description = $request->input('description');
//     }

//     $product->save();
//     return response()->json($product);
// });

// Route::delete('/products/{id}', function ($id){
//     $product = Product::find($id);

//     $product->delete();

//     return response()->json($product);
// });

// Route::get('/products/category/{id}', function($id) {
//     $product = Product::find($id);
//     $category = $product->category;

//     return response()->json($category);
// });

// Route::get('/products/category', function() {
//     // dd('teste'); tipo um print para testar a rota apenas
//     $product = Product::with('category')->get();

//     return response()->json($product);
// });

Route::controller(ProductController::class) ->group(function () {
    Route::get('/products', 'get');
    Route::get('/products/category', 'getWithCategory');
    Route::get('/products/{id}', 'details');
    Route::post('/products', 'store');
    Route::patch('/products/{id}', 'update');
    Route::delete('/products/{id}', 'delete');
    Route::get('/products/category/{id}', 'findCategory');
});

// Route::post('/categories', function (Request $request){
//     $category = new Category();
//     $category->name = $request->input('name');
//     $category->description = $request->input('description');

//     $category->save();
//     return response()->json($category);
// });

// Route::get('/categories', function (Request $request){
//     $categories = Category::all();
//     return response()->json($categories);
// });

// // Crie uma rota para retornar todos as categorias com seus produtos
// Route::get('/categories/products/', function() {
//     $categories = Category::with('products')->get();
//     return response()->json($categories);
// });

// // Crie uma rota que retorne apenas os produtos de uma categoria específica
// Route::get('/categories/products/{id}', function($id) {
//     $category = Category::find($id);

//     $products = $category->products;

//     return response()->json($products);
// });

// Route::get('/categories/{id}', function ($id){
//     $category = Category::find($id);
//     return response()->json($category);
// });

// Route::patch('/categories/{id}', function (Request $request, $id){
//     $category = Category::find($id);

//     if($request->input('name')!== null){
//         $category->name = $request->input('name');
//     }

//     if($request->input('description')!== null){
//         $category->description = $request->input('description');
//     }

//     $category->save();
//     return response()->json($category);
// });

// Route::delete('/categories/{id}', function ($id){
//     $category = Category::find($id);
//     $category->products()->delete(); //cascata
//     $category->delete();

//     return response()->json($category);
// });

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'get');
    Route::get('/categories/products', 'getWithProducts');
    Route::get('/categories/{id}', 'details');
    Route::post('/categories', 'store');
    Route::patch('/categories/{id}', 'update');
    Route::delete('/categories/{id}', 'delete');
    Route::get('/categories/products/{id}', 'findProducts');
});

// Route::post('/companies', function(Request $request){
//     $company = new Company;

//     $company->social_reason = $request->input('social_reason');
//     $company->fantasy_name = $request->input('fantasy_name');
//     $company->cnpj = $request->input('cnpj');

//     $company->save();

//     return response()->json($company);
// });

// Route::get('/companies', function (){
//     $companies = Companies::all();
//     return response()->json($companies);
// });

// Route::patch('/companies/{id}', function (Request $request, $id){
//     $company = Company::find($id);
    
//     if($request->input('fantasy_name')!== null){
//         $category->fantasy_name = $request->input('fantasy_name');
//     }
//     if($request->input('social_reason')!== null){
//         $category->social_reason = $request->input('social_reason');
//     }
//     if($request->input('cnpj')!== null){
//         $category->cnpj = $request->input('cnpj');
//     }

//     $company->save();

//     return response()->json($company);
// });

// Route::get('/companies/{id}', function ($id){
//     $company = Company::find($id);

//     return response()->json($company);
// });

// Route::delete('/companies/{id}', function ($id){
//     $company = Company::find($id);
//     $company->products()->update(["company_id"=>null]); #atualiza essa coluna
//     $company->delete();
//     return response()->json($company);
// });

Route::controller(CompanyController::class) ->group(function () {
    Route::get('/companies', 'get');
    Route::get('/companies/products', 'getWithProducts');
    Route::get('/companies/{id}', 'details');
    Route::post('/companies', 'store');
    Route::patch('/companies/{id}', 'update');
    Route::delete('/companies/{id}', 'delete');
    Route::get('/companies/products/{id}', 'findProducts');
});





