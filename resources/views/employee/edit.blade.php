<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in11!") }} --}}

                    

                    <div class="card">
                        <div class="card-header">
                          Edit Employee
                        </div>
                        <div class="card-body px-5">

                            <form action="{{route('employee.update', $employee->id)}}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name">

                                            @if ($errors->has('first_name'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('first_name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="exampleInputPassword1">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}" id="exampleInputPassword1" placeholder="Enter Last Name">
                                            @if ($errors->has('last_name'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('last_name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Company <span class="text-danger">*</span></label>
                                            <select class="form-control " name="company_id" >
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                                        {{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('company_id'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('company_id') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" value="{{$employee->email}}" id="exampleInputPassword1" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Phone <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" value="{{$employee->phone}}" id="exampleInputPassword1" placeholder="Enter Phone">
                                            @if ($errors->has('phone'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('phone') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Update</button>
                              </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
