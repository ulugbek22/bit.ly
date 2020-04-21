<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;
use App\User;

class UrlsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('url.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $url = request()->validate(['long' => 'required|url']);
        if ($check_url = Url::where(['user_id' => auth()->user()->id, 'long' => $url['long']])->first()) {
            return view('url.created', ['url' => $check_url]);
        }
        $url['short'] = User::generateShortUrl();
        $url['user_id'] = auth()->user()->id;
        $url = Url::create($url);
        return view('url.created', ['url' => $url]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($short)
    {
        if ($url = Url::where(['short' => $short])->first()) {
            return redirect($url->long);
        }
        return redirect()->home()->withErrors(['message' => 'Url Not found']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return back()->with('success', 'Deleted.');
    }
    public function myUrls()
    {
        return view('user.urls', ['urls' => Url::where('user_id', auth()->user()->id)->get()]);
    }
}
