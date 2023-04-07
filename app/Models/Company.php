<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public static $company;
    public static function addCompany($request){

        self::$company                 = new Company();
        self::$company->name           = $request->name;
        self::$company->slogan         = $request->slogan;
        self::$company->logo           = self::saveLogo($request);
        self::$company->favicon        = self::saveFavicon($request);
        self::$company->address        = $request->address;
        self::$company->email          = $request->email;
        self::$company->support_email  = $request->support_email;
        self::$company->mobile         = $request->mobile;
        self::$company->support_number = $request->support_number;
        self::$company->social_address = $request->social_address;
        self::$company->save();
    }
    public static function updateCompany($request, $id)
    {
        self::$company              = Company::find($id);
        self::$company->name           = $request->name;
        self::$company->slogan         = $request->slogan;
        self::$company->logo           = self::saveLogo($request);
        self::$company->favicon        = self::saveFavicon($request);
        self::$company->address        = $request->address;
        self::$company->email          = $request->email;
        self::$company->support_email  = $request->support_email;
        self::$company->mobile         = $request->mobile;
        self::$company->support_number = $request->support_number;
        self::$company->social_address = $request->social_address;
        self::$company->save();
    }
    public static function saveLogo($request){
        $logo     = $request->file('logo');
        $logoName = rand().'.'.$logo->getClientOriginalExtension();
        $directory = 'upload/logo/';
        $logoUrl  = $directory.$logoName;
        $logo->move($directory, $logoName);
        return $logoUrl;
    }
    public static function saveFavicon($request){
        $favicon     = $request->file('favicon');
        $faviconName = rand().'.'.$favicon->getClientOriginalExtension();
        $directory = 'upload/favicon/';
        $faviconUrl  = $directory.$faviconName;
        $favicon->move($directory, $faviconName);
        return $faviconUrl;
    }
    public static function deleteCompany($id)
    {
        self::$company = Company::find($id);
        self::$company->delete();
    }
}
