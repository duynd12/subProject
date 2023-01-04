<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\OrderRepository;

class UserController extends Controller
{
    private $userRepository;
    private $orderRepository;

    public function __construct(UserRepository $_userRepository, OrderRepository $_orderRepository)
    {
        $this->userRepository = $_userRepository;
        $this->orderRepository = $_orderRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->userRepository->getAll();
        return view('users.userManager', ['data' => $data]);
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
        $result = $this->userRepository->deleteUser($id);
        if ($result) {
            return redirect('quan-ly-user');
        }
    }

    public function getCountUser()
    {
        $user = $this->userRepository->getCountUser();
        $order = $this->orderRepository->getTotalPrice();

        $sum = 0;
        foreach ($order as $price) {
            $sum += $price;
        }

        return view('dashboard.home', [
            'user' => $user,
            'sum' => $sum
        ]);
    }
}
