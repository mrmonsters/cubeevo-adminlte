
<?php $counter = 1;?>
@foreach($projects as $project)
    <style>
        .leftcontentbackgroundImage_<?php echo $counter;?>{background:{{$project->pri_color_code}} !important;}
    </style>
    <div class="section" style="background: url('{{$project->brandImage->dir}}') no-repeat center center;
            background-size: cover;background-position: center center;"
         ng-init="projects.push(
                     {'label':'{{ (\Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(\Session::get('locale'))->name }}',
                      'client_name': '{{strtoupper($project->translate(\Session::get("locale"))->client_name)}}',}); ">
    </div>
    <?php $counter++;?>
@endforeach