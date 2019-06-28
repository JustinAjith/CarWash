@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.change.password.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Current Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="current_password" class="form-control" placeholder="current password">
                                    </div>
                                    @if(session()->has('error'))
                                        <div class="col-sm-10 text-danger">
                                            <small>{{ session()->get('error') }}</small>
                                        </div>
                                    @endif
                                    <small class="col-sm-12 text-danger">{{ $errors->first('current_password') }}</small>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" placeholder="new password">
                                    </div>
                                    <small class="col-sm-12 text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12 control-label">Re-type Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="re-type password">
                                    </div>
                                    <small class="col-sm-12 text-danger">{{ $errors->first('password_confirmation') }}</small>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
