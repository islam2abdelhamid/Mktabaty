   <!-- Sidebar -->
   <div class="col-md-3">
    <ul class="list-unstyled">
      @forelse ($bookCategories as $bookCategory)
      @if($active == $bookCategory->id)
          <li class="captalize active" >
      @else
          <li class="captalize " >
      @endif
      <a  href="<?php echo route('getBooks', ['id' => $bookCategory->id])?>"> {{$bookCategory->name}}</a></li>
      @empty
      <li> No Categories </li>
      @endforelse
      </ul>
  </div>