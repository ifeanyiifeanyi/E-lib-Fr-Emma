@extends('member.layouts.memberLayout')

@section('title', 'Profile')
@section('css')

@endsection


@section('member')


    <!-- START CONTAINER -->
    <div class="container-padding" style="margin-top: 50px">
        <!-- Start Row -->
        <div class="row mt-5">
            <div class="col-md-12 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-title">
                        Update Profile Details
                        <ul class="panel-tools">
                            <li>
                                <a class="icon minimise-tool"><i class="fa fa-minus"></i></a>
                            </li>
                            <li>
                                <a class="icon expand-tool"><i class="fa fa-expand"></i></a>
                            </li>
                            <li>
                                <a class="icon closed-tool"><i class="fa fa-times"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="input1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="input1" name="name"
                                    value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="input2" class="form-label">Username</label>
                                <input type="text" class="form-control" id="input2" name="username"
                                    value="{{ old('username', $user->username) }}" />
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="input2" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="input2" name="email"
                                    value="{{ old('email', $user->email) }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="input2" class="form-label">Phone NUmber</label>
                                <input type="text" class="form-control" id="input2" name="phone"
                                    value="{{ old('phone', $user->phone) }}" />
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-title">
                        Horizontal Form
                        <ul class="panel-tools">
                            <li>
                                <a class="icon minimise-tool"><i class="fa fa-minus"></i></a>
                            </li>
                            <li>
                                <a class="icon expand-tool"><i class="fa fa-expand"></i></a>
                            </li>
                            <li>
                                <a class="icon closed-tool"><i class="fa fa-times"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input11" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label form-label">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label form-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input122" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label form-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10 checkbox checkbox-primary padding-l-35">
                                    <input id="checkbox103" type="checkbox" checked />
                                    <label for="checkbox103">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- END CONTAINER -->
@endsection

@section('js')

@endsection
