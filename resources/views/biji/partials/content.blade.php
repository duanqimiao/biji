
<form method="POST" action="{{ url('/biji/'.$list->id) }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input type="hidden" name="_method" value="PUT"/>

    <div style="float: right;position: relative">
        <input type="submit" value="保存修改" class="btn btn-success" />
    </div>
    <!-- Single button -->

    <div class="btn-group" style="float: right;margin-right:5px;">
        <button type="button" class="btn btn-default">共享</button>
        <button style="height: 34px;" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="{{ url('/mail/'.$list->id) }}">发送邮件</a></li>
            <li><a href="{{ url('/circle/'.$list->id) }}">发表至笔友圈</a></li>
        </ul>

    </div>
    <br/><br/>

    <div class="input-group">
        <span class="input-group-addon">标题</span>
        <input type="text" class="form-control"  aria-describedby="basic-addon2" value="{{ $list->title }}">
    </div>

    <br/>
    <div style="overflow-y: auto;overflow-x: hidden;max-height: 460px;min-height:460px;width: 100%">
        <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain" >{!! $list->content !!}</script>
    </div>
</form>
