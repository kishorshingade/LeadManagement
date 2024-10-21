<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\FollowUp;
use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

use function Livewire\of;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $customers = Leads::orderBy('id', 'desc')->get();
            if ($customers) {
                return view('leads.index');
            }
        }
        return Response::json(['data' => 'Unauthorized'], 401);
    }
    public function getLeadsTableData(Request $request)
    {
        $data = Leads::when($request->has('search'), function ($query) use ($request) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('requirement', 'like', '%' . $search . '%')
                    ->orWhere('date', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('created_at', 'like', '%' . $search . '%');
            });
        })
            ->orderBy('id', 'desc')
            ->get();


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                $viewUrl = route('leads.show', $row->id);
                $editUrl = route('leads.edit', $row->id);
                $deleteUrl = route('leads.destroy', $row->id);

                return '<a href="' . $viewUrl . '" class="view-link btn btn-info btn-sm mx-2" data-id="' . $row->id . '">View</a>' .
                    '<a href="' . $editUrl . '" class="edit-link btn btn-warning btn-sm mx-2" data-id="' . $row->id . '">Edit</a>' .
                    '<a href="#" class="delete-link btn btn-danger btn-sm delete-customer" data-id="' . $row->id . '" data-route="' . $deleteUrl . '">Delete</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'date' => 'required',
            'status' => 'required',
            'requirement' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $newLead = Leads::create([
            'name' => $request->customer_name,
            'phone' => $request->phone,
            'date' => $request->date,
            'status' => $request->status,
            'requirement' => $request->requirement,
        ]);


        if ($newLead) {
            return response()->json(['status' => true, 'message' => 'Lead Data Added Successfully!', 'redirect_url' => '/leads', 201]);
        }
        return response()->json(['status' => false, 'message' => 'Something Went Wrong!'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    public function edit(string $id)
    {
        $lead = Leads::find($id);
        if (!$lead) {
            return redirect()->route('leads.index');
        }
         $follow_up = $lead->followUps;
        return view('leads.edit', compact('lead', 'follow_up'));
    }

    // public function update(Request $request, string $id)
    // {
    //     $lead = Leads::findOrFail($id);

    //     $validator = Validator::make($request->all(), [
    //         'customer_name' => 'required',
    //         'phone' => 'required|regex:/^[0-9]{10}$/',
    //         'date' => 'required',
    //         'status' => 'required',
    //         'requirement' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
    //     }

    //     $lead->update([
    //         'name' => $request->customer_name,
    //         'phone' => $request->phone,
    //         'date' => $request->date,
    //         'status' => $request->status,
    //         'requirement' => $request->requirement
    //     ]);

    //     if ($request->status === 'Follow Up') {
    //         $followUpData = [
    //             'LeadId' => $lead->id,
    //         ];

    //         foreach (['followUp1', 'followUp2', 'followUp3', 'followUp4', 'followUp5'] as $field) {
    //             if (isset($request->$field)) {
    //                 $followUpData[$field] = $request->$field;
    //             }
    //         }
    //         $existingFollowUp = FollowUp::where('LeadId', $lead->id)->first();

    //         if ($existingFollowUp) {
    //             $existingFollowUp->update($followUpData);
    //         } else {
    //             FollowUp::create($followUpData);
    //         }
    //     } elseif ($request->status === 'Deal Closed') {
    //         Customers::create([
    //             'name' => $lead->name,
    //             'phone' => $lead->phone,
    //             'created_at' => now(),
    //             'updated_at' => now()
    //         ]);

    //         $lead->delete();
    //     }

    //     return response(['status' => true, 'message' => 'Lead Data Updated successfully!', 'redirect_url' => '/brands'], 201);
    // }
    public function update(Request $request, string $id)
    {
        $lead = Leads::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'date' => 'required',
            'status' => 'required',
            'requirement' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 422);
        }

        $lead->update([
            'name' => $request->customer_name,
            'phone' => $request->phone,
            'date' => $request->date,
            'status' => $request->status,
            'requirement' => $request->requirement
        ]);

        if ($request->status === 'Follow Up') {
            // Check if a follow-up entry already exists for the given lead
            $followUp = FollowUp::where('LeadId', $lead->id)->first();

            // Update follow-up data if it exists; otherwise, create a new entry
            if ($followUp) {
                $followUp->update([
                    'followUp1' => $request->followUp1 ?? $followUp->followUp1,
                    'followUp2' => $request->followUp2 ?? $followUp->followUp2,
                    'followUp3' => $request->followUp3 ?? $followUp->followUp3,
                    'followUp4' => $request->followUp4 ?? $followUp->followUp4,
                    'followUp5' => $request->followUp5 ?? $followUp->followUp5
                ]);
            } else {
                FollowUp::create([
                    'LeadId' => $lead->id,
                    'followUp1' => $request->followUp1,
                    'followUp2' => $request->followUp2,
                    'followUp3' => $request->followUp3,
                    'followUp4' => $request->followUp4,
                    'followUp5' => $request->followUp5
                ]);
            }
        } elseif ($request->status === 'Deal Closed') {
            // Move lead information to customers table
            Customers::create([
                'name' => $lead->name,
                'phone' => $lead->phone,
                'services' => $lead->requirement, // Provide the requirement as services
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Delete the lead from leads table
            $lead->delete();
        }

        return response(['status' => true, 'message' => 'Lead Data Updated successfully!', 'redirect_url' => '/brands'], 201);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();

        if (!$user->hasCategory('Admin')) {
            return response()->json(['status' => false, 'message' => 'You are not authorized to delete this Lead .'], 401);
        }

        $leads = Leads::find($id);

        if (!$leads) {
            return response()->json(['status' => false, 'message' => 'Lead Data  not found.'], 404);
        }

        $leads->delete();
        return response()->json(['status' => true, 'message' => 'Lead deleted successfully!'], 200);
    }
}
