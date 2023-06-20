

 <div class="editPolice">
      <form action="{{route("PoliceStations.update","t")}}" method="POST">
         @csrf
         @method("PUT")
          <label>Police Station Name</label>
          <input type="text" placeholder="Name Station" value="{{$item->Police_station}}" name="NameStation" class="mb-2" /><br/>
          <label>Police Station Code</label>
          <input type="hidden" value="{{$item->id}}" name="id" />
          <input type="text" placeholder="Code Station"  value="{{$item->Police_code}}" name="CodeStation"  class="mb-2"  /><br/>
          <input class="btn btn-primary" type="submit" value="update" />
      </form>
 </div>
