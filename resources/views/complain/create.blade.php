@extends('layout.app')


@section('content')


<section class="panel">
              <header class="panel-heading">
                Create New Complain catogary
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="http://127.0.0.1:8000/compy/store" novalidate="novalidate">
                    @csrf
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Name Ar <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="name" minlength="5" type="text" required="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2">Name En <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="cemail" type="text" name="name_en" required="">
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