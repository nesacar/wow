<div class="navigation stick">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="menu-toggle" id="menu-toggle"><img src="{{ url('themes/'.$theme.'/img/nav-toggle.png') }}"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li @if(!empty($home) && $home) class="active" @endif><a href="{{ url('/') }}">home</a></li>
                    @if(count($cats)>0)
                        @foreach($cats as $cat)
                            <li @if(!empty($category) && $category->id == $cat->id) class="active" @endif><a href="{{ url($cat->slug) }}">{{ $cat->title }}</a></li>
                        @endforeach
                    @endif
                </ul>
                <div style="clear: both"></div>
                <div class="sub_menu">
                    <div class="container">
                        <ul>
                            @if(count($towns)>0)
                                @foreach($towns as $t)
                                    @if(empty($category))
                                        <li @if(!empty($town) && $town->id == $t->id) class="active" @endif><a href='{{ url($t->slug) }}'>{{ $t->name }}</a></li>
                                    @else
                                        <li @if(!empty($town) && $town->id == $t->id) class="active" @endif><a href='{{ url($category->slug . '/' . $t->slug) }}'>{{ $t->name }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                        <form class="searchme">
                            <a data-toggle="modal" data-target=".bs-example-modal-lg" href="#"><i class="glyphicon glyphicon-search"></i></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="search"><a data-toggle="modal" data-target=".bs-example-modal-lg" href="#"><i class="fa fa-search"></i></a></div>
        </nav>
    </div>
</div>