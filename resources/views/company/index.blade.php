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
                        <a href="{{route('dashboard')}}" class="btn btn-primary">View Employees</a>
                    </div>

                    <div class="card mt-2">
                        <div class="card-header">
                          Companies
                        </div>
                        <div class="card-body">
                          <a href="{{route('company.create')}}" class="btn btn-success">Create new Company</a>

                            <div class="card mt-3">
                                <div class="card-header">
                                Companies List
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($companies as $company)
                                                <tr>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->email}}</td>
                                                    <td>
                                                        @if($company->logo)
                                                            <div class="company-logo">
                                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->logo }} Logo" class="img-fluid">
                                                            </div>
                                                        @else
                                                            <p>No logo available</p>
                                                        @endif    
                                                    </td>
                                                    <td>{{$company->website}}</td>
                                                    <td class="d-flex justify-content-around">
                                                        <a href="{{route('company.edit', $company->id)}}" class="btn btn-info">Edit</a>
                                                        <form action="{{route('company.destroy', $company->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="submit" class="btn btn-danger" value="Delete">
                                                        </form>
                                                    </td>
                                                </tr>
                                                
                                            @endforeach
                                            {{ $companies->links() }}
                                        </tbody>
                                        
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
