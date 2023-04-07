<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee\attendance;

use App\AttendanceInfo;
use App\AttendanceDetails;
use App\EmployeeInfo;
use App\Menu;
use DB;
use Session;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
       
        $this->middleware(function ($request, $next) {
            logout_redirect();
            common_helper();
            return $next($request);
        });
    }
     public function index($id=0)
    { 
        if ($id==0) {
            $info_data= [];
            $datashow       = EmployeeInfo::where('row_status','1')->get();
        }else{
            $datashow       = EmployeeInfo::select('employee_infos.*','attendance_details.attendance_status')->leftJoin('attendance_details', function($join) use ($id) {
                $join->on('attendance_details.emp_id', '=', 'employee_infos.id');
                $join->on('attendance_details.attendance_info_id', '=', DB::raw($id));
               
            })->where('row_status','1')->get();

            $info_data=AttendanceInfo::find($id);

        }
        // $dataAtndc = AttendanceInfo::all();
        $dataAtndc=AttendanceInfo::select(DB::raw("attendance_infos.*, ELT(attendance_infos.row_status, 'Prepared', 'Approved') as row_status"))
            ->orderBy('attendance_infos.id','ASC')
            ->get(); 

        return view('employee.attendance',compact('datashow','dataAtndc','id','info_data'));
        //
    }




    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'attendance_date'     => 'required',
        ], [
            'attendance_date.required'    => 'Date is required',
        ]);

        DB::beginTransaction();
        try {
            if ($request->row_id) {
                $data = AttendanceInfo::find($request->row_id);
                $attendance_info_id=$request->row_id;

                AttendanceDetails::where('attendance_info_id',$request->row_id)->delete();
                $message = 'Update Success';

            }else {
                $data = new AttendanceInfo;
                $message = 'Save Success';

            }

            $data->attendance_date = $request->attendance_date;
            $data->attendance_comment = $request->attendance_comment; 
            $data->row_status = $request->row_status;
            $data->save();
            if (!$request->row_id) {
                $attendance_info_id=$data->id;
            }

            $emp_id_arr = $request->emp_id;
            $attendance_status_arr = $request->attendance_status;


            foreach($emp_id_arr as $key => $v) {
                $rows[$key]['attendance_info_id']     = $attendance_info_id;
                $rows[$key]['emp_id']    = $emp_id_arr[$key];
                $rows[$key]['attendance_status']   = $attendance_status_arr[$key];
                 
            }
            DB::table('attendance_details')->insert($rows);

          
            DB::commit();

            if ($request->row_id) { 
                return redirect('attendance')->with('success', $message);
            }else{

                return back()->with('success', $message);
            }
            // return redirect('/_dwrm_l')->with('success', $message);
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return back()->with('success',$message);
            // return redirect('/_dwrm_l')->with('error', "Something went wrong");
        }



       
    }

   public function edit($id)
    {
        $get_data=AttendanceInfo::find($id);
        $info_id= $get_data->id;
        $detail_edit=AttendanceDetails::where('attendance_info_id',$info_id)->get();
        return response()->json(['row_data' => $get_data,'data_detail' => $detail_edit],200);


    }

    public function attendanceView($id){
        $attendance_info_id = $id ? : 0;

        // $listn = DB::table('role_setup_details as rsd')
        $attendance_info_id = $id; 
          
         $empl_info       = EmployeeInfo::select('employee_infos.*','attendance_details.attendance_status')->leftJoin('attendance_details', function($join) use ($id) {
                $join->on('attendance_details.emp_id', '=', 'employee_infos.id');
                $join->on('attendance_details.attendance_info_id', '=', DB::raw($id));
               
            })->where('row_status','1')->get();

            $info_data=AttendanceInfo::find($id);

        $info_data=AttendanceInfo::find($attendance_info_id);
        // return $empl_info;


 

        // return response()->json(['empsDList' => $empl_info ],200);
        

        return view('employee.attendanceView',compact('empl_info','info_data'));

    }



   public function attendanceRemove ($id)
    {
        
        DB::beginTransaction();
        try {
            $delete_row=AttendanceInfo::find($id);
            $delete_row->delete(); 
            $detail_edit=AttendanceDetails::where('attendance_info_id',$id)->delete();
            return back()->with('success','Delete Success');
            DB::commit();
        }
        catch (\Exception $e) {

            return back()->with('error','Delete Faild');
            DB::rollback();
            throw $e;
        }
        catch (\Throwable $e) {
            
            return back()->with('error','Delete Faild');
            DB::rollback();
            throw $e;
        }   
    
         
    }
}
