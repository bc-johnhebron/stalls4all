<div class="panel-body">
    <ul>
        <li><a href="locations/{{$location->id}}">{{ $location->name }}</a></li>
        <li>
          @component('component.rating', ['score' => 3])
          @endcomponent
        </li>
        <li>{{ $location->description }}</li>
        <li>{{ $location->category }}</li>
        <li>{{ $location->address1 }}</li>
        <li>{{ $location->address2 }}</li>
        <li>{{ $location->city }}</li>
        <li>{{ $location->state }}</li>
        <li>{{ $location->zip }}</li>
    </ul>
</div>
<hr>
