<div class="body_content">
  <div class="box_4">
    <div class="heading">@yield('title')<a class="right" href="{{ route('hk_createnews') }}">Create new article</a></div>
    @if($errors->any())
    <div class="alert alert-success" role="alert">
      {{$errors->first()}}
    </div>
    @endif
    <table class="full normal">
      <thead>
        <th>Caption</th>
        <th>Description</th>
        <th>Date</th>
        <th>Options</th>
      </thead>
      @foreach ($news as $article)
      <tr>
        <td style="width:25%;">{{$article->caption}}</td>
        <td style="width:45%;">{{$article->desc}}</td>
        <td style="width:25%;">{{date('F d, Y', $article->date)}}</td>
        <td style="width:5%;"><button class="link" onclick="window.location.href='{{ route('hk_editnews', [$article->id]) }}'">Edit</button><button onclick="window.location.href='{{ route('hk_newsdelete', [$article->id]) }}'" class="link">Delete</button></td>
      </tr>
      @endforeach
    </table>
    <div class="end">
      {{ $news->links() }}
    </div>
  </div>
</div>
