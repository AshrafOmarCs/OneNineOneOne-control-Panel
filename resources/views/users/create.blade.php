@extends('layout.app')
@section('content')

<section class="panel">
              <header class="panel-heading">
                Create New User Account 
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="user/create" novalidate="novalidate">
                    @csrf
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="name" minlength="5" type="text" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cemail" type="text" name="phone" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Company name</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="curl" type="text" name="company_name" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Job ID</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="curl" type="text" name="job_id" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="password" minlength="5" type="password" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Re-password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="rePass" minlength="5" type="password" required>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">permessionExpiry <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="permessionExpiry" minlength="5" type="date" required>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">User Type <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="userType" required>
                            <option value="1">Admin</option>
                            <option value="2">Application User</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Depaertment <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control m-bot15" name="dept_id" required>
                            @foreach($departments as $value)
                            <option value="{{$value->id}}">{{$value->name_en}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-default" type="clear">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
  </section>
@endsection