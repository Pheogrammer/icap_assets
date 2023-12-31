<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Asset;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Kind;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $assets = Asset::with('kind')
            ->whereNull('date_deleted')
            ->get();

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
        $asset->asset_name = $request->input('asset_name');
        $asset->kind_id = $request->input('asset_kind');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->status = $request->input('asset_status');
        $asset->added_by = Auth()->user()->id;

        $asset->save();

        return redirect('assets')->with('success', 'Asset registered successfully!');

    }

    public function editAsset($id)
    {
        $asset = Asset::where('id', $id)->with('kind')->first();
        $kinds = Kind::all();
        return view('editAsset', compact('asset', 'kinds'));

    }

    public function updateAsset(Request $request)
    {
        $request->validate([
            'asset_number' => 'required|unique:assets',
            'asset_name' => 'required|string',
            'asset_kind' => 'required',
            'asset_status' => 'required',
            'purchase_date' => 'required|date',
        ]);

        $asset = Asset::where('id', $request->input('id'))->first();

        $asset->asset_number = $request->input('asset_number');
        $asset->asset_name = $request->input('asset_name');
        $asset->kind_id = $request->input('asset_kind');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->status = $request->input('asset_status');
        $asset->added_by = Auth()->user()->id;

        $asset->save();

        return redirect('assets')->with('success', 'Asset Updated successfully!');
    }

    public function deleteAsset($id)
    {
        try {
            $asset = Asset::findOrFail($id);

            if ($asset->date_deleted === null) {
                $asset->date_deleted = now();
                $asset->save();
                return redirect('assets')->with('success', 'Asset Deleted successfully!');
            } else {
                return redirect('assets')->with('error', 'Asset is already deleted.');
            }
        } catch (ModelNotFoundException $e) {
            return redirect('assets')->with('error', 'Asset not found.');
        }
    }

    public function deletedAssets()
    {
        $assets = Asset::with('kind')
            ->whereNotNull('date_deleted')
            ->get();

        return view('deletedAssets', compact('assets'));
    }


    public function activateAsset($id)
    {
        try {
            $asset = Asset::findOrFail($id);

            if ($asset->date_deleted !== null) {
                $asset->date_deleted = null;
                $asset->save();
                return redirect('assets')->with('success', 'Asset Activated successfully!');
            } else {
                return redirect('assets')->with('error', 'Asset is already Activated.');
            }
        } catch (ModelNotFoundException $e) {
            return redirect('assets')->with('error', 'Asset not found.');
        }
    }

    public function reports()
    {
       $kinds = Kind::get();

        return view('reports', compact('kinds'));

    }

    public function generateRegisteredAssetsReport()
    {
        $assets = Asset::with('kind')
            ->whereNull('date_deleted')
            ->get();
        $pdf = Pdf::loadView('RegisteredAssetsReport', compact('assets'));
        return $pdf->stream('report.pdf');
    }

    public function generateDeletedAssetsReport()
    {
        $assets = Asset::with('kind')
            ->whereNull('date_deleted')
            ->get();
        $pdf = Pdf::loadView('RegisteredAssetsReport', compact('assets'));
        return $pdf->stream('report.pdf');
    }

}
