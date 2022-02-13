@push('module-actions')
    <div class="text-right">
        @if(isset($actionButtons))
            @foreach ($actionButtons as $item)
                @if(!isset($item['url']))
                    <button id="{{$item['id'] ?? rand()}}" class="btn btn-sm {{isset($item['color']) ? 'btn-' . $item['color'] : 'btn-primary action-custom-button'}}">@if(isset($item['icon'])) <i class="{{$item['icon']}}"></i> @endif {{$item['name']}}</button>
                @else
                    <a href="{{$item['url']}}" id="{{$item['id'] ?? rand()}}" class="btn btn-sm {{isset($item['color']) ? 'btn-' . $item['color'] : 'btn-primary action-custom-button'}}">@if(isset($item['icon'])) <i class="{{$item['icon']}}"></i> @endif {{$item['name']}}</a>
                @endif
            @endforeach
        @endif
    </div>
@endpush
