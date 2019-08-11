<div class="body_content">
<div class="box_4">
   <div class="heading">@yield('title')</div>
   <form method="post">
      <div class="content">
         <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label for="title">ID</label>
                 <input type="text" value="{{$news->id}}" disabled name="id"/>
              </div>
               <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" value="{{$news->caption}}" name="title"/>
               </div>
               <div class="form-group">
                  <label for="image">Image</label>
                  <select name="image" <select onkeypress="changeTS(this.value);" onchange="changeTS(this.value);">
                    <option value="{{$news->image}}">TopStory</option>
                     @foreach ($images as $image)
                     <option value="{{$image->getFilename()}}">{{$image->getFilename()}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="short">Description</label>
                  <textarea name="short" draggable="false">{{$news->desc}}</textarea>
               </div>
            </div>
            <div class="col-md-6">
               <div class="box news">
                  <figure class="thumbnail" id="topstory" style="background-image:url({{$news->image}});">
                  </figure>
               </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="long">LongStory</label>
                <textarea id="editor1" name="long">{{$news->body}}</textarea>
              </div>
            </div>
         </div>
      </div>
      <div class="end">
         <div class="center">
            <button type="submit">Update</button>
         </div>
      </div>
      @csrf
   </form>
</div>
</div>
