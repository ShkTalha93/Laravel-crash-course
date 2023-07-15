<div class="form-group">
      <label for="">{{$label}}</label>
      <input type="{{$type}}" name="{{$name}}" value="{{$value}}" id="" class="form-control" placeholder="" aria-describedby="helpId"
     
       >
      <!-- <small id="helpId" class="text-muted">Help text</small> -->
      <span class='text-danger'>
      
        @error($name) 
        {{"$message"}}
        @enderror 
      </span>
</div>
       <!-- @if($name=='name'||$name=="email")
      value="{{ old($name) }}"
      @endif -->