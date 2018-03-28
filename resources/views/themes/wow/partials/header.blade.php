
<header class="clearfix">
    <div class="container hed" style="position: relative">
        <div><a href="{{ url('/') }}"><img src="{{ url('themes/'.$theme.'/img/logo.png')  }}" class="logo" alt="logo"></a></div>
    </div><!-- container -->

    @include('themes.'.$theme.'.partials.nav')

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ url('pretraga') }}" method="POST">
                    <input class="nav-search" type="search" name="s" title="Pretraga..." placeholder="Search..." />
                    <span>Enter the search words.</span>
                </form>
                <a class="fade_close" data-dismiss="modal"><img src="{{ url('themes/'.$theme.'/img/close.png')  }}" /></a>
            </div>
        </div>
    </div>
</header>