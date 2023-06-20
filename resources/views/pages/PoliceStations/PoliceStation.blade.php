
@include('layouts.Header')

@section('title','Offenses')

@if(Auth::guard('web')->check())
@include("admin.SideBar")
@endif

@if(Auth::guard('police')->check())
  @include("police.SideBar")
@endif

@include("layouts.Navbar")

<div class="parent">
<h2 class="text-center mb-3">@auth("web")Manage Stations @endauth @auth("police") My Missions @endauth</h2>

<div class="container police">
            <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                   @if($TrafficPolices->count()>0)
                    <tr>
                         <td>#</td>
                         <td>Police Station</td>
                         <td>Police Station Code</td>
                         <td>Date</td>
                         @auth("web")
                         <td>Action</td>
                         @endauth
                    </tr>
                    @else
                    <div class="alert alert-info">There is no missions yet</div>
                    @endif
               
          @foreach($TrafficPolices as $item)
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->Police_station}}</td>
                        <td>{{$item->Police_code}}</td>
                        <td>{{$item->Date}}</td>
                        @auth("web")
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}" href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                        @endauth
                      </tr>
                           <!--start edit Modal -->

                      <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Police Station</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              @include("pages.PoliceStations.edit")
                            </div>
                          
                          </div>
                        </div>
                      </div>
    <!---end edit modal--->
      <!--start delete Modal -->
          <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Police Station</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route("PoliceStations.destroy",$item->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                  <p>Are you sure to delete this Station</p>
                  <input type="hidden" value="{{$item->id}}" name="id" />
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input class="btn btn-primary" type="submit" value="save" />
                  </div>
                  </form>
                </div>
              
              </div>
              </div>
            </div>
          </div>
      <!---end delete modal--->
         @endforeach
              </table>
    </div>
    {{-- {{ $TrafficPolices->links() }} --}}
    <!-- Button trigger modal -->
    @auth("web")
      <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add Station
      </a>
  @endauth
  
  <!--start add Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Police Station</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include("pages.PoliceStations.Add")
        </div>
       
      </div>
    </div>
  </div>
  <!---end add modal--->

</div>
</div>
</div>

@include('layouts.Footer')