/**
 * Created by dell on 2016/8/24.
 */
jQuery( document ).ready(function( $ ) {
    $('#search_btn').click(function(){
        $.ajax({
            type: "GET",
            url: "/search/",
            data: {
                'search':$('input[name=search]').val()
            },
            success:function(data){
                var html = "";
                var href = "";
                //第一个each:index为bijis values为Object Object
                $.each(data,function(index,values){
                    //第二个each:index为所有匹配到的笔记个数 value为Object
                    $.each(values,function(index,value){
                        href = value.id+" /edit";
                        html += "<tr><td>"+value.title+"</td><td><a class='btn btn-sm btn-primary' href='"+href+"'><i class='fa fa-eye'></i>查 看</a></td></tr>";
                    });
                });
                $('.tbody').html(html);
            }
        });
    });

    $('.comment-submit').click(function() {
        var content = $('.txt-commit').val();//获取当前评论内容
        if (content == "") {
            alert("评论内容不能为空!");
        } else {
            $.ajax({
                type: "GET",
                url: "/comment/create",
                dataType: "json",
                data: {
                    'parent_id': $(this).attr("parent_id"), /*上级评论id*/
                    'biji_id': $('input[name=biji_id]').val(),
                    'user_id': $('input[name=user_id]').val(),
                    'content': content,
                    'replyswitch': $('.comment-reply').attr('replyswitch')//获取回复开关锁属性
                },
                success: function (data) {
                    $.each(data.comments, function (index, value) {
                        $(".comment-reply").next().remove();//删除已存在的所有回复div
                        //更新评论总数
                        $(".comment-num").children("span").html(index+1+"条评论");
                        //显示新增评论
                        var newli = "";
                        if(value.parent_id == "0"){
                            //发表的是一级评论时，添加到一级ul列表中
                            newli = "<li comment_id='"+value.id+"'><div><div class='cm'><div class='cm-header'><span> "+data.users+" </span><span>"+value.created_at+"</span></div><div class='cm-content'><p>"+value.comments+"</p></div><div class='cm-footer'><a class='comment-reply' comment_id='"+value.id+"'  href='javascript:void(0);'>回复</a></div></div></div><ul class='children'></ul></li>";
                            $(".comment-ul").prepend(newli);
                        }else{
                            //否则添加到对应的孩子ul列表中
                            newli = "<li comment_id='"+value.id+"'><div ><div class='children-cm'><div  class='cm-header'><span> "+data.users+" </span><span>"+value.created_at+"</span></div><div class='cm-content'><p>"+value.comments+"</p></div><div class='cm-footer'></div></div></div><ul class='children'></ul></li>";
                            $("li[comment_id='"+value.parent_id+"']").children("ul").prepend(newli);
                        }
                    });
                }
            });
        }
    });
    //点击"回复"按钮显示或隐藏回复输入框
    $("body").delegate(".comment-reply","click",function(){
        //添加回复div
        $(".comment-reply").next().remove();//删除已存在的所有回复div
        //添加当前回复div
        var parent_id = $(this).attr("comment_id");//要回复的评论id
        var divhtml = "";
        divhtml = "<div class='div-reply-txt' replyid='2'><div><textarea class='txt-reply form-control' replyid='2'></textarea></div><div style='margin-top:5px;text-align:right;'><a class='comment-submit'  parent_id='"+parent_id+"'> <button class='btn btn-primary'>提交回复</button></a></div></div>";
        $(this).after(divhtml);
    });

    $('.collect').click(function(){
        $.ajax({
            type:'GET',
            url:'/collect/'+$('input[name=user_id]').val(),
            data:{
                'biji_id': $('input[name=biji_id]').val()
            },
            success: function (data) {
                $('.collect').html("已收藏");
                if(data.collect){
                    var d = dialog({
                        title: '提示',
                        content: '收藏笔记成功，请到《我的收藏》查看！',
                        width: 220
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                    }, 3000);
                }else{
                    var d = dialog({
                        title: '提示',
                        content: '不能重复收藏！',
                        width: 220
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                    }, 3000);
                }
            }
        }) ;
    });

    $('.good').click(function(){
        $.ajax({
            type:'GET',
            url:'/good',
            data:{
                'biji_id':$('input[name=biji_id]').val()
            },
            success:function(data){
                $('.good').html("已点赞");
                if(data.good){
                }else{
                    var d = dialog({
                        title: '提示',
                        content: '不能重复点赞！',
                        width: 220
                    });
                    d.show();
                    setTimeout(function () {
                        d.close().remove();
                    }, 3000);
                }
            }

        }) ;
    });

});
