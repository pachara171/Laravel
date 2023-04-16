<?php

namespace App\Http\Controllers;
use App\Models\Content;
use App\Http\Requests\ContentRequest;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index() {
        $contents = Content::all();

        return view('content.index', compact('contents'));
    }

    public function create() {
        $content = new Content;
        return view('content.form', compact('content'));
    }
    
    public function store(ContentRequest $request) {
        $content = new Content();
        $this->save($content, $request);

        return redirect('/content');
    }

    public function edit($id) {
        $content = Content::findOrFail($id);
        return view('content.form', compact('content'));
    }

    public function update (ContentRequest $request, $id) {
        $content = Content::findOrFail($id);
        $this->save($content, $request);
        
        return redirect('/content');
    }
    
    public function destroy($id) {
        Content::destroy($id);
    }

    private function save($data, $value) {
        $data->topic = $value->topic;
        $data->description = $value->description;
        $data->tags = $value->tags;
        $data->user_id = 1;
        $data->save();
    }

    
}
