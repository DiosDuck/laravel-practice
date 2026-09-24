@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h3>Trash</h3>
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('customers.index') }}" class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('customers.trash') }}">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search anything..." aria-describedby="button-addon2" value="{{ request()->search }}">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('customers.trash') }}" method="GET" class="form-order">
                        <div class="input-group mb-3">
                            <select onchange="submitOrder()" class="form-select" name="order" id="order">
                                <option @selected(request()->order === 'desc') value="desc">Newest to Old</option>
                                <option @selected(request()->order !== 'desc') value="asc">Old to Newest</option>
                            </select>
                        </div>
                    </form>
                </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-bordered" style="border: 1px solid #dddddd">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">BAN</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $customer->first_name }}</td>
                            <td>{{ $customer->last_name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->bank_account_number }}</td>
                            <td>
                                <a href="javascript:;" onclick="submitRestore({{ $customer->id }})" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-file-export"></i></a>
                                <form class="form-restore-{{ $customer->id }}" action="{{ route('customers.restore', $customer->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                </form>
                                <a href="javascript:;" onclick="submitHardDelete({{ $customer->id }})" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash"></i></a>
                                <form class="form-delete-{{ $customer->id }}" action="{{ route('customers.hard-delete', $customer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function submitHardDelete(id) {
            if (!confirm('Are you sure?')) {
                return;
            }
            $('.form-delete-' + id).submit();
        }
        function submitRestore(id) {
            $('.form-restore-' + id).submit();
        }
    </script>
@endpush
