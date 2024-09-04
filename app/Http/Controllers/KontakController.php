<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $contact = Kontak::first();
        return view('frontend.pages.kontak', [
            'titla' => 'Kontak',
            'contact' => $contact
        ]);
    }
}
