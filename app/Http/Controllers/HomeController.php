<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $companies = Company::first();
        $misiArray = explode('.', $companies['misi']);
        $kebijakanArray = explode('.', $companies['kebijakan']);
        $jasapelayananArray = explode('.', $companies['jasapelayanan']);

        return view('frontend.pages.home', [
            'title' => 'Home',
            'companies' => $companies,
            'visi' => $companies['visi'],
            'misi' => $companies['misi'],
            'kebijakan' => $companies['kebijakan'],
            'jasapelayanan' => $companies['jasapelayanan'],

            'misisplit' => $misiArray,
            'kebijakansplit' => $kebijakanArray,
            'jasapelayanansplit' => $jasapelayananArray,


        ]);
    }
}
