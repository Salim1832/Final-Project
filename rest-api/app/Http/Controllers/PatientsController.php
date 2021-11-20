<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        $data = [
            'message' => 'Get all students',
            'data' => $patients
        ];
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        #Validasi
        $request -> validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'status' => 'required'
        ]);

       $input = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date_at' => $request->in_date_at,
            'out_date_at' => $request->out_date_at
        ];
        $patient = Patient::create($input);

        $data = [
            'message' => 'Patient is created',
            'data' => $patient
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $patients = Patient::find($id);

        if ($patients) {
            $data = [
                'message' => 'Get detail patiens',
                'data' => $patients
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Data Not Found',
                'data' => $patients
            ];
            return response()->json($data, 404);
            
        }
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        
        
        if ($patient) {
            $input = [
                'name' => $request->name ?? $patient->name,
                'phone' => $request->phone?? $patient->phone,
                'address' => $request->address ?? $patient->address,
                'status' => $request->status ?? $patient->status,
                'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patient->out_date_at
            ];

           $patient->update($input);
        
            $data = [
                'message' => 'patient is updated',
                'data' => $patient
            ];
            return response()->json($data, 200);
        } 
        else {
            $data = [
                'message' => 'Data Not Found',
                'data' => $patient
            ];
            return response()->json($data, 404);
            
        }
    }

    public function destroy(Request $request, $id)
    {

        $patient = Patient::find($id);
        if ($patient) {
            $input = [
                'name' => $request->name ?? $patient->name,
                'phone' => $request->phone?? $patient->phone,
                'address' => $request->address ?? $patient->address,
                'status' => $request->status ?? $patient->status,
                'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patient->out_date_at
            ];

            $patient->delete($input);

            $data = [
                'message' => 'Patient is deleted',
                'data' => $patient
            ];
            return response()->json($data, 200);
        }else {
            $data = [
                'message' => 'Data Not Found',
                'data' => $patient
            ];
            return response()->json($data, 404);
            
        }
    }

    public function search($name)
    {
        $patient = Patient::where('name', 'like', "%$name%")
        ->get();

        if ($patient) {
            $data = [
                'message' => 'Get searched resource',
                'data' => $patient
            ];
            return response()->json($data, 200);
        }
        else {
            $data = [
                'message' => 'Resource not found',
                'data' => $patient
            ];
            return response()->json($data, 404);
            
        }
    }

    public function positive() {
        $patients = Patient::where('status', "positive")->get();

        if ($patients) {
            $data = [
                'message' => 'Get positive resource',
                'total' => count($patients),
                'data' => $patients
            ];

            return response()->json($data, 200);
        }
    }

    public function recovered() {
        $patients = Patient::where('status', "recovered")->get();

        if ($patients) {
            $data = [
                'message' => 'Get recovered resource',
                'total' => count($patients),
                'data' => $patients
            ];

            return response()->json($data, 200);
        }
    }

    public function dead() {
        $patients = Patient::where('status', "dead")->get();

        if ($patients) {
            $data = [
                'message' => 'Get dead resource',
                'total' => count($patients),
                'data' => $patients
            ];

            return response()->json($data, 200);
        }
    }


    //
}
