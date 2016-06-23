<!-- Modal -->
<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="modal-upload">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal">Choose from existing images</h4>
            </div>
            <div class="modal-body" style="max-height: 450px; overflow-y: auto;">
                @if (!empty($files))
                    <ul>
                        @foreach ($files as $file)
                            <li><button type="button" class="btn btn-xs btn-default" onclick="selectImg({{ $file['id'] }}, '{{ $file['dir'] }}')">Select</button> <a href="{{ url($file['dir']) }}" target="_blank">{{ $file['name'] }}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p>No image is available.</p>
                @endif
            </div>
        </div>
    </div>
</div>