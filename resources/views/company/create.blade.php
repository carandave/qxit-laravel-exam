<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in11!") }} --}}

                    <div class="card">
                        <div class="card-header">
                          Create Company
                        </div>
                        <div class="card-body px-5">

                            
                            
                            <form action="{{route('company.insert')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">

                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('name') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <label for="exampleInputPassword1">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Logo <span class="text-danger">*</span></label>
                                            <input type="file" name="logo" class="form-control">
                                            @if ($errors->has('logo'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('logo') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Website <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="website" id="exampleInputPassword1" placeholder="Enter Website">
                                            @if ($errors->has('website'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('website') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
