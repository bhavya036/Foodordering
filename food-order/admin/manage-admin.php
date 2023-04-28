<?php include('partials/menu.php'); ?>

<div class="main-content">
            <div class="wrapper">
                  <h1>Manage Admin</h1>
                  <br>
                  <a href="add-admin.php" class="btn-primary">Add Admin</a>
                  <br><br>

                  <?php
                        if(isset($_SESSION['add']))
                        {
                              echo $_SESSION['add']; //Displaying Session Message
                              unset($_SESSION['added']); //removing Session Message

                        }
                  ?>
                  <br><br><br>
                  <table class='tbl-full'>
                        <tr>
                              <th>Sr.No</th>
                              <th>Full Name</th>
                              <th>Username</th>
                              <th>Actions</th>
                        </tr>

                        <?php
                              //query to get all admin
                              $sql = "SELECT * FROM tbl_admin";
                              //Executed The Query
                              $res = mysqli_query($conn, $sql);
                              //check the num of rows
                              if($res==TRUE)
                              {
                                    //Count Rows To Check Whether We Have data in Databse or not
                                    $count = mysqli_num_rows($res); //Function To get all rows in Database

                                    $sn=1; //Create a variable and assign the value
                                    //Check The Num Of rows
                                    if($count>0)
                                    {
                                          //We Have Data In DataBase
                                          while($rows=mysqli_fetch_assoc($res))
                                          {
                                                //Using While Loop To Gate Data From The DataBase
                                                //And While Loop Will RunTill The Data End In Table
                                                //Get Individual Data
                                                $id=$rows['id'];
                                                $full_name=$rows['full_name'];
                                                $username=$rows['username'];

                                                //Display Value In Our Tablee
                                                ?>
                                                      <tr>
                                                            <td><?php echo $sn++; ?></td>
                                                            <td><?php echo $full_name; ?></td>
                                                            <td><?php echo $username; ?></td>
                                                            <td>
                                                                  <a href="#" class="btn-secondary">Update Admin</a>
                                                                  <a href="#" class="btn-danger">Delete Admin</a>
                                                            </td>
                                                      </tr>
                                                
                                                <?php


                                          }
                                    }
                                    else
                                    {
                                          //We Do Not Have Data In Data Base
                                    }
                              }
                        ?>
                  </table>
            </div>
      </div>
<?php include('partials/footer.php'); ?>