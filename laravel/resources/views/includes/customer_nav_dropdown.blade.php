<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Hi {{ Auth::user()->customer->name() }}
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
  {{--  <a class="dropdown-item" href="Javascript:;">JYUD IYKE</a>  --}}

  <a class="dropdown-item" href="{{ route('customer.show', ['user' => Auth::user()->id ]) }}">profile settings</a>

  <a class="dropdown-item" href="{{ route('customer.show.orders', ['user' => Auth::user()->id ]) }}">orders</a>

      <a class="dropdown-item" href="{{ route('merchant_register') }}">Become a Merchant</a>
  
  @if( false )
    <a class="dropdown-item" href="Javascript:;" data-toggle="modal" data-target="#deleteModal">delete account</a>
  @endif
  <a class="dropdown-item" href="{{ route('logout') }}">logout</a>
</div>