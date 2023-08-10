
 <div class="editPolice">

      <form action="{{route("TrafficPolices.update","test")}}" method="POST">
         @csrf
         @method("PUT")
      
         <input type="hidden" value="{{$traffic->id}}" name="id" />
         <label>Name</label>
         <input type="text"  name="Name" value="{{$traffic->Name}}"   class="mb-2" requried /><br/>
         @error('Name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>Email</label>
         <input type="text"  name="email" value="{{$traffic->email}}"   class="mb-2" requried /><br/>
         @error('email')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>Mobile Number</label>
         <input type="text"  name="Phone" value="{{$traffic->Phone}}"   class="mb-2"  requried /><br/>
         @error('Phone')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>Address</label>
         <input type="text"  name="Address" value="{{$traffic->Address}}"   class="mb-2" requried /><br/>
         @error('Address')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>Password</label>
         <input type="text"  name="password"  class="mb-2"  /><br/>
         <input class="btn btn-primary" type="submit" value="update" />
      </form>
 </div>

 {{-- @include('layouts.Footer') --}}