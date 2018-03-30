<div class="navigation stick">
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="menu-toggle" id="menu-toggle"><img src="https://www.wowmalta.com.mt/thm/malta/img/nav-toggle.png"></i></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class='active'><a href="https://www.wowmalta.com.mt/">home</a></li>
                    @if(count($cats)>0)
                        @foreach($cats as $cat)
                            <li><a href='{{ url($cat->slug) }}'>{{ $cat->title }}</a></li>
                        @endforeach
                    @endif
                </ul>
                <div style="clear: both"></div>
                <div class="sub_menu">
                    <div class="container">
                        <ul>
                            @if(count($towns)>0)
                                @foreach($towns as $town)
                                    @if(empty($category))
                                        <li><a href='{{ url($town->slug) }}'>{{ $town->name }}</a></li>
                                    @else
                                        <li><a href='{{ url($category->slug . '/' . $town->slug) }}'>{{ $town->name }}</a></li>
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