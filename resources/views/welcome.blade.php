@extends('layouts.admin')




@section('content')



    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 content">
                    <div class="card">
                        <div class="card-header card-header-primary">

                            <h4 class=" card-title">Add New Server</h4>

                        </div>
                        <div class="card-body">

                            {!! Form::open(['method' => 'POST','action' => 'ServerController@store']) !!}
                            <div class="row">
                                <div class="form-group bmd-form-group col-md-6">
                                    {!!Form::label('url', 'Name:' ,['class' => 'bmd-label-floating'])!!}
                                    {!!Form::text('url', null , ['class'=>'form-control'])!!}
                                </div>

                                <div class="  form-group bmd-form-group">
                                    {!!Form::submit('Create WatchItem' , ['class'=>'btn btn-primary pull-right'])!!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                              <div class="row">
                                  <div class="offset-md-4 col-md-5">
                                      {!! Form::open(['method' => 'GET','action' => ['ServerController@refresh']]) !!}

                                      {!!Form::submit('Check Now', ['class'=>' btn btn-success'])!!}

                                      {!! Form::close() !!}
                                  </div>

                              </div>



                                    <table class="table col-md-12 ">
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

            </div>


    </div>



@stop
