<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublishingCompany;
use App\Http\Requests\StorePublishingCompanyUpdate;
use App\Models\Author;
use App\Models\Category;
use App\Models\PublishingCompany;

class PublishingCompanyController extends Controller
{
    function index()
    {
        $q = request()->query('q');
        $list = PublishingCompany::where('name', 'like', "%$q%")
            ->orderByDesc('id')->paginate(8);
        // return $list;
        return view('admin.publishing-companies', [
            'list' => $list
        ]);
    }
    function create()
    {
        return view('admin.form-publishing-company');
    }

    function store(StorePublishingCompany $request)
    {
        $data = $request->all();
        $request->except('_token');
        $data['logo'] = $request->file('logo')->store('images', 'public');
        PublishingCompany::create($data);
        return redirect()->route('admin.publishing_companies')->with('success', 'Publishing company added successfully');
    }

    function edit($id)
    {
        $author = PublishingCompany::find($id);
        return view('admin.form-publishing-company', [
            'data' => $author,
        ]);
    }

    function update(StorePublishingCompanyUpdate $request, $id)
    {
        $author = PublishingCompany::find($id);
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('images', 'public');
        }
        $author->update($data);
        return redirect()->route('admin.publishing_companies')->with('success', 'Publishing company updated successfully');
    }

    function destroy($id)
    {
        try {
            PublishingCompany::destroy($id);
            return redirect()->route('admin.publishing_companies')->with('success', 'Publishing company deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('admin.publishing_companies')->with('error', 'Publishing company deleted fail');
        }
    }
}

