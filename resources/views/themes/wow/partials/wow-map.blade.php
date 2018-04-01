@if(!empty($post) && $post->map != null)
    {!! $post->map !!}
@elseif(!empty($town) && $town->map != null)
    {!! $town->map !!}
@elseif(!empty($category) && $category->map != null)
    {!! $category->map !!}
@elseif($settings->map != null)
    {!! $settings->map !!}
@endif