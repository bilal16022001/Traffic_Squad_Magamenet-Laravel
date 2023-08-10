
@extends('layouts.Header')
@section('Title','Add Offense')
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
        <div class="newOffense">
            <h2>Add Offense</h2>
            @if(\App\Models\PoliceStationTrafficPolice::with("stations", "polices")->where("traffic_police_id",auth("police")->user()->id)->count()>0)
        @foreach(\App\Models\PoliceStationTrafficPolice::with("stations", "polices")->where("traffic_police_id",auth("police")->user()->id)->get() as $item)
            @php
            $currentDate = new DateTime();
            $loopDate = new DateTime($item->Date);
            @endphp
               @if($item->Date == date('Y-m-d'))
           <form action="{{route("AllOffenses.store")}}" method="POST" enctype="multipart/form-data">
                @csrf

               <div class="row">
                  <div class="col-lg-6">
                      <label>License number</label>
                      <input type="text" name="License" required /><br/>
                      <label>Offender name</label>
                      <input type="text" name="name" required /><br/>
                      <label>place violation</label>
                      <input type="text" id="place" name="place" value="{{$item->stations->Police_station}}"  required /><br/>
                      <label>section</label>
                      <input type="text" name="section" required /><br/>
                      <label>fine Amount</label>
                      <input type="text" name="Amount" required /><br/>
                  </div>
                  <div class="col-lg-6">
                      <label>Vehicle number</label>
                      <input type="text" name="Vehicle_number" required /><br/>
                      <label>Offender phone</label>
                      <input type="text" name="phone" required /><br/>
                      <label>image</label>
                      <input type="file" name="image" required /><br/>
                  </div>
               <div>
              
                <input class="btn btn-primary" type="submit" value="submit" />
          </form>
            @else

            @if ($currentDate > $loopDate || $currentDate < $loopDate)
                   @once
                 <div class="alert alert-danger">you cant't add any offesne, beacuse you don't have any mission yet</div>  
              @endonce
           @endif
 
     
              @endif
        @endforeach
            @else
            <div class="alert alert-danger">you cant't add any offesne, beacuse you don't have any mission yet</div>
            @endif
        </div>
    </div>

    @include('layouts.Footer')