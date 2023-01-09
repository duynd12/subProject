<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $userRepository;
    private $orderRepository;
    private $productRepository;

    public function __construct(UserRepository $_userRepository, OrderRepository $_orderRepository, ProductRepository $_productRepository)
    {
        $this->userRepository = $_userRepository;
        $this->orderRepository = $_orderRepository;
        $this->productRepository = $_productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->userRepository->getUserWithPaginator(5);
            $search_data = request()->search;
            if ($search_data) {
                $data = $this->userRepository->getUserWithPaginator(5, $search_data);
            }
            return view('users.userManager', ['data' => $data]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

            $result = $this->userRepository->deleteUser($id);
            if ($result) {
                return redirect('quan-ly-user');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function unLockUser($id)
    {
        try {
            $data =  User::withTrashed()->where('id', $id)->restore();
            if ($data) {
                return redirect()->route('user.index');
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    public function getCountUser()
    {
        try {
            $user_count = $this->userRepository->getAll()->count();
            $order = $this->orderRepository->getTotalPrice();
            $total_bills = $this->orderRepository->getAll()->count();
            $total_product = $this->productRepository->getAll()->count();

            $total_price = 0;
            foreach ($order as $price) {
                $total_price += $price;
            }

            return view('dashboard.home', [
                'user' => $user_count,
                'sum' => $total_price,
                'bills' => $total_bills,
                'total_product' => $total_product,
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getUserById($user_id)
    {
        // $user = new User();
        $user = User::find($user_id)->profile;
        return view('users.userDetail', ['data' => $user]);
        // dd(User::find($user_id)->profile);
    }
}
