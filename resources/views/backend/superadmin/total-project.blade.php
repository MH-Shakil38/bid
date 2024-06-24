@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Search by title</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Search by Date</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Search by Status</label>
                                        <select class="form-control custom-select" name="status">
                                            <option disabled selected>All</option>
                                            @forelse(bid_status() as $bid)
                                                <option value="{{$bid['id']}}">{{$bid['name']}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h4>Projects</h4>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Projects Name</th>
                                <th class="border-top-0">Contract</th>
                                <th class="border-top-0">Budget</th>
                                <th class="border-top-0">Bid Closing Time</th>
                                <th class="border-top-0">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($projects as $info)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                <a class="btn btn-circle btn-danger text-white">EA</a>
                                            </div>
                                            <div class="">
                                                <h4 class="m-b-0 font-16">{{$info->title}}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <label class="label label-danger">{{$info->contract}}</label>
                                    </td>
                                    <td>
                                        <span class="text-muted">min:${{$info->min_price}}, Max: ${{$info->max_price}} </span>
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($info->bid_end)->format('d-M-Y h\h :i\m a')}}
                                    </td>
                                    <td>
                                        <a href="{{route('view.project-details',$info->id)}}">
                                            {!! status($info->status)  !!}
                                        </a>
                                        <a href="{{route('projects.edit',$info->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
