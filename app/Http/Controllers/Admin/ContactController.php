<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct() {
        $products = Product::all();
        view()->share('products',$products);
    }

    public function index() {
        return view('front.contact');
    }

    public function list() {
        return view('admin.contacts.index');
    }

    public function fetch() {
        $contact = Contact::query();
        return DataTables::of($contact)
            ->editColumn('message', function ($contact) {
                return strip_tags(Str::limit($contact->message,50));
            })
            ->addColumn('status', function ($contact) {
                if ($contact->status == 0) {
                    return '<a onclick="check(' . $contact->id . ')" class="btn btn-info" ><i class="fas fa-check-to-slot"></i> &nbspOnayla</a>';
                }
                else {
                    return '<a onclick="uncheck(' . $contact->id . ')" class="btn btn-success" ><i class="fa-regular fa-circle-check"></i> &nbspOnaylandı</a>';
                }
            })
            ->addColumn('delete', function ($contact) {
                return '<a class="btn btn-danger" onclick="contactsDelete(' . $contact->id . ')"><i class="fas fa-trash"></i> Sil</a>';

            })
            ->rawColumns(['message','status', 'delete'])
            ->make();
    }

    public function check(Request $request) {
        $contact = Contact::find($request->id);
        $contact->status = 1;
        $contact->save();
    }

    public function uncheck(Request $request) {
        $contact = Contact::find($request->id);
        $contact->status = 0;
        $contact->save();
    }

    public function createIndex() {

    }
    public function createPost(Request $request) {
        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->surname = $request->surname;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        toastr()->success('İletişim Başarıyla Gönderildi.', 'Başarılı');
        return redirect()->route('contact');
    }

    public function updateIndex() {

    }
    public function updatePost() {

    }

    public function delete(Request $request) {
        $contact = Contact::find($request->id);
        $contact->delete();
        return response()->json(['Success' => 'success']);
    }
}
