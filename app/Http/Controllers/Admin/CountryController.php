<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryFormRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CountryController extends Controller
{
    public function index()
    {
        $country = Country::all();
        return view('admin.country.index', compact('country'));
    }

    public function create()
    {
        return view('admin.country.create');
    }
    public function store(CountryFormRequest $request)
    {
        $data = $request->validated();

        $country = new Country;

        $country->name = $data['name'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/country/', $filename);
            $country->image = $filename;
        }

        $country->meta_title = $data['meta_title'];
        $country->meta_description = $data['meta_description'];
        $country->meta_keyword = $data['meta_keyword'];

        $country->navbar_status = $request->navbar_status == true ? '1' : '0';
        $country->status = $request->status == true ? '1' : '0';
        $country->created_by = Auth::user()->id;
        $country->save();

        return redirect('admin/country')->with('message', 'Country Added Successfully');
    }

    public function edit($country_id)
    {
        $country = Country::find($country_id);
        return view('admin.country.edit', compact('country'));
    }

    public function update(CountryFormRequest $request, $country_id)
    {
        $data = $request->validated();

        $country = Country::find($country_id);

        $country->name = $data['name'];
        $country->slug = $data['slug'];
        $country->description = $data['description'];

        if ($request->hasfile('image')) {

            $destination = 'uploads/country/' . $country->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/country/', $filename);
            $country->image = $filename;
        }

        $country->meta_title = $data['meta_title'];
        $country->meta_description = $data['meta_description'];
        $country->meta_keyword = $data['meta_keyword'];

        $country->navbar_status = $request->navbar_status == true ? '1' : '0';
        $country->status = $request->status == true ? '1' : '0';
        $country->created_by = Auth::user()->id;
        $country->update();

        return redirect('admin/country')->with('message', 'Country Updated Successfully');
    }

    public function destroy($country_id)
    {
        $country = Country::find($country_id);
        if ($country) {
            $destination = 'uploads/country/' . $country->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $country->jobs()->delete();
            $country->delete();

            return redirect('admin/country')->with('message', 'Country Deleted with its Jobs Successfully');
        } else {
            return redirect('admin/country')->with('message', 'No Country Id Found');
        }
    }
}
