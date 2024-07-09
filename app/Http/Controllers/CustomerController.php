<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('customers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data['branches'] = Branch::select(['id','name'])
            ->where('organization_id',auth()->user()->branch->organization_id)
            ->get();

        return view('customers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $data = $request->validated();
        $profilePhoto = $data['profile_photo'];
        $autoGeneratedPassword = Str::random(8);

        unset($data['profile_photo']);

        $user = User::create([
            ...$data,
            'password' => Hash::make($autoGeneratedPassword)
        ]);

        $user->assignRole(data_get(config('permissions'), "customer.name"));

        return redirect()->route('customers.index')->with('success','Created Customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $customer)
    {
        //
    }
}
