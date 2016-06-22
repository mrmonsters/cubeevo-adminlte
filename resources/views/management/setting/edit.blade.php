@extends('app')

@section('htmlheader_title')
	Setting Management
@endsection

@section('contentheader_title')
	Setting Management
@endsection

@section('contentheader_description')
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Settings</h3>
                </div>
                <form method="POST" action="{{ url('manage/setting/update') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                    <input name="_method" type="hidden" value="PUT" />
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#site" data-toggle="tab">Site</a></li>
                                <li><a href="#user" data-toggle="tab">User</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="site" class="tab-pane active">
                                    <div class="form-group">
                                        <label for="ga_key" class="control-label">{{ $settings['ga_key']['name'] }}</label>
                                        <input id="ga_key" name="ga_key" type="text" class="form-control" value="{{ $settings['ga_key']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="gmaps_lat" class="control-label">{{ $settings['gmaps_lat']['name'] }}</label>
                                        <input id="gmaps_lat" name="gmaps_lat" type="text" class="form-control" value="{{ $settings['gmaps_lat']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="gmaps_lng" class="control-label">{{ $settings['gmaps_lng']['name'] }}</label>
                                        <input id="gmaps_lng" name="gmaps_lng" type="text" class="form-control" value="{{ $settings['gmaps_lng']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="site_title" class="control-label">{{ $settings['site_title']['name'] }}</label>
                                        <input id="site_title" name="site_title" type="text" class="form-control" value="{{ $settings['site_title']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keyword" class="control-label">{{ $settings['meta_keyword']['name'] }}</label>
                                        <input id="meta_keyword" name="meta_keyword" type="text" class="form-control" value="{{ $settings['meta_keyword']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_desc" class="control-label">{{ $settings['meta_desc']['name'] }}</label>
                                        <input id="meta_desc" name="meta_desc" type="text" class="form-control" value="{{ $settings['meta_desc']['value'] }}" />
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                @if (!empty($settings['meta_img_id']['img_dir']))
                                                    <img id="meta_img" src="{{ $settings['meta_img_id']['img_dir'] }}" alt="{{ $settings['meta_img_id']['img_dir'] }}" class="img-thumbnail" width="100%" />
                                                @else
                                                    <p class="text-center">Image is not available.</p>
                                                @endif
                                                <div class="caption" style="text-align: center;">
                                                    <p><strong>{{ $settings['meta_img_id']['name'] }}</strong></p>
                                                    <input type="file" class="form-control" id="new_meta_img_id" name="new_meta_img_id" />
                                                    <input type="hidden" id="meta_img_id" name="meta_img_id" class="form-control" value="{{ $settings['meta_img_id']['value'] }}" />
                                                    <a href="#" class="btn btn-block btn-default" role="button" data-toggle="modal" data-target="#modal-upload">Use Existing</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="user" class="tab-pane">
                                    <div class="form-group">
                                        <label for="address" class="control-label">{{ $settings['address']['name'] }}</label>
                                        <textarea id="address" name="address" class="form-control" row="3">{{ $settings['address']['value'] }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone" class="control-label">{{ $settings['phone']['name'] }}</label>
                                        <input id="phone" name="phone" type="text" class="form-control" value="{{ $settings['phone']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="fax" class="control-label">{{ $settings['fax']['name'] }}</label>
                                        <input id="fax" name="fax" type="text" class="form-control" value="{{ $settings['fax']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">{{ $settings['email']['name'] }}</label>
                                        <input id="email" name="email" type="text" class="form-control" value="{{ $settings['email']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="facebook_link" class="control-label">{{ $settings['facebook_link']['name'] }}</label>
                                        <input id="facebook_link" name="facebook_link" type="text" class="form-control" value="{{ $settings['facebook_link']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="youtube_link" class="control-label">{{ $settings['youtube_link']['name'] }}</label>
                                        <input id="youtube_link" name="youtube_link" type="text" class="form-control" value="{{ $settings['youtube_link']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="instagram_link" class="control-label">{{ $settings['instagram_link']['name'] }}</label>
                                        <input id="instagram_link" name="instagram_link" type="text" class="form-control" value="{{ $settings['instagram_link']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="twitter_link" class="control-label">{{ $settings['twitter_link']['name'] }}</label>
                                        <input id="twitter_link" name="twitter_link" type="text" class="form-control" value="{{ $settings['twitter_link']['value'] }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="google_plus_link" class="control-label">{{ $settings['google_plus_link']['name'] }}</label>
                                        <input id="google_plus_link" name="google_plus_link" type="text" class="form-control" value="{{ $settings['google_plus_link']['value'] }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="modal-upload">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal">Choose from existing image collection</h4>
                </div>
                <div class="modal-body" style="max-height: 450px; overflow-y: auto;">
                    <?php $count = 0; ?>
                    <?php $images = \App\Models\Files::where('delete', '=', false)->where('status', \App\Models\Status::ACTIVE)->get(); ?>
                    @foreach ($images as $image)
                    <?php $count++; ?>
                    @if ($count % 4 == 1)
                    <div class="row">
                    @endif
                        <div class="col-xs-6 col-md-3">
                            <button class="thumbnail" data-dismiss="modal" onclick="selectImg({{ $image->id }}, '{{ $image->dir }}')">
                                <img src="{{ $image->dir }}" alt="{{ $image->name }}">
                            </button>
                        </div>
                    @if (($count % 4 == 0) || ($count == $images->count()))
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addon-script')
    <script type="text/javascript">
    function selectImg(imgId, imgSrc)
    {
        $('#meta_img_id').val(imgId);
        $('#meta_img').attr('src', imgSrc);
    }
    </script>
@endsection