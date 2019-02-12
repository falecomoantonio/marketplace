<?php

namespace App\Http\Controllers;

use function GuzzleHttp\describe_type;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OfferCreateRequest;
use App\Http\Requests\OfferUpdateRequest;
use App\Repositories\OfferRepository;
use App\Validators\OfferValidator;

/**
 * Class OffersController.
 *
 * @package namespace App\Http\Controllers;
 */
class OffersController extends Controller
{
    /**
     * @var OfferRepository
     */
    protected $repository;

    /**
     * @var OfferValidator
     */
    protected $validator;

    /**
     * OffersController constructor.
     *
     * @param OfferRepository $repository
     * @param OfferValidator $validator
     */
    public function __construct(OfferRepository $repository, OfferValidator $validator)
    {
        parent::__construct();
        $this->activeMenu(2);
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $offers = $this->repository->paginate(50);
        return view('offers.index')->with('list',$offers)->with('menu', $this->menuDashboard);
    }

    public function create()
    {
        return view('offers.create')->with('menu', $this->menuDashboard);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  OfferCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(OfferCreateRequest $request)
    {
        try {

            $offer = $this->repository->create($request->all());
            if($offer) {
                $request->session()->flash('SUCCESS', 'Oferta Registrada');
            } else {
                $request->session()->flash('ERROR', 'Não foi possível registrar a Oferta');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('WARNING', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $offer,
            ]);
        }

        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        try {
            $id = decrypt($id);
            $offer = $this->repository->find($id);
        } catch (\Exception $e) {
            $request->session()->flash('WARNING', $e->getMessage());
            return redirect()->back();
        }

        return view('offers.edit',['offer'=>$offer])->with('menu', $this->menuDashboard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OfferUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OfferUpdateRequest $request, $id)
    {
        try {

            $id = decrypt($id);
            $offer = $this->repository->update($request->all(), $id);

            if($offer) {
                $request->session()->flash('SUCCESS', 'Oferta Registrada');
            } else {
                $request->session()->flash('ERROR', 'Não foi possível registrar a Oferta');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            $request->session()->flash('WARNING', $e->getMessage());
            return redirect()->back();
        }
    }


    public function changeAvailable( Request $request )
    {
        try {

            $id = decrypt($request->id);
            $offer = $this->repository->find($id);
            $changed = $offer->toggleStatus();

            if($changed) {
                return response(['message'=>'Status modificado com sucesso', 'status'=>'success']);
            } else {
                return response(['message'=>'Não foi possível alterar o status', 'status'=>'error']);
            }
        } catch (\Exception $e) {
            return response(['message'=>$e->getMessage(), 'status'=>'warning']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Offer deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Offer deleted.');
    }
}
