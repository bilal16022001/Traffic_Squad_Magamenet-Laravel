<div class="home">
    <div class="s">
        <div class="sidebar">
            <div class="profile">
                <img src="uploads/attach/th.jpg" />
                   <a class="nav-link ad  dropdown-toggle  " dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        
                   </a>

                    <ul class="dropdown-menu dropMenu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> My Account</a></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> logout</a></li>
        
                    </ul>
            </div>
            <hr>
            <ul class="MenuSidebar">
                <li><i class="fa fa-solid fa-house"></i><a href="{{url("dashboard")}}">dashboard</a></li>
                <li><i class="fa fa-building"></i> <a href="{{route("PoliceStations.index")}}">Police Station</a></li>
                <li><i class="fa fa-solid fa-users"></i><a href="{{route("TrafficPolices.index")}}">Traffic Police</a></li>
                <li> <i class="fa fa-folder"></i>
                <a class="dropdown-toggle" dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Offenses histroy</a>
                     <ul class="dropdown dropMenu" aria-labelledby="navbarDropdown">
                        <li><a style="color:#fff !important;" class="dropdown-item" href="{{route("OffensesPending.index")}}">Pending Offenses</a></li>
                        <li><a style="color:#fff !important;" class="dropdown-item" href="{{route("OffensesComplet.index")}}">Completed Offenses</a></li>
                        <li><a style="color:#fff !important;" class="dropdown-item" href="{{route("Offenses.index")}}">All Offenses</a></li>
        
                    </ul>
               </li>
                <li><i class="fa-sharp fa fa-solid fa-file"></i><a href="{{route("Reports.index")}}">Reports</a></li>
                <li><i class="fa-sharp fa fa-solid fa-magnifying-glass"></i><a href="{{route("Search.index")}}">Search Challan</a></li>
            </ul>
        </div>
    </div>
