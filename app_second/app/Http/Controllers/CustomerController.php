<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    private const DEFAULT_FILE_PATH = '/assets/images/default-image.png';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::when($request->has('search'), function ($query) use ($request) {
            $search = $request->search;
            $query->where('first_name', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ;
        })->when($request->has('order') && in_array($request->order, ['asc', 'desc']), function ($query) use ($request) {
            $order = $request->order;
            $query->orderBy('created_at', strtoupper($order));
        })
        ->get();

        return view('customer.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->store('', 'public');
            $filePaths = '/uploads/' . $fileName;

            $customer->image = $filePaths;
        }

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.details', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;

        if ($request->hasFile('image')) {
            $this->deleteOldFile($customer->image);

            $image = $request->file('image');
            $fileName = $image->store('', 'public');
            $filePaths = '/uploads/' . $fileName;

            $customer->image = $filePaths;
        }

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index');
    }

    public function trashIndex(Request $request)
    {
        $customers = Customer::onlyTrashed()
            ->when($request->has('search'), function ($query) use ($request) {
                $search = $request->search;
                $query->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('phone', 'LIKE', "%$search%")
                    ;
            })->when($request->has('order') && in_array($request->order, ['asc', 'desc']), function ($query) use ($request) {
                $order = $request->order;
                $query->orderBy('created_at', strtoupper($order));
            })
            ->get()
        ;

        return view('customer.trash', ['customers' => $customers]);
    }

    public function trashRestore(string $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->route('customers.trash');
    }

    public function trashDelete(string $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $this->deleteOldFile($customer->image);
        $customer->forceDelete();

        return redirect()->route('customers.trash');
    }

    private function deleteOldFile(string $filePath)
    {
        if ($filePath === self::DEFAULT_FILE_PATH) {
            return;
        }

        File::delete(public_path($filePath));
    }
}
