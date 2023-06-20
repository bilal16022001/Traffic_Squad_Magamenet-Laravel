      <div class="h">
            <div class="header mb-3">
               <div class="bars">
                  <i class="fa fa-solid fa-bars"></i>
                  </div>
                  <div class="">
                    <h3>Traffic Squad Management</h3>
                  </div>
                  <div class=" profile">
                
                          @auth("police")
                            @if(isset(auth("police")->user()->image))
                              <img src="{{asset("attachments/" . auth("police")->user()->image)}}" />
                              @else
                                       <img src="{{asset("attachments/police/police.jpg")}}" />
                            @endif
                          <a class=" dropdown-toggle" dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" >police {{auth("police")->user()->Name}} </a>
                          @endauth
                          @auth("web")
                              @if(isset(auth("web")->user()->image))
                              <img src="{{asset("attachments/" . auth("web")->user()->image)}}" />
                              @else
                                      <img src="{{asset("attachments/admin/amin.jpg")}}" />
                            @endif
                          <a class=" dropdown-toggle" dropdown-toggle href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" >admin {{auth("web")->user()->name}} </a>
                          @endauth
                     
                
 
                    <ul class="dropdown-menu dropMenu" aria-labelledby="navbarDropdown">
                     <li><a style="" class="dropdown-item" href="{{route("Profile.show","a")}}">profile</a></li>
                     <li>
                          @if(Auth::guard("web")->check())
                          <a class="dropdown-item" href="{{ route('logout',"web") }}">logout</a>
                          @elseif(Auth::guard("police")->check())
                          <a class="dropdown-item" href="{{ route('logout',"police") }}">logout</a>
                          @elseif(Auth::guard("offense")->check())
                          <a class="dropdown-item" href="{{ route('logout',"offense") }}">logout</a>
                          @endif
                     </li>
                    </ul>
                  
            
                  </div>
            </div>
