<div class="col-lg-6">
    <div class="d-none d-lg-block">
     <ol class="breadcrumb m-0 float-end">
         <li class="breadcrumb-item"><a href="javascript: void(0);">Dashtrap</a></li>
         @foreach (Request::segments() as $segment)
            <li class="breadcrumb-item-active" aria-current="page">
                {{ucwords($segment)}}
            </li>
        @endforeach
     </ol>
    </div>
 </div>
