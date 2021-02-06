<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Models\School;
use App\Http\Requests\SchoolRequest;
use App\Services\SchoolServiceInterface;

class SchoolController extends ApiController
{
    protected $schoolService;
    protected $response;

    /**
     * construct function
     *
     * @param SchoolServiceInterface $banner
     * @param ApiResponse $response
     */
    public function __construct(SchoolServiceInterface $schoolService, ApiResponse $response)
    {
        $this->schoolService = $schoolService;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->schoolService->getListSchool($request->all());
        return $this->response->withData($list);
    }

    /**
     * Display a all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $list = $this->schoolService->getAllSchool($request->all());
        return $this->response->withData($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        try {
            $this->schoolService->createSchool([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'address' => $request->address,
            ]);
            return $this->response->withCreated();
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\School  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = $this->schoolService->showSchool($id);
        return $this->response->withData($banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\School  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, $id)
    {
        try {
            $this->schoolService->updateSchool([
                'id' => $id,
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'address' => $request->address,
            ]);
            return $this->response->withMessage('Update successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\School  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->schoolService->deleteSchool($id);
            return $this->response->withMessage('Delete successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }
}
