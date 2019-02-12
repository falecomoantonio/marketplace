<?php

namespace App\Http\Controllers;

use App\Entities\Offer;
use App\Repositories\OfferRepository;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    public function __construct()
    {
    }

    public function index( Request $request, OfferRepository $repository )
    {
        try {
            $list = Offer::where('available', '=', 'y')->orderBy('available_to', 'DESC')->take(24)->get();
        } catch (\Exception $e) {
            $list = [];
        }
        return view('site.init')->with('list',$list);
    }

    public function showFormSearch( Request $request )
    {
        return view('site.frm_search');
    }

    public function search( Request $request, OfferRepository $repository )
    {
        try {
            $repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
            $list = $repository->paginate(15);
        } catch (\Exception $e) {
            $list = [];
        }

        return view('site.search')->with('list',$list);
    }
}
