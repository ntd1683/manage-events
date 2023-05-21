<x-layouts.master>

    <!-- BEGIN gallery-content-container -->
    <div class="gallery-content-container">
        <!-- BEGIN scrollbar -->
        <div data-height="100%">
            <!-- BEGIN gallery-content -->
            <div class="gallery-content">
                @foreach($media_type as $type)
                    <!-- BEGIN gallery -->
                    <div class="gallery">
                        <!-- BEGIN gallery-header -->
                        <div class="d-flex align-items-center mb-3">
                            <!-- BEGIN gallery-title -->
                            <div class="gallery-title mb-0">
                                <div>
                                    {{ $type }} <i class="fa fa-chevron-right"></i>
                                </div>
                            </div>
                            <!-- END gallery-title -->
                            <!-- BEGIN btn-group -->
                            <div class="ms-auto btn-group">
                                <a href="#" class="btn btn-outline-default btn-sm"><i class="fa fa-play"></i></a>
                                <a href="#" class="btn btn-outline-default btn-sm"><i class="fa fa-plus"></i></a>
                                <a href="#" class="btn btn-outline-default btn-sm"><i class="fa fa-upload"></i></a>
                            </div>
                            <!-- END btn-group -->
                        </div>
                        <!-- END gallery-header -->

                        <!-- BEGIN gallery-image -->
                        <div class="gallery-image">
                            <ul class="gallery-image-list">
                                @foreach ($media as $data)
                                    @if($data->type === $type)
                                        <li>
                                            <a>
                                                <img src="{{ Storage::url($data->url) }}" alt="{{ $data->name }}" class="img-portrait" />
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <!-- END gallery-image -->
                    </div>
                    <!-- END gallery -->
                @endforeach
            </div>
            <!-- END gallery-content -->
        </div>
        <!-- END scrollbar -->
    </div>
    <!-- END gallery-content-container -->
</x-layouts.master>
