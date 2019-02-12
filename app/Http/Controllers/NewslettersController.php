<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NewsletterCreateRequest;
use App\Http\Requests\NewsletterUpdateRequest;
use App\Repositories\NewsletterRepository;
use App\Validators\NewsletterValidator;

/**
 * Class NewslettersController.
 *
 * @package namespace App\Http\Controllers;
 */
class NewslettersController extends Controller
{
    /**
     * @var NewsletterRepository
     */
    protected $repository;

    /**
     * @var NewsletterValidator
     */
    protected $validator;

    /**
     * NewslettersController constructor.
     *
     * @param NewsletterRepository $repository
     * @param NewsletterValidator $validator
     */
    public function __construct(NewsletterRepository $repository, NewsletterValidator $validator)
    {
        parent::__construct();
        $this->activeMenu(4);
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
        $newsletters = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $newsletters,
            ]);
        }

        return view('newsletters.index')->with('list',$newsletters)->with('menu', $this->menuDashboard);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsletterCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(NewsletterCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $newsletter = $this->repository->create($request->all());

            $response = [
                'message' => 'Newsletter created.',
                'data'    => $newsletter->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
        $newsletter = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $newsletter,
            ]);
        }

        return view('newsletters.show', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = $this->repository->find($id);

        return view('newsletters.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsletterUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(NewsletterUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $newsletter = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Newsletter updated.',
                'data'    => $newsletter->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
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
                'message' => 'Newsletter deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Newsletter deleted.');
    }
}
