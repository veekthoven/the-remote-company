<?php

namespace App\Http\Controllers;

use App\Enums\Type;
use Inertia\Inertia;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourcesController extends Controller
{
    public function home()
    {
        return Inertia::render('Home', [
            'resources' => Resource::latest()->paginate(10)
        ]);
    }

    public function admin()
    {
        return Inertia::render('Admin', [
            'allResources' => Resource::latest()->paginate(10)
        ]);
    }

    public function show(Request $request, Resource $resource)
    {
        return Inertia::render('Show', [
            'resource' => $resource
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(config("app.rules.{$request->type}"));

        Resource::create([
            'title' => $data['title'],
            'type' => $this->getTypeFromRequest($request),
            'body' => $this->prepareBody($request)
        ]);

        return redirect()->route('admin')->with('message', 'Resource created successfully!!');
    }

    public function edit(Resource $resource)
    {
        return Inertia::render('Edit', [
            'resource' => $resource
        ]);
    }

    public function update(Request $request, Resource $resource)
    {
        $data = $request->validate(config("app.rules.{$request->type}"));

        $resource->update([
             'title' => $data['title'],
             'type' => $this->getTypeFromRequest($request),
             'body' => $this->prepareBody($request)
         ]);

        return redirect()->route('admin')->with('message', 'Resource updated successfully!');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()->route('admin')->with('message', 'Resource Deleted successfully!');
    }

    protected function getTypeFromRequest($request)
    {
        if ($request->type === 'pdf' || null) {
            return Type::PDF->value;
        }

        if ($request->type === 'code') {
            return Type::CODE->value;
        }

        if ($request->type === 'url') {
            return Type::URL->value;
        }
    }

    protected function prepareBody($request)
    {
        if ($request->type === 'pdf') {
            $path = $request->file('file')->store('public/pdfs');

            return [
                'file' => Storage::url($path)
            ];
        }

        if ($request->type === 'url') {
            return [
                'link' => $request->link,
                'new_tab' => $request->new_tab
            ];
        }

        if ($request->type === 'code') {
            return [
                'code' => $request->code,
                'description' => $request->description
            ];
        }
    }
}
