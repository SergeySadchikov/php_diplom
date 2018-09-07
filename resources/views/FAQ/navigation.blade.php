@if($menu)
    <ul class="cd-faq-categories">
        @foreach($menu as $item)
            <li><a href="#{{$item->title}}">{{$item->title}}</a></li>
        @endforeach
    </ul> <!-- cd-faq-categories -->
@endif
