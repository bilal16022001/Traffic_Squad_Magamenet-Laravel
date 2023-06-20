
 
 <div class="editPolice">
   

      <form action="{{route("PoliceStations.store")}}" method="POST">
         @csrf
          <label>Police Station Name</label>
          <input type="text" placeholder="Name Station" value="{{old("NameStation")}}"  name="NameStation" class="mb-2" /><br/>
          @error('NameStation')
             <div class="alert alert-danger">{{ $message }}</div>
         @enderror
          <label>Police Station Code</label>
          <input type="text" placeholder="Code Station" value="{{old("CodeStation")}}"   name="CodeStation"  class="mb-2"  /><br/>
          @error('CodeStation')
          <div class="alert alert-danger">{{ $message }}</div>
         @enderror
      <div class="d-flex flex-row-reverse">
          <input class="btn btn-primary" type="submit" value="Add" />
      </div>
      </form>
 </div>

