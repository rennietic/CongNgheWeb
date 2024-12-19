<?php


namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index(){
        $data = Issue::with('computer')->paginate(10);
        return view("index",compact("data"));
    }
    public function create(){ 
        $computer = Computer::all();
        return view("create",compact("computer"));
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'computer_name' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required|date|after_or_equal:today',
            'description' => 'required',
            'urgency'=> 'required',
            'status'=> 'required',
        ], [
            'computer_name.required' => 'Vui lòng chọn tên.',
            'reported_by.required' => 'Vui lòng nhập người báo cáo.',
            'reported_date.required' => 'Vui lòng chọn ngày.',
            'reported_date.after_or_equal' => 'Ngày phải từ hôm nay trở đi.',
            'description.required'=> 'Vui lòng nhập mô tả chi tiết.',
            'urgency.required' => 'Vui lòng chọn mức độ sự cố.',
            'status.required'=> 'Vui lòng chọn trạng thái của sự cố.',
        ]);
    
        $computer = Computer::where('computer_name', $request->computer_name)->first();
        if (!$computer) {
            return redirect()->back()->withErrors(['computer_name' => 'Tên máy tính không tồn tại.']);
        }
    
        Issue::create([
            'computer_id' => $computer->id,
            'reported_by' => $request->reported_by,
            'reported_date' => $request->reported_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
    
        return redirect()->route('index')->with('success', 'Thêm thành công!');
    }
    
    public function edit($id){

        $isues = Issue::with('computer')->findOrFail($id);
        $computer_name = Computer::all();
        return view('edit', compact('isues' , 'computer_name'));
    }

    public function update(Request $request,$id){
        // dd($request);
        $validatedData = $request->validate([
            'computer_name' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required|after_or_equal:today',
            'description' => 'required',
            'urgency'=> 'required',
            'status'=> 'required',
            ], [
            'computer_name.required' => 'Vui lòng chọn tên.',
            'reported_by.required' => 'Vui lòng nhập người báo cáo.',
            'reported_date.required' => 'Vui lòng chọn ngày.',
            'date.after_or_equal' => 'Ngày phải từ hôm nay trở đi.',
            'description.required'=> 'Vui lòng nhập mô tả chi tiết',
            'urgency.required' => 'Vui lòng chọn mức độ sự cố.',
            'status.required'=> 'Vui lòng chọn trạng thái của sự cố',
            ]);
            $isues = Issue::find($id);
            $computer_name = Computer::where('computer_name',$request->computer_name)->first();
            $isues->update([
                'computer_id' => $computer_name->id,
                'reported_by' => $request->reported_by,
                'reported_date' => $request->reported_date,
                'description' => $request->description,
                'urgency' => $request->urgency,
                'status'=> $request->status,
           ] );
           return redirect()->route('index')->with('success', 'Cập nhật thành công.');
    }
    public function destroy($id){
        $isues = Issue::find($id);
        $isues->delete();
        return redirect()->route('index')->with('success','Xóa thành công');
    }


}
