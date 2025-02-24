<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    // Display all news
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('author', 'LIKE', "%{$search}%");
        }

        $news = $query->orderBy('created_at', 'desc')->paginate(10); // Paginate results
        return view('admin.news.index', compact('news'));
    }

    
    // Show the form to create a new news article
    public function create()
    {
        return view('admin.news.create');
    }

    // Store a new news article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255', // Validate the author
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        } else {
            $imagePath = null;
        }

        // Create the news article
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author, // Add the author
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    // Show the form to edit a news article
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // Update a news article
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255', // Validate the author
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            // Save the new image
            $imagePath = $request->file('image')->store('news_images', 'public');
        } else {
            $imagePath = $news->image; // Keep the existing image
        }

        // Update the news article
        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author, // Update the author
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    // Delete a news article
    public function destroy(News $news)
    {
        // Delete the image if it exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        // Delete the news article
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
