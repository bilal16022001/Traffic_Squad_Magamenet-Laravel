
 
<div class="dashboard">
   <div class="admin">
     <div class="">
     <div class="con">
      <i class="fa fa-folder"></i>
        </div>
        <div class="">
          <h4>Total your Offenses</h4>
          <span>{{$data['Offenses']}}</span>   
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
          <h4>Total Pending your Offenses</h4>
          <span>{{$data['OffensesPnding']}}</span>   
        </div>
        <div class="view">
           <a href="{{url("/PendingOffenses")}}">View All</a>
        </div>
     </div>

     <div class="">
           <div class="con">
            <i class="fa fa-check"></i>
           </div>
          <div class="">
             <h4>Total Completed your Offenses</h4>
             <span>{{$data['OffensesComplet']}}</span>   
          </div>
          <div class="view">
              <a href="{{url("/CompletedOffenses")}}">View All</a>
          </div>
     </div>

   </div>
</div>
@include('layouts.Footer')