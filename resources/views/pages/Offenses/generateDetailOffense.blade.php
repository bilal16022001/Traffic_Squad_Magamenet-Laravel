


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
  </head>
  <style>
       .parent {
       background-color: #fff;
       width: 92%;
       margin: auto;
       padding: 15px;
       position: relative;
   }
  
   .parent tr:nth-child(even) {
       background-color: #e5e5e54d;
  
   }
   .parent table {
      border-collapse: collapse;
   }
   .parent table img{
      height:480px;
   }
   .parent table ,th,td{
      border:2px solid rgb(211, 211, 211);
      padding:5px;
   }
  </style>
  <body>
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
                                     <img  src="{{public_path("attachments/". $item->image)}}"/>
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
              <a href="#" style="background:#20c997;"> this offense is paid by Administration (you) </a>
              @endif
      </div>
      
      </div>  
  </body>
  </html>

{{-- @include('layouts.Footer') --}}