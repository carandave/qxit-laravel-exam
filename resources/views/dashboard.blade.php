<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in11!") }} --}}
                    <div class="d-flex justify-content-end">
                        <a href="{{route('company.index')}}" class="btn btn-primary">View Companies</a>
                    </div>
                    
                    
                    <div class="card mt-2">
                        <div class="card-header">
                          Employees
                        </div>
                        <div class="card-body">
                          <a href="{{route('employee.create')}}" class="btn btn-success">Create new Employee</a>

                            <div class="card mt-3">
                                <div class="card-header">
                                Employees List
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <table class="table table-bordered mt-2">
                                        <thead>
                                          <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{$employee->first_name}}</td>
                                                    <td>{{$employee->last_name}}</td>
                                                    <td>{{$employee->company->name ?? 'N/A' }}</td>
                                                    <td>{{$employee->email}}</td>
                                                    <td>{{$employee->phone}}</td>
                                                    <td class="d-flex justify-content-around">
                                                        <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-info">Edit</a>
                                                        
                                                        <form action="{{route('employee.destroy', $employee->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="submit" class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            
                                        </tbody>
                                        {{ $employees->links() }}
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
