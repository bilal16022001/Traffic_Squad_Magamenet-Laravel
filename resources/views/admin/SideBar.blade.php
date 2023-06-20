<div class="home">
    <div class="s">
        <div class="sidebar">
            <i class="cnacelIcon fa fa-solid fa-xmark"></i>
            <div class="logo">        
                <img src="{{asset("attachments/system/policelo.png")}}" />
            </div>
            <hr>
            <ul class="MenuSidebar">
                <li>
                      <i class="fa fa-solid fa-house"></i>
                      <a href="{{url("/dashboard")}}">dashboard</a>
                </li>
                <li><i class="fa fa-building"></i> <a href="{{route("PoliceStations.index")}}">Police Stations</a></li>
                <li><i class="fa fa-solid fa-users"></i><a href="{{route("TrafficPolices.index")}}">Traffic Police</a></li>
                <li><i class="fa fa-solid fa-users"></i><a href="{{route("TrafficStations.index")}}">Traffic Stations</a></li>
                <li> <i class="fa fa-folder"></i>
                    <a class="dropdown-toggle" dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Offenses histroy</a>
                <ul class="dropdown-menu dropMenu" aria-labelledby="navbarDropdown">
                        <li><a  class="dropdown-item" href="{{url("/PendingOffenses")}}">Pending Offenses</a></li>
                        <li><a class="dropdown-item" href="{{url('/CompletedOffenses')}}">Completed Offenses</a></li>
                        <li><a  class="dropdown-item" href="{{route("AllOffenses.index")}}">All Offenses</a></li>
        
                    </ul>
               </li>
                <li><i class="fa-sharp fa fa-solid fa-file"></i><a href="{{url("/ReportOffenses")}}">Reports</a></li>
                <li><i class="fa-sharp fa fa-solid fa-magnifying-glass"></i><a href="{{url("/SearchOffenses")}}">Search Challan</a></li>
            </ul>
        </div>
    </div>
