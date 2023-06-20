

@include('layouts.Header')
@section('title','Offenses')

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
          <div class="container">
              <div class="table-responsive">
                  <table class="main-table text-center table table-bordered">
                      <?php
                        echo "<tr>";
                              echo "<td>offense number</td>";
                              echo "<td>" . $item['offense_number']  . "</td>";
                        echo "</tr>";
                          echo "<tr>";
                             echo "<td>offender_name</td>";
                             echo "<td>" . $item['offender_name']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                                 echo "<td>offense date</td>";
                                 echo "<td>" . $item['offense_date']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                                 echo "<td>license number</td>";
                                 echo "<td>" . $item['license_number']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                                 echo "<td>place violation</td>";
                                 echo "<td>" . $item['place_violation']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                                 echo "<td>Vehicle number</td>";
                                 echo "<td>" . $item['Vehicle_number']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                              echo "<td>offender Phone</td>";
                              echo "<td>" . $item['Phone']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                              echo "<td>Paid Statuts</td>";
                              echo "<td>";
                                    if($item['paidStatut']==0){
                                    echo "not paid yet";
                                    }else{
                                       echo "completed";
                                    }
                             echo "</td>";
                          echo "</tr>";
                          echo "<tr>";
                              echo "<td>offense date</td>";
                              echo "<td>" . $item['offense_date']  . "</td>";
                          echo "</tr>";
                          echo "<tr>";
                              echo "<td>Paid by</td>";
                              echo "<td>";
                              if($item['PaidBy']==0){
                                 echo "not yet";
                              } else if($item['PaidBy']==1){
                                 echo "Traffic Police";
                              }else if($item['PaidBy']==2){
                                 echo "Administartion";
                              }else{
                                 echo "Offense";
                              }
                              echo "</td>";
                          echo "</tr>";
                          echo "<tr>";
                                 echo "<td>vehicle image</td>";
                                 echo "<td>";
                                 ?>
                                     <img  src="{{asset("attachments/". $item->image)}}"/>
                                 <?php
                                 echo "</td>";
                          echo "</tr>";
                          echo "<tr>";
                              echo "<td>amount</td>";
                              echo "<td>" . $item['amount']  . "</td>";
                          echo "</tr>";
                      
                      ?>
                </table>
      
      </div>
              @if($item['paidStatut']==0)
              <a href="{{route("AllOffenses.pay",$item->id)}}" class="btn btn-primary">Pay</a>
              @elseif($item->paidStatut==1 && $item->PaidBy==1)
              <a href="#" style="background:#20c997;"> this offense is paid by traffic police</a>
              @elseif($item->paidStatut==1 && $item->PaidBy==3)
              <a href="#" style="background:#20c997;"> this offense is paid by offender </a>
              @elseif($item->paidStatut==1 && $item->PaidBy==2)
              <a href="#" style="background:#20c997;"> this offense is paid by Administration </a>
              @endif
      </div>
      
      </div>  


@include('layouts.Footer')