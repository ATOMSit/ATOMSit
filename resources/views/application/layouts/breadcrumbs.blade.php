@if(count($breadcrumbs))
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                ATOMSit
            </h3>
            <span class="kt-subheader__separator kt-hidden">
        </span>
            <div class="kt-subheader__breadcrumbs">
                @foreach($breadcrumbs as $breadcrumb)
                    @if ($breadcrumb->url && !$loop->last)
                        @if($loop->first)
                            <a href="{{ $breadcrumb->url }}" class="kt-subheader__breadcrumbs-home">
                                <i class="flaticon2-shelter"></i>
                            </a>
                        @else
                            <span class="kt-subheader__breadcrumbs-separator"></span>
                            <a href="{{ $breadcrumb->url }}" class="kt-subheader__breadcrumbs-link">
                                {{ $breadcrumb->title }}
                            </a>
                        @endif
                    @else
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a class="kt-subheader__breadcrumbs-link">
                            {{ $breadcrumb->title }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif