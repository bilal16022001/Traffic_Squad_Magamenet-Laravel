
@include('layouts.Header')
{{-- @section('Title','TrafficPolices') --}}

@if(Auth::guard('web')->check())
@include("admin.SideBar")
@endif

@if(Auth::guard('police')->check())
  @include("police.SideBar")
@endif

@include("layouts.Navbar")

<div class="parent">
<h2 class="text-center mb-3">@auth("web") Manage Traffic Stations @endauth @auth("police") My missions @endauth</h2>
<div class="container police">
  
            <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                  @if($trafficStations->count()>0)
                  <tr>
                     <td>#</td>
                     @auth("web")
                     <td>Name Police</td>
                     @endauth
                     
                     <td>Name Station</td>
                     <td>Mission Date</td>
                     @auth("web")
                     <td>Action</td>
                     @endauth
                </tr>
                @else
                <div class="alert alert-info">There is no Traffic Stations yet</div>
                @endif
                @foreach($trafficStations as $item)
                   <tr>
                      <td>{{$loop->index+1}}</td>
                      @auth("web")
                      <td>{{$item->polices->Name}}</td>
                      @endauth
                      <td>{{$item->stations->Police_station}}</td>
                      <td>{{$item->Date}}</td>
                      @auth("web")
                      <td>
                      
                           <a data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}" href=""  class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                           <a data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}" href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
                      @endauth
                   </tr>
                   <!---delete modal--->
                   <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">delete Traffic Police</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route("TrafficStations.destroy",$item->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                           <p class="mb-2"> Are you Sure to Delete this Traffic Station ?</p>
                           <input type="text" class="form-control mb-3" value="{{$item->polices->Name}}" disabled />
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="save" />
                          </div>
                          </form>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                  <!----delete modal--->
                  <!---edit modal--->
                  <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Traffic Police</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route("TrafficStations.update","update")}}" method="POST">
                            @csrf
                            @method("PUT")
                            <input type="hidden" value="{{$item->id}}" name="id" />
                            <label class="mb-2">Choose Police</label>
                            <select class="form-control mb-2"  name="traffic_police_id">
                              <option>Choose Police</option>
                              @foreach($polices as $police)

                                <option value="{{$police->id}}" {{$police->id==$item->polices->id ? "selected" : ""}}>{{$police->Name}}</option>
                              @endforeach
                            </select>
                            @error("traffic_police_id")
                            <div class="alert alert-danger">The filed require A number</div>
                            @enderror
                  
                            <label class="mb-2">Choose Station</label>
                            <select class="form-control" name="police_station_id">
                              <option>Choose Station</option>
                            @foreach($stations as $st)
                              <option value="{{$st->id}}" {{$st->id==$item->stations->id ? "selected" : ""}}>{{$st->Police_station}}</option>
                            @endforeach
                          </select>
                          @error("police_station_id")
                          <div class="alert alert-danger">The filed require A number</div>
                          @enderror
                          <label>Choose Date</label>
                          <input type="date"  name="date" value="{{$item->Date}}" class="form-control mb-3" />
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="save" />
                          </div>
                          </form>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                  <!----edit modal-->
                @endforeach
 
        </table>
    </div>
    @auth("web")
    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" href="">Add Traffic Station</a>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Traffic Police</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST" action="{{route("TrafficStations.store")}}">
                @csrf
                  <label class="mb-2">Choose Police</label>
                  <select class="form-control mb-2"  name="traffic_police_id">
                    <option>Choose Police</option>
                    @foreach($polices as $item)
                      <option value="{{$item->id}}">{{$item->Name}}</option>
                    @endforeach
                  </select>
                  @error("traffic_police_id")
                  <div class="alert alert-danger">The filed require A number</div>
                  @enderror
        
                  <label class="mb-2">Choose Station</label>
                  <select class="form-control" name="police_station_id">
                    <option>Choose Station</option>
                  @foreach($stations as $item)
                    <option value="{{$item->id}}">{{$item->Police_station}}</option>
                  @endforeach
                </select>
                @error("police_station_id")
                <div class="alert alert-danger">The filed require A number</div>
                @enderror
                <label>Choose Date</label>
                <input type="date"  name="date" class="form-control mb-3" />
                <div class="d-flex flex-row-reverse">
                  <button class="btn btn-primary" type="submit" >save</button>
              </div>
               </form>
            </div>
           
          </div>
        </div>
      </div>

      @endauth
</div>
</div>
</div>


@include('layouts.Footer')