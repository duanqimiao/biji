@extends('circle.layout')
@section('content')
    <h3><a style=";color: #666666" href="/circle/">朋友圈</a> <small>» 我的分享 </small></h3>
    @include('partials.success')
    <table id="bijis-table" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>标 题</th>
            <th data-sortable="false">操 作</th>
        </tr>
        </thead>
        <tbody class="tbody">
        @foreach($shares as $share)
            <tr>
                <td>{{ $share->title }}</td>
                <td>
                    <a href="{{ URL::to('circle/'. $share->id . '/edit') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>查 看
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                        <i class="fa fa-times-circle"></i>
                        删除
                    </button>
                    {{-- 确认删除 --}}
                    <div class="modal fade" id="modal-delete" tabIndex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        ×
                                    </button>
                                    <h4 class="modal-title">提示</h4>
                                </div>
                                <div class="modal-body">
                                    <p class="lead">
                                        <i class="fa fa-question-circle fa-lg"></i>
                                        您确定不再分享笔记{{ $share->title }}?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ url('/share/'.$share->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-times-circle"></i> Yes
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection