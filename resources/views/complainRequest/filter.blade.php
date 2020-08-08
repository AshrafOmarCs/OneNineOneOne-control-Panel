@extends('layout.app')


@section('content')

<div class="col-md-6 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Quick Post</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form method="post" action="http://127.0.0.1:8000/complain/Checking" class="form-horizontal">
                    @csrf
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">From</label>
                        <div class="col-lg-10">
                          <input type="date" name="from" class="form-control" id="from">
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">To</label>
                        <div class="col-lg-10">
                        <input type="date" name="to"  class="form-control" id="to">
                        </div>
                      </div>
                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">Status</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="status" >
                                <option value="">- Choose Cateogry -</option>
                                <option value="1">Panding | تحت المراجعة</option>
                                <option value="2">Underproccess | تحت التنفيذ</option>
                                <option value="3">Done | تم </option>
                                <option value="4">Cancelled | تم الالغاء</option>
                            </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-2">departments</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="dept" >
                                <option value="">- Choose department -</option>
                                @foreach($depts as $value)
                                <option value="{{$value->id}}">{{$value->name_en}} | {{$value->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                      </div>

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary">Search</button>
                          <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>


@endsection