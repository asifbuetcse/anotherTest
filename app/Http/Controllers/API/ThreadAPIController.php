<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\ThreadRepository;
use App\Models\Thread;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class ThreadAPIController extends AppBaseController
{
	/** @var  ThreadRepository */
	private $threadRepository;

	function __construct(ThreadRepository $threadRepo)
	{
		$this->threadRepository = $threadRepo;
	}

	/**
	 * Display a listing of the Thread.
	 * GET|HEAD /threads
	 *
	 * @return Response
	 */
	public function index()
	{
		$threads = $this->threadRepository->all();

		return $this->sendResponse($threads->toArray(), "Threads retrieved successfully");
	}

	/**
	 * Show the form for creating a new Thread.
	 * GET|HEAD /threads/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Thread in storage.
	 * POST /threads
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Thread::$rules) > 0)
			$this->validateRequestOrFail($request, Thread::$rules);

		$input = $request->all();

		$threads = $this->threadRepository->create($input);

		return $this->sendResponse($threads->toArray(), "Thread saved successfully");
	}

	/**
	 * Display the specified Thread.
	 * GET|HEAD /threads/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$thread = $this->threadRepository->apiFindOrFail($id);

		return $this->sendResponse($thread->toArray(), "Thread retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Thread.
	 * GET|HEAD /threads/{id}/edit
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
	 * Update the specified Thread in storage.
	 * PUT/PATCH /threads/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Thread $thread */
		$thread = $this->threadRepository->apiFindOrFail($id);

		$result = $this->threadRepository->updateRich($input, $id);

		$thread = $thread->fresh();

		return $this->sendResponse($thread->toArray(), "Thread updated successfully");
	}

	/**
	 * Remove the specified Thread from storage.
	 * DELETE /threads/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->threadRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Thread deleted successfully");
	}
}
