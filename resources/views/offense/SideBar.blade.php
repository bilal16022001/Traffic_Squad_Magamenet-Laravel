<div class="home">
    <div class="s">
        <div class="sidebar">
            <i class="cnacelIcon fa fa-solid fa-xmark"></i>
            <div class="profile">
                @if(empty(auth("offense")->user()->imageProfile))
                   <img src="{{asset("attachments/offenses/user.jpg")}}" />
                   @else
                   <img src="{{asset("attachments/" . auth("offense")->user()->imageProfile)}}" />
                @endif
                   <a class="text-white dropdown-toggle" dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" class="text-white">offender {{auth("offense")->user()->offender_name}}</a>

                   <ul class="dropdown-menu dropMenu" aria-labelledby="navbarDropdown">
                    <li><a style="" class="dropdown-item" href="{{route("Profile.show","a")}}">profile</a></li>
                    <li><a class="dropdown-item" href="{{route("logout","offense")}}">logout</a></li>
                </ul>

            </div>
            <hr>
            <ul class="MenuSidebar">
                <li><i class="fa fa-solid fa-house"></i><a href="{{url("offense/dashboard")}}">dashboard</a></li>
                <li> <i class="fa fa-folder"></i>
                    <a class="dropdown-toggle" dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">My Offenses histroy</a>
                <ul class="dropdown-menu dropMenu" aria-labelledby="navbarDropdown">
                        <li><a  class="dropdown-item" href="{{url("/PendingOffenses")}}">My Pending Offenses</a></li>
                        <li><a class="dropdown-item" href="{{url("CompletedOffenses")}}">My Completed Offenses</a></li>
                        <li><a  class="dropdown-item" href="{{route("AllOffenses.index")}}">My Offenses</a></li>
        
                    </ul>
               </li>
               <li><i class="fa-sharp fa fa-solid fa-file"></i><a href="{{url("/ReportOffenses")}}">Reports</a></li>
               <li><i class="fa-sharp fa fa-solid fa-magnifying-glass"></i><a href="{{url("/SearchOffenses")}}">Search Challan</a></li>
            </ul>
        </div>
    </div>
