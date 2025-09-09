<ul>
    @foreach ($category_blogs as $category_blog)
    <li class="list-group" style="list-style: none;">
        <div style="display: flex">
            <span style="font-size: 20px;margin-right: -32px;">{{$category_blog->name}}</span>
            <div class="actions mr-2" style="    margin-right: 11px;font-size: 14px;margin-top: 5px;">
                <form action="{{route('admin.category_blogs.destroy' , $category_blog->id)}}" method="POST" id="category_blog-{{$category_blog->id}}-delete">
                @csrf
                @method('delete')
                </form>
                <a href="#" onclick="event.preventDefault();document.getElementById('category_blog-{{$category_blog->id}}-delete').submit()" class="badge badge-danger">حذف</a>
                <a href="{{route('admin.category_blogs.edit' , $category_blog->id)}}" class="badge badge-primary">ویرایش</a>
                <a href="{{route('admin.category_blogs.create')}}?parent={{$category_blog->id}}" class="badge badge-warning text-white">ثبت زیر دسته</a>
            </div>
        </div>
        @if($category_blog->child->count())
        @include('admin.layouts.categories-group' , ['categories' => $category_blog->child])
        <hr style="margin-right: -32px">
        @endif
    </li>

    <hr>
    @endforeach
</ul>
