@extends('layout.app')


@section('content')
<section class="panel">
              <header class="panel-heading">
                Create New User Account 
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="http://127.0.0.1:8000/updateUser/{{$data[0]->id}}" novalidate="novalidate">
                    @csrf
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="name" minlength="5" value="{{$data[0]->name}}" type="text" required="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Phone <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cemail" type="text"  value="{{$data[0]->phone}}" name="phone" required="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Company name</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="curl" type="text"  value="{{$data[0]->companyName}}" name="company_name">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Job ID</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="curl" type="text" value="{{$data[0]->job_id}}" name="job_id">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="password" minlength="5" type="password" required="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Re-password <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="rePass" minlength="5" type="password" required="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">permession Expiry <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="subject" name="permessionExpiry" value="{{$data[0]->permessionExpiry}}" minlength="5" type="date" required="">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Save</button>
                        
                      </div>
                    </div>
                  </form>
                </div>

              </div>
  </section>

@endsection