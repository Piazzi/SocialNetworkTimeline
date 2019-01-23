@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Timeline</h1>
@stop

@section('content')
    <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{{Auth::user()->name}}</h3>
            <h5 class="widget-user-desc">{{Auth::user()->description}}</h5>
        </div>
        <div class="widget-user-image">
            <img class="img-circle" src="/css/profile.jpeg" alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{Auth::user()->followers}}</h5>
                        <span class="description-text">Followers</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{{Auth::user()->created_at}}</h5>
                        <span class="description-text">Member Since</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">Posts</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>

    @foreach($posts as $post)
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="/css/profile.jpeg" alt="User Image">
                    <span class="username"><a href="#">{{$post->user->name}}</a></span>
                    <span class="description">Shared publicly - {{$post->created_at}}</span>
                </div>
                <!-- /.user-block -->
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title=""
                            data-original-title="Mark as read">
                        <i class="fa fa-circle-o"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h3>{{$post->title}}</h3>
                <!-- post text -->
                <p>{{$post->description}}</p>

                <!-- Attachment -->
                <div class="attachment-block clearfix">
                    <img class="attachment-img" src="/css/profile.jpeg" alt="Attachment Image">

                    <div class="attachment-pushed">
                        <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a>
                        </h4>

                        <div class="attachment-text">
                            Description about the attachment can be placed here.
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                        </div>
                        <!-- /.attachment-text -->
                    </div>
                    <!-- /.attachment-pushed -->
                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                <span class="pull-right text-muted">{{$post->likes}} - 2 comments</span>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
                @foreach($post->comments as $comment)
                <div class="box-comment">
                    <!-- User image -->
                    <img class="img-circle img-sm" src="/css/profile.jpeg" alt="User Image">

                    <div class="comment-text">
                      <span class="username">
                        {{$comment->user->name}}
                        <span class="text-muted pull-right">{{$comment->created_at}}</span>
                      </span><!-- /.username -->
                       {{$comment->description}}
                    </div>
                    <!-- /.comment-text -->
                </div>
                <!-- /.box-comment -->
                @endforeach
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
                <form action="#" method="post">
                    <img class="img-responsive img-circle img-sm" src="/css/profile.jpeg" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                    </div>
                </form>
            </div>
            <!-- /.box-footer -->
        </div>
    @endforeach
@stop