<?php

namespace App\Http\Controllers\Api;

use Exception;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SettingRequest;
use App\Services\SettingServiceInterface;

class SettingController extends ApiController
{
    protected $settingService;
    protected $response;
    protected $folder = 'settings';

    /**
     * construct function
     *
     * @param SettingServiceInterface $setting
     * @param ApiResponse $response
     */
    public function __construct(SettingServiceInterface $settingService, ApiResponse $response)
    {
        $this->settingService = $settingService;
        $this->response = $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $setting = $this->settingService->showSetting($id);
        return $this->response->withData($setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        try {
            if ($request->hasFile('logo')) {
                $filenameByRequest = $request->file('logo')->getClientOriginalName();
                $fileName = pathinfo($filenameByRequest, PATHINFO_FILENAME);
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;

                $request->file('logo')->move(public_path('images/' . $this->folder), $fileName);

                $this->settingService->updateSetting([
                    'id' => $id,
                    'logo' => env('APP_URL') . "/images/" . $this->folder . '/' . $fileName,
                ]);
            }

            $this->settingService->updateSetting([
                'id' => $id,
                'email' => $request->email,
                'hotline' => $request->hotline,
                'address' => $request->address,
                'content' => $request->content,
                'description' => $request->description,
            ]);
            return $this->response->withMessage('Update successful');
        } catch (Exception $ex) {
            return $this->response->errorWrongArgs($ex->getMessage());
        }
    }
}
