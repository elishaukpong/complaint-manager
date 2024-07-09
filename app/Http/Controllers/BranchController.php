<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchesStoreRequest;
use App\Models\Branch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse|View
    {
        if(request()->ajax()){
            $data = Branch::with('manager')
                ->withCount(['customers','complaints'])
                ->latest()
                ->get();

            return DataTables::of($data)
                ->addColumn('location', function($row) {
                    return $row->full_address;
                })
                ->addColumn('manager', function($row) {
                    return $row->manager->first_name ?? 'N/A';
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('branches.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchesStoreRequest $request): RedirectResponse
    {
        Branch::create([
            ...$request->validated(),
            'organization_id' => auth()->user()->branch->organization->id
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
