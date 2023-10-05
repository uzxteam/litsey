<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index(){
        $pageTitle = 'Services';
        $services = Service::orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.services.index',compact('pageTitle','services'));
    }

    public function create(){
        $pageTitle = 'Add Service';
        return view('admin.services.create',compact('pageTitle'));
    }

    public function edit($id){
        $pageTitle = 'Update';
        $service = Service::findOrFail($id);
        return view('admin.services.edit',compact('pageTitle','service'));

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'price'=>'required|gt:0',
            'icon'=>'required',
            'file.*' => ['nullable', 'file', new FileTypeValidate(['zip', 'rar','doc', 'pdf', 'xls','ppt'])],
        ]);

        // field validation
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }


        $service = new Service();
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->status = 1;

        if ($request->hasFile('file')) {
            try {
                $filePath = fileUploader($request->file('file'), getFilePath('serviceFile'));
                $service->file = $filePath;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your file'];
                return back()->withNotify($notify);
            }
        }
        $service->save();

        if ($service) {
            return response()->json([
                'message' => 'Service has been created successfully',
                'product' => $service,
            ]);
        } else {
            return response()->json([
                'message' => 'Service could not be created. Please try again later.',
            ], 500);
        }

    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'price'=>'required|gt:0',
            'icon'=>'required',
            'file.*' => ['nullable', 'file', new FileTypeValidate(['zip', 'rar','doc', 'pdf', 'xls','ppt'])],
        ]);

        // field validation
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }


        $service = Service::find($request->id);
        $service->title = $request->title;
        $service->icon = $request->icon;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->status = $request->status ? 1 : 0;

        if ($request->hasFile('file')) {
            try {
                $old = $service->file;
                $filePath = fileUploader($request->file('file'), getFilePath('serviceFile'), $old);
                $service->file = $filePath;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your file'];
                return back()->withNotify($notify);
            }
        }

        $service->save();



        if ($service) {
            return response()->json([
                'message' => 'Service has been updated successfully',
                'product' => $service,
            ]);
        } else {
            return response()->json([
                'message' => 'Service could not be updated. Please try again later.',
            ], 500);
        }

    }

    public function delete(Request $request){

        $service = Service::findOrFail($request->id);
        $filePath = getFilePath('serviceFile') . '/' . $service->file;
        fileManager()->removeFile($filePath);

        $service->delete();

        $notify[] = ['error', 'Service has been deleted'];
        return back()->withNotify($notify);
    }


    public function getApprovedorders(){
        $pageTitle = "Orders List";
        $orders = Order::with(['service','user'])->where('status',1)->orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.orders.index',compact('orders','pageTitle'));
    }

    public function getPendingdorders(){
        $pageTitle = "Orders List";
        $orders = Order::with(['service','user'])->where('status',0)->orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.orders.index',compact('orders','pageTitle'));
    }
}
