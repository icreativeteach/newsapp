<div class="sw-card">
   <div class="sw-card__title">
          
    </div>
    <div class="sw-card__content">
      @include('newsletter.newslettersender.list')
      @include('newsletter.newslettersender.create')
      @include('newsletter.newslettersender.edit')
    </div>
    
</div>    
    
</div>
</div>

@section('javascripts')
   @include('newsletter.scripts.newslettersender')
@endsection