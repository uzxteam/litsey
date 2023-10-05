<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profile()
    {
        $pageTitle = "Profile Setting";
        $user = auth()->user();
        $info = json_decode(json_encode(getIpInfo()), true);
        $mobileCode = @implode(',', $info['code']);
        $countries = json_decode(file_get_contents(resource_path('views/includes/country.json')));
        return view($this->activeTemplate. 'user.profile_setting', compact('pageTitle','user','mobileCode','countries'));
    }

    public function submitProfile(Request $request)
    {
        $countryData = (array)json_decode(file_get_contents(resource_path('views/includes/country.json')));
        $countryCodes = implode(',', array_keys($countryData));
        $mobileCodes = implode(',',array_column($countryData, 'dial_code'));
        $countries = implode(',',array_column($countryData, 'country'));

        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'mobile' => 'required|regex:/^([0-9]*)$/',
            'mobile_code' => 'required|in:'.$mobileCodes,
            'country_code' => 'required|in:'.$countryCodes,
            'country' => 'required|in:'.$countries,
        ],[
            'firstname.required'=>'First name field is required',
            'lastname.required'=>'Last name field is required'
        ]);

        $user = auth()->user();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        $user->address = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' =>$request->country,
            'city' => $request->city,
        ];
        $user->mobile = $request->mobile;
        $user->country_code = $request->country_code;
        $user->save();

        $notify[] = ['success', 'Profile has been updated successfully'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $pageTitle = 'Change Password';
        return view($this->activeTemplate . 'user.password', compact('pageTitle'));
    }

    public function submitPassword(Request $request)
    {

        $passwordValidation = Password::min(6);
        $general = gs();
        if ($general->secure_password) {
            $passwordValidation = $passwordValidation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required','confirmed',$passwordValidation]
        ]);

        $user = auth()->user();
        if (Hash::check($request->current_password, $user->password)) {
            $password = Hash::make($request->password);
            $user->password = $password;
            $user->save();
            $notify[] = ['success', 'Password changes successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'The password doesn\'t match!'];
            return back()->withNotify($notify);
        }
    }

    public function imageUpdate(Request $request)
    {
        $this->validate($request, [
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $user = auth()->user();
        if ($request->hasFile('image'))
        {
            $path = getFilePath('userProfile');
            fileManager()->removeFile($path.'/'.$user->image);
            $directory = $user->username."/". $user->id;
            $path = getFilePath('userProfile').'/'.$directory;
            $filename = $directory.'/'.fileUploader($request->image, $path, getFileSize('userProfile'));
            $user->image = $filename;
        }
        $user->save();
        $notify[] = ['success', 'Profile image has been updated successfully'];
        return to_route('user.home')->withNotify($notify);
    }
}
