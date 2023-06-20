<div class="overlay"></div>
<div class="">
   <div class="admin">
   <div class="">
     <div class="con">
      <i class="fa fa-folder"></i>
        </div>
        <div class="">
          <h4>Total  Offenses</h4>
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
          <h4>Total Pending  Offenses</h4>
          <span>{{$data['OffensesPnding']}}</span>   
        </div>
        <div class="view">
           <a href="OffensesPending">View All</a>
        </div>
     </div>

     <div class="">
           <div class="con">
            <i class="fa fa-check"></i>
           </div>
          <div class="">
             <h4>Total Completed  Offenses</h4>
             <span>{{$data['OffensesComplet']}}</span>   
          </div>
          <div class="view">
              <a href="OffensesComplet">View All</a>
          </div>
     </div>
   <div class="">
      <div class="con">
       <i class="fa fa-check"></i>
      </div>
     <div class="">
        <h4>Total Traffic Police</h4>
        <span>{{$data['polices']}}</span>   
     </div>
     <div class="view">
         <a href="TrafficPolices">View All</a>
     </div>
   </div>
   <div class="">
      <div class="con">
       <i class="fa fa-check"></i>
      </div>
     <div class="">
        <h4>Total Police Stations</h4>
        <span>{{$data['stations']}}</span>   
     </div>
     <div class="view">
         <a href="PoliceStations">View All</a>
     </div>
   </div>
   </div>
</div>
@include('layouts.Footer')