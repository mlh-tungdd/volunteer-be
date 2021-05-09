<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Http\Requests\DonationRequest;
use App\Services\DonationServiceInterface;

class DonationController extends ApiController
{
    protected $donationService;
    protected $response;

    /**
     * construct function
     *
     * @param DonationServiceInterface $donation
     * @param ApiResponse $response
     */
    public function __construct(DonationServiceInterface $donationService, ApiResponse $response)
    {
        $this->donationService = $donationService;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->donationService->getListDonation($request->all());
        return $this->response->withData($list);
    }

    /**
     * Display a all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $list = $this->donationService->getAllDonation($request->all());
        return $this->response->withData($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationRequest $request)
    {
        try {
            $this->donationService->createDonation([
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'status' => $request->status,
                'tags' => $request->tags,
            ]);
            return $this->response->withCreated();
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = $this->donationService->showDonation($id);
        return $this->response->withData($donation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(DonationRequest $request, $id)
    {
        try {
            $this->donationService->updateDonation([
                'id' => $id,
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content,
                'tags' => $request->tags,
            ]);
            return $this->response->withMessage('Update successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->donationService->deleteDonation($id);
            return $this->response->withMessage('Delete successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }

    /**
     * Update status
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $this->donationService->updateDonation([
                'id' => $id,
                'status' => $request->status,
            ]);
            return $this->response->withMessage('Update successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }
}
