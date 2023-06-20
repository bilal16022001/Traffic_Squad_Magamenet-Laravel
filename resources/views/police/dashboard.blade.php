
 
<div class="dashboard">
   <div class="admin">
     <div class="">
     <div class="con">
      <i class="fa fa-folder"></i>
        </div>
        <div class="">
          <h4>Total  Offenses</h4>
          <span>{{\App\Models\Offense::where("Traffic_id", auth("police")->user()->id)->count()}}</span>   
        </div>
        <div class="view">
           <a href="{{route("AllOffenses.index")}}">View All</a>
        </div>
     </div>
     <div class="">
     <div class="con">
      <i class="fa fa-times"></i>
        </div>
        <div class="">
          <h4>Total Pending  Offenses</h4>
          <span>{{\App\Models\Offense::all()->where("paidStatut", 0)->where("Traffic_id", auth("police")->user()->id)->count()}}</span>   
        </div>
        <div class="view">
           <a href="{{url("OffensesPending")}}">View All</a>
        </div>
     </div>

     <div class="">
           <div class="con">
            <i class="fa fa-check"></i>
           </div>
          <div class="">
             <h4>Total Completed  Offenses</h4>
             <span>{{\App\Models\Offense::all()->where("paidStatut", 1)->where("Traffic_id", auth("police")->user()->id)->count()}}</span>   
          </div>
          <div class="view">
              <a href="{{url("OffensesComplet")}}">View All</a>
          </div>
     </div>

{{-- <div class="">
   <div class="con">
      <i class="fa fa-solid fa-users"></i>
   </div>
  <div class="">
     <h4>My Traffic Police</h4>
     
     <span>{{ \App\Models\TrafficPolice::all()->where("id", auth("police")->user()->id)->count()}}</span>   
  </div>
  <div class="view">
      <a href="{{url("TrafficPolices")}}">View All</a>
  </div>
</div> --}}
<div class="">
   <div class="con">
      <i class="fa fa-building"></i>
   </div>
  <div class="">
     <h4>My Missions</h4>
     <span>{{\App\Models\TrafficPolice::FindOrFail(auth("police")->user()->id)->station->count()}}</span>   
  </div>
  <div class="view">
      <a href="{{route("TrafficStations.index")}}">View All</a>
  </div>
</div>
   </div>
</div>
@include('layouts.Footer')