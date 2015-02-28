    <div class="container">

      <div class="row">
        <div class="col-lg-3">
          <div class="panel panel-default" id="headings">

            <div class="panel-body">
            <h1 class="page-header"><small>Add user</small></h1>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="hfuid">HF UID</label>
              <input type="text" class="form-control" id="hfuid" placeholder="hfuid">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
             <div class="form-group">
              <label for="paypal">Paypal</label>
              <input type="text" class="form-control" id="paypal" placeholder="Paypal">
            </div>
               <div class="form-group">
              <label for="amount">Amount</label>
              <input type="text" class="form-control" id="amount" placeholder="amount">
            </div>



                                      <div class="form-group">

                  <input id="add"  type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">
                                     </div>
                                                                        <div id="result_add"></div>
          </div>

        </div>
        </div>


        <div class="col-lg-3">

          <div class="panel panel-default" id="headings">
            <div class="panel-body">
               <h1 class="page-header"><small>Activate user</small></h1>
            <div class="form-group">
              <label for="activate_user">Username</label>
              <select id="activate_user" class="form-control" >
               <?php foreach($users as $u) {
                  if($u->active==0) {


                    echo "<option value='$u->id'>$u->username</option>";
                  }


                }
                ?>
              </select>
            </div>
             <div class="form-group">
              <label for="days">Number of Days</label>
              <input type="text" class="form-control" id="days" placeholder="Days">
            </div>


                                      <div class="form-group">

                  <input id="activate"  type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">
                                     </div>
                                                                        <div id="result_activate"></div>
         </div>
       </div>
       </div>
       <div class="col-lg-4">
          <div class="panel panel-default" id="headings">

            <div class="panel-body">
            <h1 class="page-header"><small>Upload File</small></h1>
            <div class="form-group">
              <select id="activate_user" class="form-control" >
               <?php foreach($users as $u) {
                  if($u->active==0) {


                    echo "<option value='$u->id'>$u->username</option>";
                  }


                }
                ?>
              </select>
           <label for="amount">APK</label>
           <input type="file" name="userfile" size="20" />
           </div>
            </div>
          </div>

        </div>
</div>
<div class="row">
        <div class="col-lg-8">
          <div class="panel panel-default" id="headings">

            <div class="panel-body">
            <h1 class="page-header"><small>All users</small></h1>
             <table class="table table-striped table-bordered table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Hackforums UID</th>
                  <th>Paypal</th>
                  <th>Amount Paid</th>
                  <th>Days Left</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $this->db->select_sum('amount');
                $query = $this->db->get('users');
                $amount= $query->result();

foreach ($query->result() as $row)
{
   $amount=$row->amount;

}

                                $i=0;
 foreach($users as $u) {
                  if($u->doe==0 && $u->doj==0)
                    $left=0;
                  else {
                    $t= date("Y-m-d");
                    $t=strtotime($t);
                    $doe=strtotime($u->doe);
                    $left= floor(($doe-$t)/(24*3600));
                  }
                  if($left==0){
                    $u->username="<strike>".$u->username."</strike>";

                  }



                  $i=$i+1;
                  echo "<tr>
                  <td>{$i}</td>
                  <td>{$u->username}</td>
                  <td>{$u->hfuid}</a></td>
                  <td>{$u->paypal}</td>
                  <td>{$u->amount}</td>
                  <td>$left</td>
                </tr>";
                }
                echo"
                <td></td>
                <td></td>
                <td></td>
                <td>Total Earned</td>
                <td>".$amount."</td>
                <td></td>";
                ?>

              </tbody>
            </table>

            </div>
          </div>

        </div>
        </div>





    </div>
