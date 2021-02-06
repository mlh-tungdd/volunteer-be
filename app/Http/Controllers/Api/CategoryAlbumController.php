<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Models\CategoryAlbum;
use App\Http\Requests\CategoryAlbumRequest;
use App\Services\CategoryAlbumServiceInterface;

class CategoryAlbumController extends ApiController
{
    protected $categoryAlbumService;
    protected $response;

    /**
     * construct function
     *
     * @param CategoryAlbumServiceInterface $categoryAlbum
     * @param ApiResponse $response
     */
    public function __construct(CategoryAlbumServiceInterface $categoryAlbumService, ApiResponse $response)
    {
        $this->categoryAlbumService = $categoryAlbumService;
        $this->response = $response;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->categoryAlbumService->getListCategoryAlbum($request->all());
        return $this->response->withData($list);
    }

    /**
     * Display a all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $list = $this->categoryAlbumService->getAllCategoryAlbum($request->all());
        return $this->response->withData($list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryAlbumRequest $request)
    {
        try {
            $this->categoryAlbumService->createCategoryAlbum([
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
     * @param  \App\Models\Models\CategoryAlbum  $categoryAlbum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryAlbum = $this->categoryAlbumService->showCategoryAlbum($id);
        return $this->response->withData($categoryAlbum);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\CategoryAlbum  $categoryAlbum
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryAlbumRequest $request, $id)
    {
        try {
            $this->categoryAlbumService->updateCategoryAlbum([
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
     * @param  \App\Models\Models\CategoryAlbum  $categoryAlbum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->categoryAlbumService->deleteCategoryAlbum($id);
            return $this->response->withMessage('Delete successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }
}
