

 @include("layouts.Header")

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

<div class="parent EditProfile">
    <h2 class="text-center mb-4">Edit  Profile</h2>

    <ul>
                <form action="{{route("Profile.update","test")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                     @auth("web")
                        <li><span>User Name</span> <input type="text" name="Name" value="{{auth("web")->user()->name}}" /></li>
                        <li><span>password</span> <input type="text" name="password" value=""  /></li>
                        <li><span>Email</span><input type="text" name="Email" value="{{auth("web")->user()->email}}" /></li>
                        <li><span>image</span><input type="file" name="image"/></li>
                        <input class="btn btn-primary d-block m-auto" type="submit" value="update" />
                     @endauth
                     @auth("police")
                        <li><span>User Name</span> <input type="text" name="Name" value="{{auth("police")->user()->Name}}" /></li>
                        <li><span>password</span> <input type="text" name="password" value=""  /></li>
                        <li><span>Phone</span> <input type="text" name="phone" value="{{auth("police")->user()->Phone}}" /></li>
                        <li><span>Email</span><input type="text" name="Email" value="{{auth("police")->user()->email}}" /></li>
                        <li><span>Address</span><input type="text" name="Address" value="{{auth("police")->user()->Address}}" /></li>
                        <li><span>image</span><input type="file" name="image"/></li>
                        <input class="btn btn-primary d-block m-auto" type="submit" value="update" />
                     @endauth
                     @auth("offense")
                        <li><span>User Name</span> <input type="text" name="Name" value="{{auth("offense")->user()->offender_name}}" /></li>
                        <li><span>password</span> <input type="text" name="password" value=""  /></li>
                        <li><span>Phone</span><input type="text" name="Phone" value="{{auth("offense")->user()->Phone}}" /></li>
                        <li><span>image</span><input type="file" name="image"/></li>
                        <input class="btn btn-primary d-block m-auto" type="submit" value="update" />
                    @endauth
                </form>
    </ul>
</div>
@include('layouts.Footer')
