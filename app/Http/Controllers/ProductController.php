<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    private $productRepository;
    private $categoryRepository;

    public function __construct(ProductRepository $_productRepository, CategoryRepository $_categoryRepository)
    {
        $this->productRepository = $_productRepository;
        $this->categoryRepository = $_categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->productRepository->getProductWithPaginator(5);
            $search_data  = request()->search;

            if ($search_data) {
                $data = $this->productRepository->getProductWithPaginator(5, $search_data);
            }
            return view('products.productManager', ['data' => $data]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $data = $this->categoryRepository->getAll();
            return view('products.addProduct', ['data' => $data]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();
            $reslut = $this->productRepository->createProduct($data);
            $product_id = $reslut->id;

            if ($request['categories']) {
                $categories = $request['categories'];
                foreach ($categories as $category) {
                    $this->productRepository->createCategoryProduct(
                        [
                            'product_id' => $product_id,
                            'category_id' => $category
                        ]
                    );
                }
            }
            if ($request->hasfile('images')) {
                $images = $request->file('images');
                foreach ($images as $image) {

                    $product_img = $image->getClientOriginalName();
                    $this->productRepository->createImageProduct(
                        [
                            'product_id' => $product_id,
                            'product_img' => $product_img
                        ]
                    );
                }
            }
            DB::commit();
        } catch (\throwable $th) {
            throw $th;
            DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = $this->productRepository->getProductById($id);
            return view('products.editProduct', ['data' => $data]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();
            $result = $this->productRepository->updateProduct($id, $data);
            if ($result) {
                return redirect('product-manager');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $result = $this->productRepository->deleteProduct($id);
            if ($result) {
                return redirect('product-manager');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
