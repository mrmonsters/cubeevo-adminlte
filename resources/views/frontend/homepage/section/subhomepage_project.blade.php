
<?php $counter = 1;?>
@foreach($sub_homepage_projects as $project)
    <div class="section" id="section{{$counter}}" style="background: url('{{$project->brandImage->dir}}') no-repeat center center;
            background-size: cover;background-position: center center;"
         ng-init="projects.push(
                     {'label':'{{ (\Session::get('locale') == 'en') ? mb_strtoupper($project->translate(Session::get('locale'))->name) : $project->translate(\Session::get('locale'))->name }}',
                      'client_name': '{{strtoupper($project->translate(\Session::get("locale"))->client_name)}}',}); ">

        <style>
            .leftcontentbackgroundImage_<?php echo $counter;?>{background:{{$project->pri_color_code}} !important;}
        </style>

    </div>
    <?php $counter++;?>
@endforeach