
@extends('layouts.Header')
@section('Title','Edit Offense')


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
            <h2>Edit Offense</h2>
        
            @if(\App\Models\PoliceStationTrafficPolice::with("stations", "polices")->where("traffic_police_id",auth("police")->user()->id)->count()>0)
            @foreach(\App\Models\PoliceStationTrafficPolice::with("stations", "polices")->where("traffic_police_id",auth("police")->user()->id)->get() as $item)
            @php
            $currentDate = new DateTime();
            $loopDate = new DateTime($item->Date);
            @endphp
               @if($item->Date == date('Y-m-d'))
           <form action="{{route("AllOffenses.update",$offense->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                 @method("PUT")
               <div class="row">
                  <div class="col-lg-6">
                  <input type="hidden" name="id" value="{{$offense->id}}" required /><br/>
                      <label>License number</label>
                      <input type="text" name="License" value="{{$offense->offense_number}}" required /><br/>
                      <label>Offender name</label>
                      <input type="text" name="name" value="{{$offense->offender_name}}" required /><br/>
                      <label>place violation</label>
                      <input type="text" id="place" value="{{$offense->place_violation}}" name="place" value="{{$item->stations->Police_station}}"  required /><br/>
                      <label>section</label>
                      <input type="text" name="section" value="{{$offense->section}}" required /><br/>
                      <label>fine Amount</label>
                      <input type="text" name="Amount" value="{{$offense->amount}}" required /><br/>
                  </div>
                  <div class="col-lg-6">
                      <label>Vehicle number</label>
                      <input type="text" name="Vehicle_number" value="{{$offense->Vehicle_number}}" required /><br/>
                      <label>Offender phone</label>
                      <input type="text" name="phone" value="{{$offense->Phone}}" required /><br/>
                      <label>image</label>
                      <input type="file" name="image" /><br/>
                  </div>
               <div>
              
                <input class="btn btn-primary" type="submit" value="submit" />
          </form>
          @else
          @if ($loop->first && $currentDate < $loopDate)
          <div class="alert alert-danger">you cant't add any offesne, beacuse you don't have any mission yet</div>
         @endif

     

            @endif
      @endforeach
          @else
          <div class="alert alert-danger">you cant't add any offesne, beacuse you don't have any mission yet</div>
          @endif
        </div>
    </div>

    @include('layouts.Footer')