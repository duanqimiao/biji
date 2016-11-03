@extends('circle.layout')
@section('script')

    <script language="JavaScript" src="{{ URL::asset('/') }}js/circle.js" xmlns="http://www.w3.org/1999/html"></script>


    <link type="text/css" href="{{ asset('/css/circle.css') }}" rel="stylesheet"/>

@endsection

@section('content')
    <h3><a style=";color: #666666" href="/circle/">朋友圈</a> <small>» 查看笔记 </small></h3>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">{{ $biji -> title }}</h3>
        </div>
        <div class="panel-body">
            {!! $biji -> content !!}
            <h5>
                发布于: {{ $biji -> published_at }}

                作者: {{ $user->name }}

                <img src="{{ asset('/images/collect.png') }}"><a class="collect">收藏</a>

                <img src="{{ asset('/images/good.png') }}"><a class="good">点赞</a>
            </h5>
            <!-- JiaThis Button BEGIN -->
            <div class="jiathis_style" style="float: right">
                <span class="jiathis_txt">分享到：</span>
                <a class="jiathis_button_tools_1"></a>
                <a class="jiathis_button_tools_2"></a>
                <a class="jiathis_button_tools_3"></a>
                <a class="jiathis_button_tools_4"></a>
                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a>
                <a class="jiathis_counter_style"></a>
            </div>
            <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
            <!-- JiaThis Button END -->
        </div>

    </div>
    {{--评论区--}}
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">评论</h3>
        </div>

        <div class="panel-body">

            <!--发表评论区begin-->
            <div class="comment-filed">
                <div>
                    <div>
                        <textarea replyid="0" class="form-control txt-commit" rows="3"></textarea><br/>
                        <input type="hidden" name="biji_id" value="{{ $biji->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    </div>

                    <div class="div-txt-submit">
                        <a class="comment-submit" parent_id="0"><button class="btn btn-primary">发表评论</button></a>
                    </div>
                </div>
            </div>
            <!--发表评论区end-->

            <!--两级评论列表显示区begin-->
            <div class="comment-filed-list" >
                <div class="comment-num">
                    <span>全部评论</span>
                    <hr/>
                </div>
                <br/><br/>

                <div class="comment-list" >
                    <!--一级评论列表begin-->
                    @foreach($comments as $comment)
                        <ul class="comment-ul">
                            <volist name="commlist" id="data">
                                <li comment_id="{{ $comment->id }}">
                                    <div>
                                        <div class="cm">
                                            <div class="cm-header">
                                                    <span> {{ $comment->user_name }} </span>
                                                <span>{{ $comment->created_at }}</span>
                                            </div>
                                            <div class="cm-content">
                                                <p>
                                                    {{ $comment->comments }}
                                                </p>
                                            </div>
                                            <div class="cm-footer">
                                                <a class="comment-reply" comment_id="{{ $comment->id }}" href="javascript:void(0);">回复</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!--二级评论begin-->
                                    <div style="display: none">{{ $parent_id[] = $comment->id }}</div>
                                    @for($i = 0;$i<count($parent_id);$i++)
                                        {{--获得子评论的资源句柄--}}
                                        <div style="display: none">{{ $children = \App\Comment::where('biji_id',$biji->id)->where('parent_id',$parent_id[$i])->get() }}</div>
                                    @endfor
                                    @foreach($children as $child)
                                    <ul class="children">
                                        <volist name="data.children" id="child" >
                                            <li comment_id="{{ $child->id }}">
                                                <div >
                                                    <div class="children-cm">
                                                        <div  class="cm-header">
                                                            <span>{{ $child->user_name }}</span>
                                                            <span>{{ $child->created_at }}</span>
                                                        </div>
                                                        <div class="cm-content">
                                                            <p>
                                                                {{ $child->comments }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </volist>
                                    </ul>
                                    @endforeach
                                    <!--二级评论end-->
                                </li>
                            </volist>
                        </ul>
                        <!--一级评论列表end-->
                    @endforeach
                </div>
            </div>
            <!--评论列表显示区end-->
        </div>
    </div>
@endsection
