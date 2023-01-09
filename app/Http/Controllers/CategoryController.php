<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    private $categoryRepository;

    public function __construct(CategoryRepository $_categoryRepository)
    {
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
            $data = $this->categoryRepository->getCateWithPaniator(5);
            $search_data = request()->search;
            if ($search_data) {
                $data = $this->categoryRepository->getCateWithPaniator(5, $search_data);
            }
            return view('categories.categoryManager', ['data' => $data]);
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
            return view('categories.addCategory');
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
    public function store(CategoryRequest $request)
    {
        try {

            $data = $request->all();
            $reslut = $this->categoryRepository->createCategory($data);

            if ($reslut) {
                return 'thanh cong';
            } else {
                return 'that bai';
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        // return redirect('/');
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

            $data = $this->categoryRepository->getCategoryById($id);
            return view('categories.editCategory', ['data' => $data]);
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
    public function update(CategoryRequest $request, $id)
    {
        try {
            $data = $request->all();
            $result = $this->categoryRepository->updateCategory($id, $data);
            if ($result) {
                return redirect('/');
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
            DB::beginTransaction();
            $result_dele = $this->categoryRepository->deleteCategory($id);
            $reusult_dele_cate_pro = $this->categoryRepository->deleteCategoryProduct($id);
            if ($result_dele && $reusult_dele_cate_pro > 0) {
                return redirect('/quan-ly-danh-muc');
            }
            DB::commit();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
            DB::rollBack();
        }
    }
}
