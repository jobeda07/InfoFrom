<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformationForm;
use Illuminate\Support\Facades\File;

class InfoFormController extends Controller
{
    public function Form(){
        $info=InformationForm::all();
        return view('InfoForm',compact('info'));
    }
    public function FormStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
        ]);
        
        $fileName=null;
        if($request->hasFile('image')){
            $fileName='infopicture'.'_'.date('ymhmsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads/infopicture',$fileName);}
        InformationForm::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$fileName,
            'gender'=>$request->gender,
            'skill'=>json_encode($request->skill),
        ]);
        $request->session()->flash('success', 'Form Submitted successfully!');

        return back();
            
    }
    public function EditForm($id){

        $Editdata=InformationForm::find($id);
        $info=InformationForm::all();
        return view('InfoForm',compact('Editdata','info'));
    }
    public function UpdateForm(Request $request ,$id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required',
        ]);
         $Editdata=InformationForm::find($id);
        $info=InformationForm::all();
        $fileName=$Editdata->image;
        if($request->hasFile('image')){
           $removefile=public_path().'/uploads/infopicture/'.$fileName;
           File::delete($removefile);
           $fileName='infopicture'.'_'.date('ymdhmsis').'.'.$request->file('image')->getClientOriginalExtension();
           $request->file('image')->storeAs('/uploads/infopicture/',$fileName);
        }
        $Editdata->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$fileName,
            'gender'=>$request->gender,
            'skill'=>json_encode($request->skill),
        ]);
        return redirect()->route('Form')->with(compact('info'));
    }
    public function DeleteForm($id){
        $info=InformationForm::all();
        $data=InformationForm::find($id);
        $fileName=$data->image;
        $removefile=public_path().'/uploads/infopicture/'.$fileName;
        File::delete($removefile);
        InformationForm::find($id)->delete();
        return redirect()->route('Form')->with(compact('info'));
}
}
