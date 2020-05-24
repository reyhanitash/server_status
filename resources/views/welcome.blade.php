@extends('layouts.admin')




@section('content')



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 content">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">اضافه کردن server</h4>
                        </div>
                        <div class="card-body">

                            {!! Form::open(['method' => 'POST','action' => 'ServerController@store']) !!}
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    {!!Form::label('url', 'Name:' ,['class' => 'bmd-label-floating'])!!}
                                    {!!Form::text('url', null , ['class'=>'form-control'])!!}
                                </div>

                                <div class="form-group bmd-form-group">
                                    {!!Form::submit('Create WatchItem' , ['class'=>'btn btn-primary pull-right'])!!}
                                </div>
                                {!! Form::close() !!}

                                    <table class="table">
                                        <thead class=" text-primary">
                                        <tr><th>
                                                ID
                                            </th>
                                            <th>
                                                name
                                            </th>
                                            <th>
                                               status
                                            </th>
                                            <th>
                                               uptime/downtime
                                            </th>
                                            <th>
                                              last check
                                            </th>

                                        </tr></thead>
                                        <tbody>
                                        @if('$servers')
                                            @foreach($servers as $server)

                                                <tr>
                                                    <td>
                                                        {{$server->id}}
                                                    </td>
                                                    <td>
                                                        {{$server->url}}
                                                    </td>
                                                    @if($server->uptime_status == 'up')
                                                    <td class="text-success">
                                                        {{$server->uptime_status}}
                                                    </td>
                                                    <td dir="ltr" class="text-success">

                                                        {{  \Carbon\Carbon::parse($server->uptime_status_last_change_date)->diffForHumans()}}
                                                    </td>
                                                    @endif
                                                    @if($server->uptime_status == 'down')
                                                        <td class="text-danger">
                                                            {{$server->uptime_status}}
                                                        </td>
                                                        <td dir="ltr" class="text-danger">

                                                            {{  \Carbon\Carbon::parse($server->uptime_status_last_change_date)->diffForHumans()}}
                                                        </td>
                                                    @endif
                                                    <td dir="ltr" class="text-info">
                                                        {{\Carbon\Carbon::parse($server->uptime_last_check_date)->diffForHumans()}}
                                                    </td>

                                                    <td >
                                                        {!! Form::open(['method' => 'DELETE','action' => ['ServerController@destroy', $server->id]]) !!}

                                                        <div class="form-group">
                                                            {!!Form::submit('delete server', ['class'=>'btn btn-danger'])!!}
                                                        </div>

                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>

                                                @endforeach

                                        @endif

                                        </tbody>
                                    </table>


                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">
                            <div class="ct-chart" id="dailySalesChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">فروش روزانه</h4>
                            <p class="card-category">
                    <span class="text-success">
                      <i class="fa fa-long-arrow-up"></i> 55% </span> رشد در فروش امروز.</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> ۴ دقیقه پیش
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-warning">
                            <div class="ct-chart" id="websiteViewsChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">دنبال کننده‌های ایمیلی</h4>
                            <p class="card-category">کارایی آخرین کمپین</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> کمپین دو روز پیش ارسال شد
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-chart">
                        <div class="card-header card-header-danger">
                            <div class="ct-chart" id="completedTasksChart"></div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">وظایف انجام شده</h4>
                            <p class="card-category">کارایی آخرین کمپین</p>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">access_time</i> کمپین دو روز پیش ارسال شد
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div>
    </div>



@stop
