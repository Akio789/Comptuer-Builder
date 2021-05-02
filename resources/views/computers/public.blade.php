<div class = "header-option header-div"><a class = header-text href="/login">Login</a></div>
<div class = "header-option header-div"><a class = header-text href="/register">Sign Up</a></div>
<div class="title-banner"><h2 >List public of computers</h2></div>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Components</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($computers as $item)
        <tr>
            <td scope="row">{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                @foreach ($item->components as $component)
                <div class="component">
                    <p>{{ $component->name }}</p>
                </div>
                @endforeach
               <!-- <a href="{{ route('computer.components.index', ['computer' => $item->id]) }}">See all</a> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('fc8393c97b973a9386db', {
        cluster: 'us3'
    });
    var channel = pusher.subscribe('public-computers');
    channel.bind('status-changed', function(data) {
        alert(JSON.stringify(data));
    });
</script>