<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsFormRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }
    public function store(NewsFormRequest $request)
    {
        $data = $request->validated();

        $news = new News;
        $news->name = $data['name'];
        $news->slug = $data['slug'];
        $news->description = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }

        $news->status = $request->status == true ? '1' : '0';
        $news->save();

        return redirect('admin/news')->with('message', 'News Added Successfully');
    }

    public function edit($news_id)
    {
        $news = News::find($news_id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(NewsFormRequest $request, $news_id)
    {
        $data = $request->validated();

        $news = News::find($news_id);
        $news->name = $data['name'];
        $news->slug = $data['slug'];
        $news->description = $data['description'];

        if ($request->hasfile('image')) {

            $destination = 'uploads/news/' . $news->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/news/', $filename);
            $news->image = $filename;
        }

        $news->status = $request->status == true ? '1' : '0';
        $news->update();

        return redirect('admin/news')->with('message', 'News Updated Successfully');
    }

    public function destroy($news_id)
    {
        $news = News::find($news_id);
        if ($news) {
            $news->delete();
            return redirect('admin/news')->with('message', 'News Deleted Successfully');
        } else {
            return redirect('admin/news')->with('message', 'No News ID Found');
        }
    }
}
