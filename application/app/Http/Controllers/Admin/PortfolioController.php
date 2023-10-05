<?php

namespace App\Http\Controllers\Admin;


use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function index(){
        $pageTitle = 'Portfolios';
        $portfolios = Portfolio::orderBy('created_at','desc')->paginate(getPaginate());
        return view('admin.portfolio.index',compact('pageTitle','portfolios'));
    }

    public function create(){
        $pageTitle = 'Add Portfolio';
        return view('admin.portfolio.create',compact('pageTitle'));
    }

    public function edit($id){
        $pageTitle = 'Update';
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit',compact('pageTitle','portfolio'));

    }

    public function store(Request $request){

        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'image' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $purifier = new \HTMLPurifier();

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $purifier->purify($request->description);
        $portfolio->status = 1;


        if ($request->hasFile('image')) {
            try {
                $portfolio->image = fileUploader($request->image,getFilePath('portfolioImage'),getFileSize('portfolioImage'));

            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $portfolio->save();

        $notify[] = ['success', 'Protfolio has been created successfully'];
        return back()->withNotify($notify);

    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'sub_title'=>'required',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);

        $purifier = new \HTMLPurifier();

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->title = $request->title;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->description = $purifier->purify($request->description);
        $portfolio->status = $request->status ? 1 : 0;

        if ($request->hasFile('image')) {
            try {
                $old = $portfolio->image;
                $portfolio->image = fileUploader($request->image,getFilePath('portfolioImage'),getFileSize('portfolioImage'),$old);

            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }
        $portfolio->save();

        $notify[] = ['success', 'Protfolio has been updated successfully'];
        return back()->withNotify($notify);

    }

    public function delete(Request $request){
        $portfolio = Portfolio::findOrFail($request->id);

        $path = getFilePath('portfolioImage') . '/' . $portfolio->image;
        fileManager()->removeFile($path);
        $portfolio->delete();

        $notify[] = ['success', 'Portfolio has been deleted'];
        return back()->withNotify($notify);
    }
}
