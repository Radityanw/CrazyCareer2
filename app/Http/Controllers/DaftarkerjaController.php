<?php

namespace App\Http\Controllers;

use App\Models\Daftarkerja;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;

class DaftarkerjaController extends Controller
// {
    // public function index(request $request)
    // {
    //     $Daftarkerja = Daftarkerja::where('is_active', true)
    //     ->with('tags')
    //     ->latest()
    //     ->get();

        // $tags = tag:: orderBy('name')
        //     ->get();
        
        // if ($request->has('s')){
        //     $query = strtolower($request->get('s'));
        //     $Daftarkerja = $Daftarkerja->filter(function($Daftarkerja) use($query){
        //         if (Str :: contains(strtolower($Daftarkerja->title), $query)) {
        //             return true;
        //         }

        //         if (Str::contains(strtolower($Daftarkerja->company), $query)){
        //             return true;
        //         }
        //         if (Str::contains(strtolower($Daftarkerja->type), $query)){
        //             return true;
        //         }
        //         return false;
        //     });

            
        // }
        // if ($request->has('tags')){
        //     $tag = $request->get('tags');
        //     $Daftarkerja = $Daftarkerja->filter(function($Daftarkerja) use($tag){
        //         return $Daftarkerja->tag->contains('slug', $tag);
        //     });
        {
            public function index(Request $request)
            {
                $query = Daftarkerja::query()
                    ->where('is_active', true)
                    ->with('tags')
                    ->latest();
        
                if ($request->has('s')) {
                    $searchQuery = trim($request->get('s'));
        
                    $query->where(function (Builder $builder) use ($searchQuery) {
                        $builder
                            ->orWhere('title', 'like', "%{$searchQuery}%")
                            ->orWhere('company', 'like', "%{$searchQuery}%")
                            ->orWhere('type', 'like', "%{$searchQuery}%");
                    });
                }
        
        if ($request->has('tag')) {
            $tag = $request->get('tag');
            $query->whereHas('tags', function (Builder $builder) use ($tag) {
                $builder->where('slug', $tag);
            });
        }
        $Daftarkerja = $query->paginate(16);

        $tags = Tag::orderBy('name')
            ->get();
        return view('Daftarkerja.index', compact('Daftarkerja', 'tags'));
    }
    public function show(Daftarkerja $Daftarkerja, Request $request){
        return view('Daftarkerja.show', compact('Daftarkerja'));
    }
    public function apply(Daftarkerja $Daftarkerja, Request $request){
        $Daftarkerja->kliks()
            ->create([
                'user_agent' => $request->userAgent(),
                'ip' => $request->ip()
            ]);
        
        return redirect()->to($Daftarkerja->apply_Link);
        
    }
    public function create(){
        return view('Daftarkerja.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string',
            'tags' => 'nullable|string',
            'company' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|in:Courses,Jobs,Internship',
            'apply_link' => 'required|string',
            'content' => 'nullable|string',
            
        ]);
        $logoPath = $request->file('logo')->store('logos', 'public');
        if (Auth::check()) {
        
            $user_id = Auth::user()->id;

        $daftarkerja = Daftarkerja::create([
            'user_id' => $user_id,
            'title' => $validatedData['title'],
            'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
            'company' => $validatedData['company'],
            'logo' => $logoPath,
            'type' => $validatedData['type'],
            'apply_link' => $validatedData['apply_link'],
            'content' => $validatedData['content'],
            'is_active' => true
            
        ]);
        $tagNames = explode(',', $request->input('tags'));
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tagName = trim($tagName);
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($tagName))
                ], [
                    'name' => ucwords(trim($tagName))
                ]);
            $tagIds[] = $tag->id;
        }

        $daftarkerja->tags()->attach($tagIds);
        
        if ($request->has('apply_button')) {
            return redirect()->to($daftarkerja->apply_link);
        } else {
            return redirect()->route('Daftarkerja.index')->with('success', 'Pekerjaan atau kursus berhasil ditambah!');
        }
    } else {
        return redirect()->route('login');
    }


}
public function destroy($id)
{
    $daftarkerja = Daftarkerja::findOrFail($id);
    $daftarkerja->delete();

    return redirect()->route('Daftarkerja.index')->with('success', 'Job deleted successfully');
}


}
