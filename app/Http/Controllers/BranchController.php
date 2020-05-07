<?php

namespace App\Http\Controllers;
use DB;
use App\Branch;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $branches = DB::table('branches')->where('is_deleted', 0)->orderBy('branch_name', 'asc')->simplePaginate(10);

        return view('/account/branches', ['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'branch' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'manager-name' => ['required', 'string', 'min:8'],
            'manager-mobile' => ['required', 'bigInteger', 'min:8', 'unique:branches'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Branch
     */

    protected function create(array $data)
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
        // dd($request->input('branch'));
        //
        $createBranch = Branch::create([
            'branch_name' => $request->input('branch'),
            'location' => $request->input('location'),
            'manager_name' => $request->input('manager-name'),
            'manager_mobile' => $request->input('manager-mobile'),
            'is_deleted' => 0,
        ]);

        if($createBranch = true){
            notify()->success('New branch created successfully.'); 
            // emotify('success', 'New branch created successfully.');         
            return back();
        }else{
            notify()->error('Error creating branch. Please try again later'); 
            // emotify('error', 'Error creating branch. Please try again later');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
        $branches = Branch::where('is_deleted', 0)
                            ->orderBy('branch_name', 'asc')
                            ->get();
        return $branches->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
        $rowid = $request->input('rowid');
        $branchName = $request->input('branch');
        $location = $request->input('location');
        $manager_name = $request->input('manager-name');
        $manager_mobile = $request->input('manager-mobile');

        $branch = Branch::find($rowid);
        $branch->branch_name = $branchName;
        $branch->location = $location;
        $branch->manager_name = $manager_name;
        $branch->manager_mobile = $manager_mobile;
        

        $branch->save();

        emotify('success', 'Branch Information Updated Successfully.');         
        return back();


        // dd($branch_name);
    }

    public function delete(Request $request, Branch $branch)
    {
        //
        $rowid = $request->input('delid');
        $branch = Branch::find($rowid);
        $branch->is_deleted = 1;

        $branch->save();

        emotify('success', 'Branch Successfully Deleted.');         
        return back();

        // dd($rowid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
