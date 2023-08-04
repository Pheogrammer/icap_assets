<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Asset;
use App\Models\Kind;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function users()
    {
        $users = User::all();
        return view('users', compact('users'));
    }
    public function registerNewUser()
    {
        return view('registerUsers');
    }
    public function saveregisteredUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users',
        ]);

        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('email'))
        ]);
        $user->save();
        return redirect('users')->with('success', 'User registered successfully!');
    }
    public function assets()
    {
        $assets = Asset::all();
        return view('assets', compact('assets'));
    }
    public function registerNewAsset()
    {
        $kinds = Kind::all();
        return view('registerAssets', compact('kinds'));
    }

    public function saveregisteredAsset(Request $request)
    {
        $request->validate([
            'asset_number' => 'required|unique:assets',
            'asset_name' => 'required|string',
            'asset_kind' => 'required',
            'asset_status' => 'required',
            'purchase_date' => 'required|date',
        ]);

        $asset = new Asset();
        $asset->asset_number = $request->input('asset_number');
        $asset->assetName = $request->input('asset_name');
        $asset->kind = $request->input('asset_kind');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->status = $request->input('asset_status');
        $asset->added_by = Auth()->user()->id;

        $asset->save();



        $asset->save();
        return redirect('assets')->with('success', 'Asset registered successfully!');

    }
}
