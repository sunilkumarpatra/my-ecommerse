<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Customer::all();
        return view('admin/customer',$result);
    }

    public function status(Request $request,$status,$id){
        config(['app.timezone' => 'Asia/Kolkata']);
        $model=Customer::find($id);
        $model->status=$status;
        $model->updated_at = Carbon::now();
        $model->save();
        $request->session()->flash('message','Customer status updated');
        return redirect('admin/customer');
    }

    public function show(Request $request, $id='')
    {
        //echo "Show"; die();
        $arr=Customer::where(['id' => $id]) -> get();
        $result['customer_list']=$arr['0'];
        //print_r($result['customer_list']);die();
        return view('admin/show_customer',$result);
    }
}