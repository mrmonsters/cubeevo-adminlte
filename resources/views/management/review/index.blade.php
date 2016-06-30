@extends('app')

@section('htmlheader_title')
    Career Review
@endsection

@section('contentheader_title')
    Career Review
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary" ng-controller="ReviewIndexCtrl" ng-init="init()">
                <div class="box-header with-border">
                    <h3 class="box-title">Career Review Index</h3>
                    <div class="pull-right">
                        <a href="{{ url('admin/manage/job-review/create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Qualification</th>
                            <th>Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr ng-repeat="reviewer in reviewers | orderBy: 'date'">
                                <td>@{{ reviewer.id }}</td>
                                <td>@{{ reviewer.name }}</td>
                                <td>@{{ reviewer.qualification }}</td>
                                <td>@{{ reviewer.date }}</td>
                                <td>
                                    <a href="{{ url('admin/manage/job-review/edit') }}/@{{ reviewer.id }}" class="btn btn-default">Edit</a>
                                    <button type="button" class="btn btn-danger" ng-click="delReviewer(reviewer)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p ng-show="reviewers.length < 1" class="text-center">No reviewers.</p>
                </div>
            </div>
        </div>
    </div>
@endsection