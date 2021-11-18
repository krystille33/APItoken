<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatejobapplicationRequest;
use App\Http\Requests\UpdatejobapplicationRequest;
use App\Repositories\jobapplicationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class jobapplicationController extends AppBaseController
{
    /** @var  jobapplicationRepository */
    private $jobapplicationRepository;

    public function __construct(jobapplicationRepository $jobapplicationRepo)
    {
        $this->jobapplicationRepository = $jobapplicationRepo;
    }

    /**
     * Display a listing of the jobapplication.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jobapplications = $this->jobapplicationRepository->all();

        return view('jobapplications.index')
            ->with('jobapplications', $jobapplications);
    }

    /**
     * Show the form for creating a new jobapplication.
     *
     * @return Response
     */
    public function create()
    {
        return view('jobapplications.create');
    }

    /**
     * Store a newly created jobapplication in storage.
     *
     * @param CreatejobapplicationRequest $request
     *
     * @return Response
     */
    public function store(CreatejobapplicationRequest $request)
    {
        $input = $request->all();

        $jobapplication = $this->jobapplicationRepository->create($input);

        Flash::success('Jobapplication saved successfully.');

        return redirect(route('jobapplications.index'));
    }

    /**
     * Display the specified jobapplication.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jobapplication = $this->jobapplicationRepository->find($id);

        if (empty($jobapplication)) {
            Flash::error('Jobapplication not found');

            return redirect(route('jobapplications.index'));
        }

        return view('jobapplications.show')->with('jobapplication', $jobapplication);
    }

    /**
     * Show the form for editing the specified jobapplication.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobapplication = $this->jobapplicationRepository->find($id);

        if (empty($jobapplication)) {
            Flash::error('Jobapplication not found');

            return redirect(route('jobapplications.index'));
        }

        return view('jobapplications.edit')->with('jobapplication', $jobapplication);
    }

    /**
     * Update the specified jobapplication in storage.
     *
     * @param int $id
     * @param UpdatejobapplicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatejobapplicationRequest $request)
    {
        $jobapplication = $this->jobapplicationRepository->find($id);

        if (empty($jobapplication)) {
            Flash::error('Jobapplication not found');

            return redirect(route('jobapplications.index'));
        }

        $jobapplication = $this->jobapplicationRepository->update($request->all(), $id);

        Flash::success('Jobapplication updated successfully.');

        return redirect(route('jobapplications.index'));
    }

    /**
     * Remove the specified jobapplication from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jobapplication = $this->jobapplicationRepository->find($id);

        if (empty($jobapplication)) {
            Flash::error('Jobapplication not found');

            return redirect(route('jobapplications.index'));
        }

        $this->jobapplicationRepository->delete($id);

        Flash::success('Jobapplication deleted successfully.');

        return redirect(route('jobapplications.index'));
    }
}
