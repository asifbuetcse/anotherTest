<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ThreadCharacterRepository;
use App\Models\ThreadCharacter;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ThreadCharacterAPIController extends AppBaseController
{
	/** @var  ThreadCharacterRepository */
	private $threadCharacterRepository;

	function __construct(ThreadCharacterRepository $threadCharacterRepo)
	{
		$this->threadCharacterRepository = $threadCharacterRepo;
	}

	/**
	 * Display a listing of the ThreadCharacter.
	 * GET|HEAD /threadCharacters
	 *
	 * @return Response
	 */
	public function index()
	{
		$threadCharacters = $this->threadCharacterRepository->all();

		return $this->sendResponse($threadCharacters->toArray(), "ThreadCharacters retrieved successfully");
	}

	/**
	 * Show the form for creating a new ThreadCharacter.
	 * GET|HEAD /threadCharacters/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created ThreadCharacter in storage.
	 * POST /threadCharacters
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(ThreadCharacter::$rules) > 0)
			$this->validateRequestOrFail($request, ThreadCharacter::$rules);

		$input = $request->all();

		$threadCharacters = $this->threadCharacterRepository->create($input);

		return $this->sendResponse($threadCharacters->toArray(), "ThreadCharacter saved successfully");
	}

	/**
	 * Display the specified ThreadCharacter.
	 * GET|HEAD /threadCharacters/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$threadCharacter = $this->threadCharacterRepository->apiFindOrFail($id);

		return $this->sendResponse($threadCharacter->toArray(), "ThreadCharacter retrieved successfully");
	}

	/**
	 * Show the form for editing the specified ThreadCharacter.
	 * GET|HEAD /threadCharacters/{id}/edit
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
	 * Update the specified ThreadCharacter in storage.
	 * PUT/PATCH /threadCharacters/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var ThreadCharacter $threadCharacter */
		$threadCharacter = $this->threadCharacterRepository->apiFindOrFail($id);

		$result = $this->threadCharacterRepository->updateRich($input, $id);

		$threadCharacter = $threadCharacter->fresh();

		return $this->sendResponse($threadCharacter->toArray(), "ThreadCharacter updated successfully");
	}

	/**
	 * Remove the specified ThreadCharacter from storage.
	 * DELETE /threadCharacters/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->threadCharacterRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "ThreadCharacter deleted successfully");
	}
}
