<section class="header">
<a href="{{ route('computers.index') }}"><img src="{{URL::asset('/images/test.svg')}}" class="header-logo header-div" ></a>
<a href="{{ route('computers.index') }}"><div class="header-title header-div">
          <div class = "header-text"><h1>PC Builder<h1> </div>
     </div></a>
     
     <div class ="header-menu ">
          
          <div class = "header-option header-div"><a class = header-text href="{{ route('users.show', ['user' => Auth::user()->id]) }}">Profile</a></div>
          <div class = "header-option header-div"><a class = header-text href="{{ route('users.index') }}">List of users</a></div>
          <div class = "header-option header-div"><a class = header-text href="{{ route('motherboards.index') }}">List of Motherboards</a></div>
          <div class = "header-option header-div"><a class = header-text href="{{ route('components.index') }}">List of Components</a></div>
          <div class = "header-option header-div"><a class = header-text href="/logout">Logout</a></div>
     </div>
</section>