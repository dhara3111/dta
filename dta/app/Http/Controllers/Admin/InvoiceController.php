<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Models\Item;
use App\models\Purchase;
use App\Models\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index(){

        return view('admin.invoice.index');
    }

    public function view($id){

        if(!$invoice = Invoice::find($id)){
            return redirect(route('admin.dashboard.index'));
        }
        $sales = Sales::whereInvoiceId($id)->get();
        $items= Item::get();
        $purchases= Purchase::get();

        return view('admin.invoice.view',[
            'invoice' => $invoice,
            'sales'=>$sales,
            'items'=>$items,
            'purchases'=>$purchases,

        ]);
    }
}
