<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\SeriesRepository;
use App\Models\Series;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class SeriesAPIController extends AppBaseController
{
	/** @var  SeriesRepository */
	private $seriesRepository;

	function __construct(SeriesRepository $seriesRepo)
	{
		$this->seriesRepository = $seriesRepo;
	}

	/**
	 * Display a listing of the Series.
	 * GET|HEAD /series
	 *
	 * @return Response
	 */
	public function index()
	{
		$series = $this->seriesRepository->all();

		return $this->sendResponse($series->toArray(), "Series retrieved successfully");
	}

	/**
	 * Show the form for creating a new Series.
	 * GET|HEAD /series/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Series in storage.
	 * POST /series
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Series::$rules) > 0)
			$this->validateRequestOrFail($request, Series::$rules);

		$input = $request->all();

		$series = $this->seriesRepository->create($input);

		return $this->sendResponse($series->toArray(), "Series saved successfully");
	}

	/**
	 * Display the specified Series.
	 * GET|HEAD /series/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$series = $this->seriesRepository->apiFindOrFail($id);

		return $this->sendResponse($series->toArray(), "Series retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Series.
	 * GET|HEAD /series/{id}/edit
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
	 * Update the specified Series in storage.
	 * PUT/PATCH /series/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Series $series */
		$series = $this->seriesRepository->apiFindOrFail($id);

		$result = $this->seriesRepository->updateRich($input, $id);

		$series = $series->fresh();

		return $this->sendResponse($series->toArray(), "Series updated successfully");
	}

	/**
	 * Remove the specified Series from storage.
	 * DELETE /series/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->seriesRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Series deleted successfully");
	}
}
