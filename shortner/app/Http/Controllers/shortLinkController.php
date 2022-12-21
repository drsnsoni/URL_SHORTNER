<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
// use Dotenv\Util\Str;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class shortLinkController extends Controller
{
    //
    public function index()
    {
        $shortenLinks = ShortLink::latest()->get();
        return view('shorten', compact('shortenLinks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        ShortLink::create($input);

        return redirect('generate-shorten-link')->withSuccess('Shorten Link Generarated Successfully');
    }

    public function ShortLink($code)
    {
        $find = ShortLink::where('code', $code)->first();
        return redirect($find->link);
    }
}
