@include('layouts.Header')
@section('title','Offenses')

@if(Auth::guard('web')->check())
@include("admin.SideBar")
@endif

@if(Auth::guard('police')->check())
  @include("police.SideBar")
@endif

@if(Auth::guard('offense')->check())
  @include("offense.SideBar")
@endif


@include("layouts.Navbar")

<div class="parent">
    <div class="reports">

        <form action="{{route("AllOffenses.Reports")}}" method="POST">
            @csrf
           <label>From date</label>
           <input type="date" name="fromdate" value="{{old("fromdate")}}" required /><br/>
           <label>To date</label>
           <input type="date" name="todate" value="{{old("todate")}}" required /><br/>
           <input class="btn btn-primary" type="submit" value="submit" />
           {{-- <input type="hidden" value="admin" name="type" /> --}}
        </form>
     </div>

     <h2 class="text-center mb-3">Offense </h2>
        <div class="container police">
            <div class="table-responsive">
                <table class="main-table text-center table table-bordered">
                  @if(!empty($Offenses))
                  @if($Offenses->count()>0)
                  <tr>
                        <td>#</td>
                        <td>Offense Number</td>
                        <td>offender Name</td>
                        <td>offender Phone</td>
                        <td>Paid Statuts</td>
                        <td>offense date</td>
                        <td>Paid By</td>
                        <td>Action</td>
                  </tr>
                 @foreach($Offenses as $Offense)
                       <tr>
                         <td>{{$loop->index+1}}</td>
                         <td>{{$Offense->offense_number}}</td>
                         <td>{{$Offense->offender_name}}</td>
                         <td>{{$Offense->Phone}}</td>
                         <td>
                              @if($Offense->paidStatut==0)
                               not yet
                              @else
                               Completed            
                            @endif
                         </td>
                         <td>{{$Offense->offense_date}}</td>
                         <td>
                              @if($Offense->PaidBy==0)
                                not yet
                                @elseif($Offense->PaidBy==1)
                                   Traffic Police
                                @elseif($Offense->PaidBy==2)
                                     Administration
                              @else
                                     Offense             
                              @endif
                         </td>
                         <td>
                             <a href="{{route("AllOffenses.show",$Offense->id)}}" class="btn btn-info btn-sm"><i class="fa fa-solid fa-eye"></i></a>
                             @auth("police")
                             <a href="{{route("AllOffenses.edit",$Offense->id)}}" {{$Offense->id}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             @endauth
                             <a href="{{route("AllOffenses.generateOffense",$Offense->id)}}" class="btn btn-info btn-sm" href="#"><i class="fa fa-solid fa-download"></i></a>
                             @if(Auth::guard("web")->check() || Auth::guard("police")->check())
                             <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$Offense->id}}" class="btn btn-success btn-sm"><i class="fa fa-trash"></i></a>
                             @endif
                             
                         </td>
                         <!----delete offense--->
                         <div class="modal fade" id="exampleModal{{$Offense->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Offense</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                               <form action="{{route("AllOffenses.delete",$Offense->id)}}">
                                @csrf
                                @method("DELETE")
                                <p class="mb-2">  Are you sure To Delete This Offense ?</p>
                                <input type="hidden" value="{{$Offense->id}}" name="id" />
                                <input type="text" value="{{$Offense->offender_name}}" class="from-control mb-2" disabled />
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                               </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                          <!----delete offense--->
                       </tr>
                       
            @endforeach
 
          @else
          <div class="alert alert-info">There is no Offenses yet</div>
                 
          @endif 
          @endif
              </table>
   	 </div>
	</div>

</div>
@include('layouts.Footer')