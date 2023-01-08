<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\CategoryRepository;

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
    public function store(Request $request)
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
    public function update(Request $request, $id)
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
            $result = $this->categoryRepository->deleteCategory($id);
            if ($result) {
                return redirect('/quan-ly-danh-muc');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
