<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SendClientQueryController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'tel' => ['required'],
            'message' => ['required'],
        ]);

        Query::create($validatedData);

        return redirect()->route('query-sent');
    }
}
