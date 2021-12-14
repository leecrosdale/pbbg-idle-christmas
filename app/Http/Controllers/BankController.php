<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        /** @var Character $character */
        $character = auth()->user()->character;
        $items = $character->items()->with('item')->get();
        return view('bank.index', compact('items'));
    }
}
