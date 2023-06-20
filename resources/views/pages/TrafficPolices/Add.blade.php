

 <div class="editPolice">
      <form action="{{route("TrafficPolices.store")}}" method="POST">
         @csrf      
         <label>Name</label>
         <input type="text"  name="Name" value="{{old("Name")}}"  class="mb-2" requried /><br/>
         @error('Name')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>Email</label>
         <input type="email"  name="email" value="{{old("email")}}"  class="mb-2" requried /><br/>
         @error('email')
         <div class="alert alert-danger">{{ $message }}</div>
         @enderror
         <label>Mobile Number</label>
         <input type="text"  name="Phone" value="{{old("Phone")}}"  class="mb-2"  requried /><br/>
         @error('Phone')
         <div class="alert alert-danger">{{ $message }}</div>
          @enderror
         <label>Address</label>
         <input type="text"  name="Address" value="{{old("Address")}}"  class="mb-2" requried /><br/>
         @error('Address')
         <div class="alert alert-danger">{{ $message }}</div>
          @enderror
         <label>Password</label>
         <input type="text"  name="password" value="{{old("password")}}"  class="mb-2" requried /><br/>
         @error('password')
         <div class="alert alert-danger">{{ $message }}</div>
          @enderror

         <input class="btn btn-primary" type="submit" value="Add" />
      </form>
 </div>
