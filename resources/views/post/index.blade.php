@extends('post.master')
@section('content')
<div id="main" >
<div id="content" >
	     <div class="modal fade" id="remote_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- content will be filled here from "ajax/modal-content/model-content-1.html" -->
                </div>
            </div>
        </div>

	@foreach ($post as $item)
	<!-- row -->
	<div class="row"  >
		<section>
		<div class="col-sm-12 col-lg-12">
			<div class="panel panel-default">

				<div class="panel-body status">
					<div class="col-xs-12 col-sm-12 col-lg-12 padding-10">
						<a href="#" ajax_target="/attach_link/{{ $item->id}}" class="btn btn-success pull-right remote_modal">
							<i class="fa fa-music "></i> {{trans('lang.attach_link')}}
						</a>
					</div>
					<div class="who clearfix">
						<span class="name"><b>{{$item->name}}</b></span>
					</div>
					<div class="text">
						{{$item->body}}
					</div>
					<div class="text" {{ (!empty($item->link_id) ? "" : "style=display:none" ) }}>
						<object data="http://www.youtube.com/embed/{{$item->link_id}}" width="560" height="315"></object>
					</div>
 

					<ul class="links">
						<li>
							<a href="javascript:void(0);" class="like btnlike_{{$item->id}}" data-like="1" data-post="{{$item->id}}"><i class="fa fa-thumbs-o-up"></i>  {{$item->btnlike}}</a>
							<span class="badge countlike_{{$item->id}}"  > {{$item->countlike}}</span>
						</li>
						<li>
							<a href="javascript:void(0);" class="like  btnunlike_{{$item->id}}" data-like="0" data-post="{{$item->id}}"><i class="fa fa-thumbs-o-down"></i> {{$item->btnunlike}}</a>
							<span class="badge countunlike_{{$item->id}}" >  {{$item->countdislike}}</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
		</section>
	</div>

	@endforeach
	</div>
	@endsection
	@section('custom_script')
	<script type="text/javascript">
		$(document).on("click", ".like",function(){
			var id= $(this).data('post');
			$.ajax({
				type: "POST",
				url: '/islike',
				data:{postId: $(this).data('post'),
				isLike: $(this).data('like'),
				_token: '{{ csrf_token() }}',
			},
			success: function( msg ) {
				var obj = JSON.parse(msg);
				$('.countlike_'+ id).html(obj.countlike);
				$('.countunlike_'+id).html(obj.countdislike);
				$('.btnunlike_'+id).html('<i class="fa fa-thumbs-o-down"></i>'+obj.btnunlike);
				$('.btnlike_'+id).html('<i class="fa fa-thumbs-o-up"></i>'+obj.btnlike);

			}
		});

		});
	</script>
	@endsection