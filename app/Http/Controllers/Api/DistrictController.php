<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Models\District;
use App\Http\Requests\DistrictRequest;
use App\Services\DistrictServiceInterface;

class DistrictController extends ApiController
{
    protected $districtService;
    protected $response;

    /**
     * construct function
     *
     * @param DistrictServiceInterface $district
     * @param ApiResponse $response
     */
    public function __construct(DistrictServiceInterface $districtService, ApiResponse $response)
    {
        $this->districtService = $districtService;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->districtService->getListDistrict($request->all());
        return $this->response->withData($list);
    }

    /**
     * Display a all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $list = $this->districtService->getAllDistrict($request->all());
        return $this->response->withData($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        try {
            $this->districtService->createDistrict([
                'title' => $request->title,
            ]);
            return $this->response->withCreated();
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $district = $this->districtService->showDistrict($id);
        return $this->response->withData($district);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, $id)
    {
        try {
            $this->districtService->updateDistrict([
                'id' => $id,
                'title' => $request->title,
            ]);
            return $this->response->withMessage('Update successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->districtService->deleteDistrict($id);
            return $this->response->withMessage('Delete successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }
}
