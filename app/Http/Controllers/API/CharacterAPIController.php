<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\CharacterRepository;
use App\Models\Character;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CharacterAPIController extends AppBaseController
{
	/** @var  CharacterRepository */
	private $characterRepository;

	function __construct(CharacterRepository $characterRepo)
	{
		$this->characterRepository = $characterRepo;
	}

	/**
	 * Display a listing of the Character.
	 * GET|HEAD /characters
	 *
	 * @return Response
	 */
	public function index()
	{
		$characters = $this->characterRepository->all();

		return $this->sendResponse($characters->toArray(), "Characters retrieved successfully");
	}

	/**
	 * Show the form for creating a new Character.
	 * GET|HEAD /characters/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Character in storage.
	 * POST /characters
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Character::$rules) > 0)
			$this->validateRequestOrFail($request, Character::$rules);

		$input = $request->all();

		$characters = $this->characterRepository->create($input);

		return $this->sendResponse($characters->toArray(), "Character saved successfully");
	}

	/**
	 * Display the specified Character.
	 * GET|HEAD /characters/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$character = $this->characterRepository->apiFindOrFail($id);

		return $this->sendResponse($character->toArray(), "Character retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Character.
	 * GET|HEAD /characters/{id}/edit
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
	 * Update the specified Character in storage.
	 * PUT/PATCH /characters/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Character $character */
		$character = $this->characterRepository->apiFindOrFail($id);

		$result = $this->characterRepository->updateRich($input, $id);

		$character = $character->fresh();

		return $this->sendResponse($character->toArray(), "Character updated successfully");
	}

	/**
	 * Remove the specified Character from storage.
	 * DELETE /characters/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->characterRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Character deleted successfully");
	}
}
