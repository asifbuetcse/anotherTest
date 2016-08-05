<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ThreadUserRepository;
use App\Models\ThreadUser;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ThreadUserAPIController extends AppBaseController
{
	/** @var  ThreadUserRepository */
	private $threadUserRepository;

	function __construct(ThreadUserRepository $threadUserRepo)
	{
		$this->threadUserRepository = $threadUserRepo;
	}

	/**
	 * Display a listing of the ThreadUser.
	 * GET|HEAD /threadUsers
	 *
	 * @return Response
	 */
	public function index()
	{
		$threadUsers = $this->threadUserRepository->all();

		return $this->sendResponse($threadUsers->toArray(), "ThreadUsers retrieved successfully");
	}

	/**
	 * Show the form for creating a new ThreadUser.
	 * GET|HEAD /threadUsers/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ThreadUser in storage.
	 * POST /threadUsers
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ThreadUser::$rules) > 0)
			$this->validateRequestOrFail($request, ThreadUser::$rules);

		$input = $request->all();

		$threadUsers = $this->threadUserRepository->create($input);

		return $this->sendResponse($threadUsers->toArray(), "ThreadUser saved successfully");
	}

	/**
	 * Display the specified ThreadUser.
	 * GET|HEAD /threadUsers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$threadUser = $this->threadUserRepository->apiFindOrFail($id);

		return $this->sendResponse($threadUser->toArray(), "ThreadUser retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ThreadUser.
	 * GET|HEAD /threadUsers/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified ThreadUser in storage.
	 * PUT/PATCH /threadUsers/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ThreadUser $threadUser */
		$threadUser = $this->threadUserRepository->apiFindOrFail($id);

		$result = $this->threadUserRepository->updateRich($input, $id);

		$threadUser = $threadUser->fresh();

		return $this->sendResponse($threadUser->toArray(), "ThreadUser updated successfully");
	}

	/**
	 * Remove the specified ThreadUser from storage.
	 * DELETE /threadUsers/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->threadUserRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ThreadUser deleted successfully");
	}
}
