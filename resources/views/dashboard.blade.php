
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
  


 @if(Auth::guard('web')->check())
   @include("admin.dashboard")
 @endif

 @if(Auth::guard('police')->check())
 @include("police.dashboard")
@endif

@if(Auth::guard('offense')->check())
 @include("offense.dashboard")
@endif

