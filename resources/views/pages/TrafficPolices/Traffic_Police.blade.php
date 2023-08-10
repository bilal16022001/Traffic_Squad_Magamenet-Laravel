
@extends('layouts.Header')
@section('Title','Traffic Polices')

@if(Auth::guard('web')->check())
@include("admin.SideBar")
@endif

@if(Auth::guard('police')->check())
  @include("police.SideBar")
@endif

@include("layouts.Navbar")

<div class="parent">
<h2 class="text-center mb-3">@auth("web") Manage Traffic Polices @endauth @auth("police") My missions @endauth</h2>
<div class="container police">
  
            <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                  @if($Traffic_Polices->count()>0)
                  <tr>
                     <td>#</td>
                     <td>Name</td>
                     <td>Mobile Number</td>
                     <td>Email</td>
                     <td>Action</td>
                </tr>
                @else
                <div class="alert alert-info">There is no Traffic Polices yet</div>
                @endif
                @foreach($Traffic_Polices as $traffic)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$traffic->Name}}</td>
                  <td>{{$traffic->Phone}}</td>
                  <td>{{$traffic->email}}</td>
                  <td>
                    <a data-bs-toggle="modal" data-bs-target="#show{{$traffic->id}}" href="" class="btn btn-info btn-sm"><i class="fa fa-solid fa-eye"></i></a>
                
                     <a data-bs-toggle="modal" data-bs-target="#edit{{$traffic->id}}" href=""  class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                     <a data-bs-toggle="modal" data-bs-target="#delete{{$traffic->id}}" href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    
                  </td>
                </tr>
                     <!--start show Modal -->
                     <div class="modal fade" id="show{{$traffic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">@auth("police") your @endauth detail about Police Station</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                             <ul>
                                {{-- <li> Police id : {{$traffic->Police_id}}</li> --}}
                                <li> Name : {{$traffic->Name}}</li>
                                <li> email : {{$traffic->email}}</li>
                                <li> Phone : {{$traffic->Phone}}</li>
                                <li> email : {{$traffic->email}}</li>
                                <li> Address : {{$traffic->Address}}</li>
                                {{-- <li> Station : {{$traffic->station->Police_station}}</li> --}}
                                <li> Date : {{$traffic->created_at}}</li>
                             </ul>

                          </div>
                        
                        </div>
                      </div>
                    </div>
                <!---end show modal--->
                      <!--start edit Modal -->
                                        <div class="modal fade" id="edit{{$traffic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Police Station</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                @include("pages.TrafficPolices.edit")
                                              </div>
                                            
                                            </div>
                                          </div>
                                        </div>
                    <!---end edit modal--->
                      <!--start delete Modal -->
                      <div class="modal fade" id="delete{{$traffic->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Police Station</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="{{route("TrafficPolices.destroy",$traffic->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                               <p>Are you sure to delete this Police</p>
                               <input class="mb-3" type="text" value="{{$traffic->Name}}" disabled />
                               <input type="hidden" value="{{$traffic->id}}" name="id" />
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
    @auth("web")
    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" href="">Add Police</a>
    @endauth

      <!--start add Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Traffic Police</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include("pages.TrafficPolices.Add")
        </div>
       
      </div>
    </div>
  </div>
  <!---end add modal--->
</div>
</div>
</div>


@include('layouts.Footer')